@if(session('error'))
    <div class="alert-error mb-4">{{ session('error') }}</div>
@endif
@if(session('success'))
    <div class="alert-success mb-4">{{ session('success') }}</div>
@endif 