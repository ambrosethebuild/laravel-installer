<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Installer - Welcome</title>
    @include('installer::installer.style')
</head>
<body>
    @include('installer::installer.topbar')
    <div class="installer-container">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md text-center">
            <h1 class="text-2xl font-bold mb-4">Welcome to the Laravel Installer</h1>
            <p class="mb-6 text-gray-700">This wizard will guide you through the system checks and setup process.</p>
            <div class="hint">
                This installer will help you verify your server, set up your environment, and prepare your application for first use.
            </div>
            <div class="actions mt-4">
                <form action="{{ route('installer.requirements') }}" method="get" style="display:inline">
                    @include('installer::installer.button', ['title' => 'Start Installation'])
                </form>
            </div>
        </div>
    </div>
    @include('installer::installer.footer')
</body>
</html> 