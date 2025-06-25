<?php

namespace AmbroseTheBuild\LaravelInstaller\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InstallerController extends Controller
{
    protected $stepsFile = 'installer_steps.json';

    protected function stepsPath()
    {
        return storage_path($this->stepsFile);
    }

    protected function getSteps()
    {
        $path = $this->stepsPath();
        if (!file_exists($path)) {
            return [];
        }
        $json = file_get_contents($path);
        return json_decode($json, true) ?: [];
    }

    protected function setStepDone($step)
    {
        $steps = $this->getSteps();
        $steps[$step] = true;
        file_put_contents($this->stepsPath(), json_encode($steps));
    }

    protected function isStepDone($step)
    {
        $steps = $this->getSteps();
        return !empty($steps[$step]);
    }

    protected function ensureStep($step)
    {
        $steps = [
            'requirements',
            'permissions',
            'env',
            'migrate',
            'complete',
        ];
        $stepIndex = array_search($step, $steps);
        if ($stepIndex === 0) {
            return null; // first step, no previous check
        }
        foreach (array_slice($steps, 0, $stepIndex) as $prevStep) {
            if (!$this->isStepDone($prevStep)) {
                return redirect()->route('installer.' . $prevStep);
            }
        }
        return null;
    }

    protected function isInstalled()
    {
        return file_exists(storage_path('installer_completed'));
    }

    public function welcome()
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        return view('installer::installer.welcome');
    }

    // Step 1: Requirements
    public function requirements()
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        if ($redirect = $this->ensureStep('requirements')) return $redirect;
        $required = config('installer.required_extensions', []);
        $requirements = [];
        $allOk = true;
        foreach ($required as $ext) {
            $ok = extension_loaded($ext);
            $requirements[$ext] = $ok;
            if (!$ok) $allOk = false;
        }
        return view('installer::installer.requirements', compact('requirements', 'allOk'));
    }
    public function requirementsContinue(Request $request)
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        $required = config('installer.required_extensions', []);
        $requirements = [];
        $allOk = true;
        $missing = [];
        foreach ($required as $ext) {
            $ok = extension_loaded($ext);
            $requirements[$ext] = $ok;
            if (!$ok) {
                $allOk = false;
                $missing[] = $ext;
            }
        }
        if ($allOk) {
            $this->setStepDone('requirements');
            return redirect()->route('installer.permissions');
        }
        $error = 'Please install the following PHP extensions: ' . implode(', ', $missing);
        return redirect()->route('installer.requirements')->with('error', $error);
    }

    // Step 2: Permissions
    public function permissions()
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        if ($redirect = $this->ensureStep('permissions')) return $redirect;
        $foldersList = config('installer.folders', []);
        $folders = [];
        $allOk = true;
        foreach ($foldersList as $folder) {
            $path = base_path($folder);
            $ok = is_dir($path) && is_writable($path) && substr(sprintf('%o', fileperms($path)), -3) >= 755;
            $folders[$folder] = $ok;
            if (!$ok) $allOk = false;
        }
        return view('installer::installer.permissions', compact('folders', 'allOk'));
    }
    public function permissionsContinue(Request $request)
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        $foldersList = config('installer.folders', []);
        $folders = [];
        $allOk = true;
        $missing = [];
        foreach ($foldersList as $folder) {
            $path = base_path($folder);
            $ok = is_dir($path) && is_writable($path) && substr(sprintf('%o', fileperms($path)), -3) >= 755;
            $folders[$folder] = $ok;
            if (!$ok) {
                $allOk = false;
                $missing[] = $folder;
            }
        }
        if ($allOk) {
            $this->setStepDone('permissions');
            return redirect()->route('installer.env');
        }
        $error = 'Please fix permissions for the following folders: ' . implode(', ', $missing);
        return redirect()->route('installer.permissions')->with('error', $error);
    }

    // Step 3: .env
    public function env()
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        if ($redirect = $this->ensureStep('env')) return $redirect;
        $envPath = base_path('.env');
        $envExamplePath = base_path('.env.example');
        $generic = "APP_NAME=Laravel\nAPP_ENV=local\nAPP_KEY=\nAPP_DEBUG=true\nAPP_URL=http://localhost\n";
        if (file_exists($envPath)) {
            $envContent = file_get_contents($envPath);
        } elseif (file_exists($envExamplePath)) {
            $envContent = file_get_contents($envExamplePath);
        } else {
            $envContent = $generic;
        }
        return view('installer::installer.env', compact('envContent'));
    }
    public function envContinue(Request $request)
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        $envPath = base_path('.env');
        if (!is_writable(dirname($envPath))) {
            return redirect()->route('installer.env')->with('error', 'The .env file or its directory is not writable.');
        }
        file_put_contents($envPath, $request->input('env'));
        $this->setStepDone('env');
        return redirect()->route('installer.migrate')->with('env_saved', true);
    }

    // Step 4: Migrate
    public function migrate()
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        if ($redirect = $this->ensureStep('migrate')) return $redirect;
        return view('installer::installer.migrate');
    }
    public function migrateContinue(Request $request)
    {
        if ($this->isInstalled()) return redirect()->route('installer.complete');
        $success = null;
        $output = '';
        try {
            if ($request->input('seed')) {
                \Artisan::call('migrate:fresh', ['--seed' => true]);
            } else {
                \Artisan::call('migrate', ['--force' => true]);
            }
            $output = \Artisan::output();
            $success = true;
            // Mark installer as completed
            $flagFile = storage_path('installer_completed');
            file_put_contents($flagFile, 'installed: ' . now());
            $this->setStepDone('migrate');
            //add the output to the complete page
            return redirect()->route('installer.complete')->with('output', $output);
        } catch (\Exception $e) {
            $success = false;
            $output = $e->getMessage();
            return redirect()->route('installer.migrate')->with('error', 'Migration failed: ' . $output);
        }
    }

    // Step 5: Complete
    public function complete()
    {
        if ($redirect = $this->ensureStep('complete')) return $redirect;
        $this->setStepDone('complete');
        return view('installer::installer.complete');
    }
} 