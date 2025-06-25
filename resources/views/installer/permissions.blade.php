<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installer - Folder Permissions</title>
    @include('installer::installer.style')
</head>
<body>
    @include('installer::installer.topbar')
    <div class="installer-container">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md text-center">
            <h1 class="text-xl font-bold mb-4">Step 2: Folder Permissions Check</h1>
            @include('installer::installer.alert')
            <div class="hint">We'll check that your application folders are writable and have the correct permissions.</div>
            @include('installer::installer.divider')
            
            <ul class="mb-6">
                @foreach ($folders as $folder => $ok)
                    <li>
                        <span class="text-gray-700">{{ $folder }}</span>
                        @if ($ok)
                            <span class="text-green-600">OK</span>
                        @else
                            <span class="text-red-600">Not Writable (min 755)</span>
                        @endif
                    </li>
                @endforeach
            </ul>
            <div class="actions">
                <form method="post" action="{{ route('installer.permissions-continue') }}">
                    @csrf
                    @include('installer::installer.button', ['disabled' => !$allOk])
                </form>
            </div>
        </div>
    </div>
    @include('installer::installer.footer')
</body>
</html> 