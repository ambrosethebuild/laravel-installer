<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Installer - Welcome</title>
    <style>
        body { background: #f3f4f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .bg-white { background: #fff; }
        .p-8 { padding: 2rem; }
        .rounded { border-radius: 0.5rem; }
        .shadow-md { box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .w-full { width: 100%; }
        .max-w-md { max-width: 28rem; }
        .text-center { text-align: center; }
        .text-2xl { font-size: 1.5rem; line-height: 2rem; }
        .font-bold { font-weight: 700; }
        .mb-4 { margin-bottom: 1rem; }
        .mb-6 { margin-bottom: 1.5rem; }
        .text-gray-700 { color: #374151; }
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .bg-blue-600 { background: #2563eb; }
        .text-white { color: #fff; }
        .hover\:bg-blue-700:hover { background: #1d4ed8; }
        .transition { transition: background 0.2s; }
        a { text-decoration: none; }
    </style>
</head>
<body>
    @include('installer::installer.topbar')
    <div class="installer-container">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md text-center">
            <h1 class="text-2xl font-bold mb-4">Welcome to the Laravel Installer</h1>
            <p class="mb-6 text-gray-700">This wizard will guide you through the system checks and setup process.</p>
            <div class="hint">Welcome! This installer will help you verify your server, set up your environment, and prepare your application for first use.</div>
            <div class="actions">
                <form action="{{ route('installer.requirements') }}" method="get" style="display:inline">
                    @include('installer::installer.button', ['title' => 'Start Installation'])
                </form>
            </div>
        </div>
    </div>
    @include('installer::installer.footer')
</body>
</html> 