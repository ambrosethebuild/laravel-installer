<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installer - Run Migrations</title>
    @include('installer::installer.style')
</head>
<body>
    @include('installer::installer.topbar')
    <div class="installer-container">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-xl font-bold mb-4 text-center">Step 4: Run Migrations</h1>
            @include('installer::installer.alert')
            <div class="hint">We'll run your database migrations to set up the necessary tables for your application.</div>
            @include('installer::installer.divider')
            @if(isset($success) && $success)
                <div class="alert-success">Migrations ran successfully!</div>
                <div class="actions">
                    <form method="get" action="{{ route('installer.complete') }}">
                        @include('installer::installer.button', ['title' => 'Finish'])
                    </form>
                </div>
            @elseif(isset($success) && !$success)
                <div class="alert-error">Migration failed. See logs below:</div>
                <pre>{{ $output }}</pre>
                <div class="actions">
                    <form method="post" action="{{ route('installer.migrate-continue') }}">
                        @csrf
                        @include('installer::installer.button', ['title' => 'Try Again'])
                    </form>
                </div>
            @else
                <div class="actions space-y-2">
                    <form method="post" action="{{ route('installer.migrate-continue') }}">
                        @csrf

                        @include('installer::installer.button', ['title' => 'Run Migrations'])
                    </form>
                    <form method="post" action="{{ route('installer.migrate-continue') }}" class="mt-2">
                        @csrf
                        <input type="hidden" name="seed" value="1">
                        @include('installer::installer.button', ['title' => 'Run Migrations & Seed'])
                    </form>
                </div>
            @endif
        </div>
    </div>
    @include('installer::installer.footer')
</body>
</html> 