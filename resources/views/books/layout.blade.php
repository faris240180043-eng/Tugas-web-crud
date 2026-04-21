<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manajemen Buku</title>

        <style>
            :root {
                --bg: #f4f8ff;
                --surface: #ffffff;
                --text: #1f2937;
                --muted: #6b7280;
                --border: #d7e0ec;
                --primary: #1f7a4d;
                --primary-hover: #19623e;
                --danger: #b91c1c;
                --danger-hover: #991b1b;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(135deg, #eef6ff, #f2fbf3);
                color: var(--text);
                padding: 24px 16px;
            }

            .wrapper {
                max-width: 980px;
                margin: 0 auto;
            }

            .page-title {
                text-align: center;
                margin: 0;
                font-size: 2rem;
            }

            .page-subtitle {
                margin-top: 8px;
                margin-bottom: 20px;
                text-align: center;
                color: var(--muted);
            }

            .card {
                background: var(--surface);
                border: 1px solid var(--border);
                border-radius: 14px;
                padding: 20px;
                box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
            }

            .section-head {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                margin-bottom: 16px;
            }

            .section-head h2 {
                margin: 0;
                font-size: 1.2rem;
            }

            .table-wrap {
                width: 100%;
                overflow-x: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                min-width: 650px;
            }

            th,
            td {
                border-bottom: 1px solid var(--border);
                padding: 12px;
                text-align: left;
                vertical-align: top;
            }

            th {
                background-color: #f8fbff;
            }

            .cell-actions {
                display: flex;
                gap: 8px;
                align-items: center;
            }

            .cell-actions form {
                margin: 0;
            }

            .form-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 14px;
            }

            .field {
                display: flex;
                flex-direction: column;
                gap: 6px;
            }

            .field-full {
                grid-column: 1 / -1;
            }

            label {
                font-weight: 600;
            }

            input {
                width: 100%;
                padding: 10px 12px;
                border: 1px solid var(--border);
                border-radius: 10px;
                font-size: 0.95rem;
            }

            input:focus {
                outline: 2px solid #d3efe0;
                border-color: var(--primary);
            }

            .btn {
                border: 0;
                border-radius: 10px;
                padding: 10px 14px;
                text-decoration: none;
                color: white;
                font-weight: 600;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                line-height: 1;
            }

            .btn-primary {
                background: var(--primary);
            }

            .btn-primary:hover {
                background: var(--primary-hover);
            }

            .btn-secondary {
                background: #475569;
            }

            .btn-secondary:hover {
                background: #334155;
            }

            .btn-danger {
                background: var(--danger);
            }

            .btn-danger:hover {
                background: var(--danger-hover);
            }

            .alert {
                border-radius: 10px;
                padding: 12px 14px;
                margin-bottom: 16px;
            }

            .alert-success {
                background: #e8f9ef;
                border: 1px solid #baeacb;
                color: #0f5132;
            }

            .alert-error {
                background: #fee2e2;
                border: 1px solid #fecaca;
                color: #7f1d1d;
            }

            .error-list {
                margin: 8px 0 0;
                padding-left: 18px;
            }

            .error-text {
                color: #b91c1c;
                font-size: 0.85rem;
            }

            .form-actions {
                margin-top: 18px;
                display: flex;
                justify-content: center;
            }

            @media (max-width: 768px) {
                .section-head {
                    flex-direction: column;
                    align-items: stretch;
                }

                .form-grid {
                    grid-template-columns: 1fr;
                }

                .btn {
                    width: 100%;
                }

                .cell-actions {
                    flex-direction: column;
                    align-items: stretch;
                }
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <h1 class="page-title">Manajemen Buku</h1>
            <p class="page-subtitle">CRUD sederhana untuk data perpustakaan.</p>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @yield('content')
        </div>
    </body>
</html>