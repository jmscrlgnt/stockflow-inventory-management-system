<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Staff Login | StockFlow</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5f9;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            width: min(440px, 92%);
        }

        .brand {
            text-align: center;
            margin-bottom: 24px;
        }

        .brand h1 {
            color: #172554;
            margin: 0;
            font-size: 34px;
        }

        .brand p {
            color: #64748b;
            margin-top: 6px;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, .10);
        }

        .login-card h2 {
            margin: 0 0 7px;
            color: #172554;
        }

        .description {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 7px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            outline: none;
            border-color: #16a34a;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .remember input {
            width: auto;
        }

        .btn {
            width: 100%;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            background: #16a34a;
            color: white;
        }

        .btn:hover {
            background: #15803d;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #64748b;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 13px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .field-error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .role-badge {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            font-size: 12px;
            font-weight: bold;
            padding: 5px 9px;
            border-radius: 20px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="brand">
        <h1>StockFlow</h1>
        <p>Inventory Management System</p>
    </div>


    <div class="login-card">

        <span class="role-badge">
            STAFF PORTAL
        </span>

        <h2>Staff Login</h2>

        <div class="description">
            Sign in using your authorized StockFlow staff account.
        </div>


        @if($errors->any())
            <div class="error-box">
                {{ $errors->first() }}
            </div>
        @endif


        <form
            action="{{ route('staff.login.submit') }}"
            method="POST"
        >

            @csrf

            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter staff email"
                    required
                    autofocus
                >

                @error('email')
                    <div class="field-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required
                >

                @error('password')
                    <div class="field-error">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <label class="remember">

                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                >

                Remember me

            </label>


            <button type="submit" class="btn">
                Login as Staff
            </button>

        </form>


        <a
            href="{{ route('login') }}"
            class="back"
        >
            ← Back to Portal Selection
        </a>

    </div>

</div>

</body>
</html>