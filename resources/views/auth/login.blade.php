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
            background-color: #000000;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #000000;
        }

        .container-box {
            max-width: 900px;
            background: #FFEFD5;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            border: 2px solid #000000;
            box-shadow: 20px 0 60px rgba(255, 239, 213, 0.1);
        }

        .left-side {
            background: #FFEFD5;
            color: #000000;
            padding: 50px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-right: 2px solid #000000;
        }

        .right-side {
            flex: 1;
            padding: 50px;
            background: #FFEFD5;
        }

        .form-control {
            background: #FFEFD5;
            border: 2px solid #000000;
            color: #000000;
            border-radius: 6px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            outline: none;
            background: #FFEFD5;
            color: #000000;
            border-color: #000000;
            box-shadow: none;
        }

        .btn {
            padding: 10px 20px;
            border: 2px solid #000000;
            border-radius: 6px;
            background: #FFEFD5;
            color: #000000;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn:hover {
            background: #000000;
            color: #FFEFD5;
        }

        .form-check-input {
            background-color: #FFEFD5;
            border: 2px solid #000000;
        }

        .form-check-input:checked {
            background-color: #000000;
            border-color: #000000;
        }

        .form-check-label {
            color: #000000;
        }

        .alert {
            background: #FFEFD5;
            border: 2px solid #000000;
            color: #000000;
            border-radius: 6px;
        }

        a {
            color: #000000;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            color: #808080;
        }

        h2 {
            color: #000000 !important;
            font-weight: 500;
            font-size: 1.5rem;
        }

        label {
            color: #000000;
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
