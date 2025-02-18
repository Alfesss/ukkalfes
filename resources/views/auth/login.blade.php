<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #0a0a0a;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #00ff00;
        }

        .container-box {
            max-width: 900px;
            background: #0a0a0a;
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            border: 2px solid #00ff00;
            box-shadow: 20px 20px 60px rgba(0, 255, 0, 0.1),
                       -20px -20px 60px rgba(0, 255, 0, 0.1),
                       0 0 20px rgba(0, 255, 0, 0.3);
        }

        .left-side {
            background: #0a0a0a;
            color: #00ff00;
            padding: 50px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-right: 2px solid #00ff00;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        .right-side {
            flex: 1;
            padding: 50px;
            background: #0a0a0a;
        }

        .form-control {
            background: #0a0a0a;
            border: 2px solid #00ff00;
            color: #00ff00;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 15px;
            box-shadow: inset 5px 5px 10px rgba(0, 255, 0, 0.1),
                       inset -5px -5px 10px rgba(0, 255, 0, 0.1);
        }

        .form-control:focus {
            outline: none;
            background: #0a0a0a;
            color: #00ff00;
            border-color: #00ff00;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.3);
        }

        .btn {
            padding: 10px 20px;
            border: 2px solid #00ff00;
            border-radius: 10px;
            background: #0a0a0a;
            color: #00ff00;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 8px 8px 16px rgba(0, 255, 0, 0.1),
                       -8px -8px 16px rgba(0, 255, 0, 0.1);
        }

        .btn:hover {
            background: #00ff00;
            color: #0a0a0a;
        }

        .form-check-input {
            background-color: #0a0a0a;
            border: 2px solid #00ff00;
        }

        .form-check-input:checked {
            background-color: #00ff00;
            border-color: #00ff00;
        }

        .form-check-label {
            color: #00ff00;
        }

        .alert {
            background: #0a0a0a;
            border: 2px solid #00ff00;
            color: #00ff00;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.3);
        }

        a {
            color: #00ff00;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        h2 {
            color: #00ff00 !important;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        label {
            color: #00ff00;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container-box">
            <!-- Left Side -->
            <div class="left-side">
                <h1 class="fw-bold">Selamat Datang!</h1>
                <p>Silakan login untuk melanjutkan</p>
            </div>

            <!-- Right Side (Login Form) -->
            <div class="right-side">
                <h2 class="text-center">Login</h2>
                
                @if (session('success'))
                    <div class="alert">{{ session('success') }}</div>
                @endif
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="loginPassword" required>
                    </div>
                    <div class="mb-3 form-options">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="showLoginPassword" onclick="togglePassword('loginPassword')">
                            <label class="form-check-label" for="showLoginPassword">Tampilkan Password</label>
                        </div>
                    </div>
                    <button type="submit" class="btn w-100">Login</button>
                    <center class="mt-3">Belum punya akun? <a href="/register">Register</a></center>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            var input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</body>

</html>
