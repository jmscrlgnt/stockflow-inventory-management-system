<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'StockFlow')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .navbar {
            background: #172554;
            color: white;
            padding: 18px 0;
        }

        .container {
            width: min(1180px, 92%);
            margin: auto;
        }

        .navbar-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        .brand span {
            font-weight: normal;
            font-size: 14px;
            opacity: .8;
        }

        main {
            padding: 35px 0;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
        }

        .page-header h1 {
            margin: 0 0 6px;
        }

        .text-muted {
            color: #6b7280;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0,0,0,.07);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #eef2ff;
            text-align: left;
            padding: 13px;
            font-size: 14px;
        }

        td {
            padding: 14px 13px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover td {
            background: #f9fafb;
        }

        .btn {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 7px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .btn-info {
            background: #0891b2;
            color: white;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn:hover {
            opacity: .88;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .field-error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .badge {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .actions form {
            margin: 0;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .detail-label {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .detail-value {
            font-size: 17px;
            font-weight: bold;
        }

        .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px;
        margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 16px rgba(0,0,0,.06);
        }

        .stat-label {
            color: #64748b;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            color: #172554;
        }

        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 22px;
        }

        .search-bar input {
            flex: 1;
        }

        .search-result {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .user-name {
            font-size: 14px;
            font-weight: bold;
            color: white;
        }

        .role-badge-nav {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .role-admin {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .role-staff {
            background: #dcfce7;
            color: #166534;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, .6);
            color: white;
            padding: 8px 13px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: white;
            color: #172554;
        }

        @media (max-width: 700px) {
            .form-grid,
            .details-grid {
                grid-template-columns: 1fr;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }
            .stats-grid {
            grid-template-columns: 1fr 1fr;
            }

            .search-bar {
            flex-direction: column;
            }

            .navbar-content {
                gap: 15px;
            }

            .user-info {
                display: none;
            }

            .user-area {
                gap: 8px;
            }

        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="container navbar-content">

        <a href="{{ route('items.index') }}" class="brand">
            StockFlow
            <span>Inventory Management System</span>
        </a>

        @auth
            <div class="user-area">

                <div class="user-info">

                    <span class="user-name">
                        {{ auth()->user()->name }}
                    </span>

                    <span class="role-badge-nav
                        {{ auth()->user()->role === 'admin'
                            ? 'role-admin'
                            : 'role-staff' }}">
                        
                        {{ strtoupper(auth()->user()->role) }}

                    </span>

                </div>


                <form
                    action="{{ route('logout') }}"
                    method="POST"
                    onsubmit="return confirm('Are you sure you want to log out of StockFlow?');"
                >
                    @csrf

                    <button
                        type="submit"
                        class="logout-btn"
                    >
                        Logout
                    </button>
                </form>

            </div>
        @endauth

    </div>
</nav>

<main>
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </div>
</main>

</body>
</html>