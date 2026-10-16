<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | StockFlow</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;
            color: #172554;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page {
            width: min(950px, 92%);
        }

        .header {
            text-align: center;
            margin-bottom: 35px;
        }

        .brand {
            font-size: 38px;
            font-weight: 800;
            margin: 0;
            color: #172554;
        }

        .subtitle {
            color: #64748b;
            margin-top: 8px;
            font-size: 16px;
        }

        .portal-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .portal-card {
            background: white;
            border-radius: 16px;
            padding: 38px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .09);
            text-align: center;
            border: 2px solid transparent;
            transition: .2s ease;
        }

        .portal-card:hover {
            transform: translateY(-4px);
            border-color: #2563eb;
        }

        .icon {
            width: 72px;
            height: 72px;
            margin: 0 auto 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .admin-icon {
            background: #dbeafe;
        }

        .staff-icon {
            background: #dcfce7;
        }

        .portal-card h2 {
            margin: 0 0 10px;
        }

        .portal-card p {
            color: #64748b;
            line-height: 1.6;
            min-height: 50px;
        }

        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            color: white;
        }

        .btn-admin {
            background: #2563eb;
        }

        .btn-staff {
            background: #16a34a;
        }

        .system-note {
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            margin-top: 30px;
        }

        .alert {
            background: #dcfce7;
            color: #166534;
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        @media (max-width: 700px) {
            .portal-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="page">

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="header">
        <h1 class="brand">StockFlow</h1>

        <div class="subtitle">
            Inventory Management System
        </div>

        <p class="subtitle">
            Select your access portal to continue.
        </p>
    </div>


    <div class="portal-grid">

        <div class="portal-card">

            <div class="icon admin-icon">
                👨‍💼
            </div>

            <h2>Administrator</h2>

            <p>
                Full access to inventory management,
                administrative functions, and protected system operations.
            </p>

            <a
                href="{{ route('admin.login') }}"
                class="btn btn-admin"
            >
                Admin Login
            </a>

        </div>


        <div class="portal-card">

            <div class="icon staff-icon">
                👤
            </div>

            <h2>Staff</h2>

            <p>
                Access inventory records, search items,
                add products, and perform authorized stock updates.
            </p>

            <a
                href="{{ route('staff.login') }}"
                class="btn btn-staff"
            >
                Staff Login
            </a>

        </div>

    </div>


    <div class="system-note">
        Authorized StockFlow personnel only.
    </div>

</div>

</body>
</html>