<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #FFEFD5;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #FFEFD5;
        }

        .container-box {
            max-width: 900px; /* Increased from 700px */
            background: #000000;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            border: 2px solid #000000;
            box-shadow: 15px 0 45px rgba(255, 239, 213, 0.1);
        }

        .left-side {
            background: #000000;
            color: #FFEFD5;
            padding: 30px;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-right: 2px solid #000000;
        }

        .right-side {
            flex: 1;
            padding: 30px;
            background: #000000;
        }

        .form-control {
            background: #FFEFD5;
            border: 2px solid #000000;
            color: #000000;
            border-radius: 8px;
            padding: 8px 12px;
        }

        .form-control:focus {
            background: #FFEFD5;
            color: #000000;
            border-color: #000000;
            box-shadow: none;
        }

        .form-label {
            color: #FFEFD5;
            font-size: 0.9rem;
        }

        .btn {
            padding: 8px 16px;
            border: 2px solid #000000;
            border-radius: 8px;
            background: #FFEFD5;
            color: #000000;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #000000;
            color: #FFEFD5;
        }

        .alert {
            background: #FFEFD5;
            border: 2px solid #000000;
            color: #000000;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        a {
            color: #FFEFD5;
            text-decoration: none;
            font-size: 0.9rem;
        }

        a:hover {
            color: #808080;
        }

        h2 {
            color: #FFEFD5;
            font-size: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container-box">
            <!-- Left Side -->
            <div class="left-side">
                <h1 class="fw-bold" style="font-size: 1.5rem;">Selamat Datang!</h1>
                <p style="font-size: 0.9rem;">Silakan daftar untuk melanjutkan.</p>
            </div>

            <!-- Right Side (Login Form) -->
            <div class="right-side">
                
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
                
                <h2 class="text-center">Registrasi</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn w-100">Daftar</button>
                    <center class="mt-2" style="font-size: 0.9rem;">Sudah punya akun? <a href="/login">Login</a></center>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
