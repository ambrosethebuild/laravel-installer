<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installer - Edit .env</title>
    @include('installer::installer.style')
</head>
<body>
    @include('installer::installer.topbar')
    <div class="installer-container">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-xl font-bold mb-4 text-center">Step 3: Edit .env File</h1>
            @include('installer::installer.alert')
            <div class="hint">Edit your application's environment variables. These settings control your app's connection to the database and other services.</div>
            @include('installer::installer.divider')
            <div class="actions">
                <form method="post" action="{{ route('installer.env-continue') }}">
                    @csrf
                    <label for="env" class="text-gray-700 mb-2 text-left block">.env Content:</label>
                    <textarea id="env" name="env">{{ old('env', $envContent) }}</textarea>
                    @include('installer::installer.button', ['title' => 'Save & Continue'])
                </form>
            </div>
        </div>
    </div>
    @include('installer::installer.footer')
</body>
</html> 