<style>
    @font-face {
        font-family: 'Poppins';
        src: url('/fonts/Poppins-Regular.woff2') format('woff2'),
             url('/fonts/Poppins-Regular.woff') format('woff');
        font-weight: 400;
        font-style: normal;
        font-display: swap;
    }
    @font-face {
        font-family: 'Poppins';
        src: url('/fonts/Poppins-Bold.woff2') format('woff2'),
             url('/fonts/Poppins-Bold.woff') format('woff');
        font-weight: 700;
        font-style: normal;
        font-display: swap;
    }
    body, form, input, button, textarea {
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
    }
    body { background: #f3f4f6; min-height: 100vh; }
    .installer-container { margin: 5vh auto 0 auto; width: 100% !important; }
    /* installer-container first div */
    .installer-container > div { max-width: 32rem; margin: 0 auto; }
    .bg-white { background: #fff; }
    .p-8 { padding: 2rem; }
    .rounded { border-radius: 0.25rem; }
    .shadow-md { box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
    .w-full { width: 100%; }
    .max-w-md { max-width: 32rem; }
    .text-center { text-align: center; }
    .text-right { text-align: right; }
    .actions { text-align: right; margin-top: 1.5rem; }
    .text-xl { font-size: 1.25rem; line-height: 1.75rem; }
    .text-2xl { font-size: 1.5rem; line-height: 2rem; }
    .font-bold { font-weight: 700; }
    .mb-4 { margin-bottom: 1rem; }
    .mb-6 { margin-bottom: 1.5rem; }
    .mb-2 { margin-bottom: 0.5rem; }
    .text-gray-700 { color: #374151; }
    .text-green-600 { color: #16a34a; }
    .text-red-600 { color: #dc2626; }
    .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
    .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
    .bg-blue-600 { background: #2563eb; }
    .text-white { color: #fff; }
    .hover\:bg-blue-700:hover { background: #1d4ed8; }
    .transition { transition: background 0.2s; }
    .disabled { opacity: 0.5; pointer-events: none; }
    ul { list-style: none; padding: 0; }
    li { display: flex; justify-content: space-between; align-items: center; padding: 0.5rem 0; }
    a, button { text-decoration: none; }
    button {
        border: none;
        box-shadow: 0 2px 8px rgba(37,99,235,0.08);
        outline: none;
        font-weight: 600;
        font-size: 1rem;
        border-radius: 0.25rem;
    }
    textarea { width: 100%; min-height: 200px; border: none; border-radius: 0.25rem; padding: 0.75rem; font-family: 'Poppins', monospace, Arial, Helvetica, sans-serif; font-size: 1rem; margin-bottom: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.08); background: #f9fafb; }
    form { text-align: left; }
    .text-left { text-align: left; }
    .mt-4 { margin-top: 1rem; }
    .hint { color: #64748b; font-size: 0.95rem; margin-bottom: 1.25rem; }
    .alert { background: #fef3c7; color: #92400e; padding: 0.75rem 1rem; border-radius: 0.25rem; margin-bottom: 1rem; }
    .alert-error { background: #fef2f2; color: #b91c1c; padding: 0.75rem 1rem; border-radius: 0.25rem; margin-bottom: 1rem; }
    .alert-success { background: #dcfce7; color: #166534; padding: 0.75rem 1rem; border-radius: 0.25rem; margin-bottom: 1rem; }
    pre { background: #f3f4f6; padding: 1rem; border-radius: 0.25rem; text-align: left; overflow-x: auto; }
    .flex { display: flex; }
    .justify-end { justify-content: flex-end; }
    .items-center { align-items: center; }
    .mx-auto { margin-left: auto; margin-right: auto; }

    .btn-primary {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        background: #2563eb;
        color: #fff;
        border-radius: 0.25rem;
        transition: background 0.2s;
        font-size: 0.775rem;
        font-weight: 600;
        font-family: 'Poppins', Arial, Helvetica, sans-serif;
    }
    .btn-primary:hover {
        background: #1d4ed8;
        color: #fff;
    }
    .btn-primary:disabled {
        background: #9ca3af;
        color: #fff;
        cursor: not-allowed;
    }
    .space-x-2 { margin-left: 0.5rem; margin-right: 0.5rem; }
    .space-y-2 { margin-top: 0.5rem; margin-bottom: 0.5rem; }
    .mt-2 { margin-top: 0.5rem; }
    .mt-4 { margin-top: 1rem; }
    
</style> 