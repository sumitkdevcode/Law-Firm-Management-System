<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #1a1a2e, #16213e);
        }

        .login-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(201, 162, 39, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .login-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 40px;
        }

        .brand-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #c9a227, #a88420);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .brand-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: -5px;
        }

        .brand-text span {
            font-size: 0.85rem;
            opacity: 0.7;
        }

        .login-left h2 {
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-family: 'Playfair Display', serif;
        }

        .login-left p {
            font-size: 1.1rem;
            opacity: 0.8;
            line-height: 1.7;
            max-width: 450px;
        }

        .login-right {
            width: 500px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
        }

        .login-form-wrapper {
            width: 100%;
            max-width: 360px;
        }

        .login-form-wrapper h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #1a1a2e;
        }

        .login-form-wrapper p {
            color: #666;
            margin-bottom: 35px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        .input-wrapper input:focus {
            outline: none;
            border-color: #c9a227;
            box-shadow: 0 0 0 4px rgba(201, 162, 39, 0.1);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: #c9a227;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #c9a227, #a88420);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(201, 162, 39, 0.4);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #666;
        }

        .back-link:hover {
            color: #c9a227;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 1024px) {
            .login-left {
                display: none;
            }

            .login-right {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .login-right {
                padding: 40px 30px;
            }

            .login-form-wrapper h3 {
                font-size: 1.5rem;
            }

            .login-form-wrapper p {
                font-size: 0.9rem;
                margin-bottom: 25px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .input-wrapper input {
                padding: 12px 12px 12px 42px;
                font-size: 0.95rem;
            }

            .login-btn {
                padding: 14px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .login-right {
                padding: 30px 20px;
            }

            .login-form-wrapper h3 {
                font-size: 1.3rem;
            }

            .login-form-wrapper p {
                font-size: 0.85rem;
            }

            .form-group label {
                font-size: 0.9rem;
            }

            .input-wrapper input {
                padding: 11px 10px 11px 38px;
                font-size: 0.9rem;
            }

            .input-wrapper i {
                left: 12px;
                font-size: 0.9rem;
            }

            .form-options {
                margin-bottom: 25px;
            }

            .remember-me {
                font-size: 0.9rem;
            }

            .remember-me input {
                width: 16px;
                height: 16px;
            }

            .login-btn {
                padding: 13px;
                font-size: 0.95rem;
            }

            .back-link {
                font-size: 0.9rem;
            }

            .alert {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-left">
        <div class="login-brand">
            <div class="brand-icon">
                <i class="fas fa-balance-scale"></i>
            </div>
            <div class="brand-text">
                <h1>LegalPro</h1>
                <span>Attorney at Law</span>
            </div>
        </div>
        <h2>Welcome Back</h2>
        <p>Access your admin dashboard to manage your law firm's website content, cases, and client inquiries.</p>
    </div>

    <div class="login-right">
        <div class="login-form-wrapper">
            <h3>Admin Login</h3>
            <p>Enter your credentials to continue</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            placeholder="admin@example.com">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" required placeholder="••••••••">
                    </div>
                </div>
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                </div>
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign In
                </button>
            </form>
            <a href="{{ route('home') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Back to Website
            </a>
        </div>
    </div>
</body>

</html>