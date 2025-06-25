<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installer - Complete</title>
    @include('installer::installer.style')
</head>
<body>
@include('installer::installer.topbar')
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md text-center mx-auto">
        <div class="alert-success mb-4">🎉 Installation Complete!</div>
        <h1 class="text-2xl font-bold mb-4">Your application is ready.</h1>
        <p class="text-gray-700 mb-6">
            For security, please remove or lock the installer before using your application in production.
        </p>
        <p class="text-green-600 font-bold mt-4">Thank you for using the Laravel Installer!</p>
        <!-- divider -->
        @if(isset($output))
            @include('installer::installer.divider')
            <pre>{{ $output ?? '' }}</pre>
        @endif
        <div class="actions">
            <a href="/" style="text-decoration: none;">
                @include('installer::installer.button', ['title' => 'Go to App'])
            </a>
        </div>
    </div>
    @include('installer::installer.footer')
</body>
</html> 