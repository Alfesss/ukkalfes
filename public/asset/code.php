<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
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
            background-color: #FFEFD5;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #FFEFD5;
        }

        .container-box {
            max-width: 900px;
            background: #000000;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            border: 2px solid #000000;
            box-shadow: 20px 0 60px rgba(255, 239, 213, 0.1);
        }

        .left-side {
            background: #000000;
            color: #FFEFD5;
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
            background: #000000;
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
            color: #FFEFD5;
        }

        .alert {
            background: #FFEFD5;
            border: 2px solid #000000;
            color: #000000;
            border-radius: 6px;
        }

        a {
            color: #FFEFD5;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a:hover {
            color: #808080;
        }

        h2 {
            color: #FFEFD5 !important;
            font-weight: 500;
            font-size: 1.5rem;
        }

        label {
            color: #FFEFD5;
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


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #000000;
            min-height: 100vh;
            display: grid;
            grid-template-columns: auto 1fr;
            color: #ffffff;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .sidebar {
            background: #000000;
            color: #ffffff;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            border-right: 2px solid #FFEFD5;
            box-shadow: 20px 0 60px rgba(255, 239, 213, 0.1);
            width: 200px;
            transition: all 0.3s ease;
            position: relative;
            height: 100vh;
        }

        .sidebar.collapsed {
            width: 60px;
            padding: 1.5rem 0.5rem;
        }

        .sidebar.collapsed .nav-link span,
        .sidebar.collapsed .logo span {
            display: none;
        }

        .toggle-btn {
            position: absolute;
            right: -15px;
            top: 20px;
            background: #000000;
            border: 2px solid #FFEFD5;
            color: #ffffff;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 100;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: #FFEFD5;
            color: #000000;
        }

        .logo {
            font-size: 1.2rem;
            font-weight: 600;
            color: #ffffff;
            text-shadow: 0 0 10px rgba(255, 239, 213, 0.5);
            margin-bottom: 1.5rem;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
        }

        .nav-link {
            color: #ffffff;
            text-decoration: none;
            padding: 0.8rem;
            margin: 0.3rem 0;
            border-radius: 6px;
            border: 2px solid #000000;
            box-shadow: 5px 5px 10px rgba(255, 239, 213, 0.1);
            transition: all 0.3s ease;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            font-size: 0.9rem;
        }

        .nav-link:hover {
            background: #FFEFD5;
            color: #000000;
            transform: translateY(-2px);
        }

        .main-content {
            padding: 1rem;
            background: #FFEFD5;
            height: 100vh;
            overflow-y: auto;
            border-radius: 0;
            border: none;
            border-left: 2px solid #FFEFD5;
            box-shadow: 0 0 30px rgba(255, 239, 213, 0.2);
            transition: all 0.3s ease;
            font-size: 0.9rem;
            color: #000000;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            top: 0;
            background: #FFEFD5;
            padding: 0;
        }

        .header h1 {
            font-size: 1.5rem;
        }

        .clock-display {
            font-size: 0.9rem;
            color: #000000;
            text-shadow: 0 0 8px rgba(255, 239, 213, 0.5);
            padding: 0.3rem 0.8rem;
            border: 1px solid #000000;
            border-radius: 20px;
        }

        .task-form {
            background: rgba(255, 239, 213, 0.05);
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
        }

        .task-input {
            background: #FFEFD5;
            border: 2px solid #000000;
            color: #000000;
            padding: 0.8rem;
            border-radius: 8px;
            width: 100%;
            margin-bottom: 0.8rem;
            box-shadow: inset 0 0 10px rgba(255, 239, 213, 0.1);
            font-size: 0.9rem;
        }

        .task-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.3rem;
            font-size: 0.9rem;
        }

        .task-table th {
            background: rgba(0, 0, 0, 0.1);
            padding: 1rem;
            text-align: left;
            border-bottom: 2px solid #000000;
            color: #000000;
        }

        .task-table td {
            padding: 0.8rem;
            border-bottom: 1px solid rgba(255, 239, 213, 0.2);
        }

        .action-buttons {
            display: flex;
            gap: 0.3rem;
        }

        .btn {
            padding: 0.3rem 0.8rem;
            border: 2px solid #000000;
            border-radius: 6px;
            background: transparent;
            color: #000000;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn:hover {
            background: #FFEFD5;
            color: #000000;
        }

        .btn-danger {
            border-color: #ff0000;
            color: #ffffff;
            background-color: #ff0000;
        }

        .btn-danger:hover {
            background: #cc0000;
            color: #ffffff;
        }

        .status-select {
            background: #FFEFD5;
            border: 2px solid #000000;
            color: #000000;
            padding: 0.3rem;
            border-radius: 6px;
            width: 100%;
            font-size: 0.9rem;
        }
    </style>
    <script>
        function updateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            document.getElementById('current-time').innerText = now.toLocaleString('id-ID', options) + ' WIB';
        }
        setInterval(updateTime, 1000);

        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.toggle-btn i');
            sidebar.classList.toggle('collapsed');
            toggleBtn.classList.toggle('fa-chevron-left');
            toggleBtn.classList.toggle('fa-chevron-right');
        }
    </script>
</head>

<body onload="updateTime()">
    <div class="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="logo"><span>Menu</span></div>
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        <a href="{{ route('todolist.history') }}" class="nav-link"><i class="fas fa-history"></i> <span>Riwayat</span></a>
        <form action="{{ route('logout') }}" method="POST" class="mt-auto" style="width: 100%;">
            @csrf
            <button type="submit" class="btn btn-danger w-100 text-nowrap"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="clock-display" id="current-time"></div>
        </div>

        <div class="task-form">
            <form action="{{ route('todolist.store') }}" method="POST">
                @csrf
                <input type="text" name="nama_tugas" class="task-input" placeholder="Apa yang ingin kamu kerjakan hari ini?" required>
                <button type="submit" class="btn">Tambah Tugas</button>
            </form>
        </div>

        <table class="task-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tugas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todolists as $index => $todolist)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $todolist->nama_tugas }}</td>
                        <td>
                            <form action="{{ route('todolist.update', $todolist->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status_tugas" class="status-select" onchange="this.form.submit()">
                                    <option value="pending" {{ $todolist->status_tugas == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ $todolist->status_tugas == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </form>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('todolist.edit', $todolist->id) }}" class="btn">Edit</a>
                            <form action="{{ route('todolist.destroy', $todolist->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>

@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="neu-container p-5">
        <h1 class="neu-title text-center mb-4">Edit Tugas</h1>
        
        <form action="{{ route('todolist.updateNama', $todolist->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="nama_tugas" class="neu-label mb-2">Nama tugas</label>
                <input type="text" name="nama_tugas" class="neu-input form-control" value="{{ $todolist->nama_tugas }}" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="neu-button neu-button-primary">
                    <i class="fas fa-save me-2"></i>Simpan
                </button>
                <a href="{{ route('dashboard') }}" class="neu-button neu-button-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>

<style>
body {
    background: #FFEFD5;
    margin: 0;
    padding: 0;
    height: 100vh;
    overflow: hidden;
}

.neu-container {
    background: #000000;
    border-radius: 10px;
    box-shadow: 20px 0 60px rgba(0, 0, 0, 0.1);
    border: 2px solid #000000;
    width: 100%;
    max-width: 800px; /* Increased from 600px */
}

.neu-title {
    color: #FFEFD5;
    font-weight: 500;
    font-size: 1.5rem;
}

.neu-label {
    color: #FFEFD5;
    font-weight: 400;
}

.neu-input {
    background: #FFEFD5;
    border: 2px solid #000000;
    border-radius: 6px;
    padding: 0.5rem 1rem;
    color: #000000;
    font-size: 0.9rem;
    width: 100%;
}

.neu-button {
    padding: 0.5rem 1rem;
    border: 2px solid #000000;
    border-radius: 6px;
    font-weight: 400;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    background: #FFEFD5;
}

.neu-button:hover {
    background: #000000;
    color: #FFEFD5;
}

.neu-button-primary {
    color: #000000;
}

.neu-button-secondary {
    color: #000000;
    text-decoration: none;
}
</style>
@endsection


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat To-Do List</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #FFEFD5;
            min-height: 100vh;
            display: grid;
            grid-template-columns: auto 1fr;
            color: #000000;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .sidebar {
            background: #000000;
            color: #ffffff;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            border-right: 2px solid #000000;
            box-shadow: 20px 0 60px rgba(0, 0, 0, 0.1);
            width: 200px;
            transition: all 0.3s ease;
            position: relative;
            height: 100vh;
        }

        .sidebar.collapsed {
            width: 60px;
            padding: 1.5rem 0.5rem;
        }

        .sidebar.collapsed .nav-link span,
        .sidebar.collapsed .logo span {
            display: none;
        }

        .toggle-btn {
            position: absolute;
            right: -15px;
            top: 20px;
            background: #000000;
            border: 2px solid #FFEFD5;
            color: #ffffff;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 100;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: #FFEFD5;
            color: #000000;
        }

        .logo {
            font-size: 1.2rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 2rem;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
        }

        .nav-link {
            color: #ffffff;
            text-decoration: none;
            padding: 0.8rem;
            margin: 0.5rem 0;
            border-radius: 8px;
            border: 2px solid #FFEFD5;
            transition: all 0.3s ease;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
        }

        .nav-link:hover {
            background: #FFEFD5;
            color: #000000;
        }

        .main-content {
            padding: 2rem;
            background: #FFEFD5;
            height: 100vh;
            overflow-y: auto;
            border-radius: 0;
            border: none;
            border-left: 2px solid #000000;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .header {
            margin-bottom: 2rem;
            color: #000000;
        }

        .task-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.5rem;
        }

        .task-table th {
            background: rgba(0, 0, 0, 0.1);
            padding: 1rem;
            text-align: left;
            border-bottom: 2px solid #000000;
            color: #000000;
        }

        .task-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            color: #000000;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: 2px solid #000000;
            border-radius: 6px;
            background: transparent;
            color: #000000;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-danger {
            border-color: #ff0000;
            color: #ffffff;
            background: #ff0000;
        }

        .btn-danger:hover {
            background: #cc0000;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .badge-warning {
            background: #ffd700;
            color: #000000;
            border: 2px solid #ffd700;
        }

        .badge-success {
            background: #00ff00;
            color: #000000;
            border: 2px solid #00ff00;
        }

        .search-box {
            margin-bottom: 2rem;
            display: flex;
            gap: 1rem;
        }

        .search-input {
            flex: 1;
            padding: 0.5rem 1rem;
            border: 2px solid #000000;
            border-radius: 6px;
            background: #ffffff;
            color: #000000;
        }

        .search-input:focus {
            outline: none;
            border-color: #000000;
        }
    </style>
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.toggle-btn i');
            sidebar.classList.toggle('collapsed');
            toggleBtn.classList.toggle('fa-chevron-left');
            toggleBtn.classList.toggle('fa-chevron-right');
        }

        function searchTasks() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.querySelector('.task-table');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const taskName = rows[i].getElementsByTagName('td')[1];
                if (taskName) {
                    const text = taskName.textContent || taskName.innerText;
                    if (text.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        }

        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus tugas ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
</head>

<body>
    <div class="sidebar">
        <div class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-chevron-left"></i>
        </div>
        <div class="logo"><span>Menu</span></div>
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        <a href="{{ route('todolist.history') }}" class="nav-link"><i class="fas fa-history"></i> <span>Riwayat</span></a>
        <form action="{{ route('logout') }}" method="POST" class="mt-auto" style="width: 100%;">
            @csrf
            <button type="submit" class="btn btn-danger w-100 text-nowrap"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Riwayat To-Do List</h1>
            <p>Berikut adalah semua tugas yang pernah Anda buat.</p>
        </div>

        <div class="search-box">
            <input type="text" id="searchInput" class="search-input" onkeyup="searchTasks()" placeholder="Cari tugas...">
        </div>

        <table class="task-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama tugas</th>
                    <th>Status</th>
                    <th>Tugas dibuat pada</th>
                    <th>Diselesaikan Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todolists as $index => $todolist)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $todolist->nama_tugas }}</td>
                        <td>
                            @if ($todolist->status_tugas == 'pending')
                                <span class="badge badge-warning">Pending</span>
                            @else
                                <span class="badge badge-success">Completed</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($todolist->created_at)->translatedFormat('l, d F Y H:i:s') }} WIB</td>
                        <td>{{ $todolist->status_tugas == 'completed' ? $todolist->updated_at->format('l, d F Y H:i:s') : '-' }}</td>
                        <td>
                            <form id="delete-form-{{ $todolist->id }}" action="{{ route('todolist.destroy', $todolist->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $todolist->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFEFD5;
            color: #000000;
            line-height: 1.6;
        }

        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: relative;
        }

        .hero-content {
            max-width: 600px;
            padding: 50px;
            position: relative;
            margin-left: 50px;
        }

        .hero-header {
            position: relative;
            margin-bottom: 2rem;
            display: flex;
            justify-content: flex-start;
        }

        .hero-title {
            font-size: 2.5rem;
            color: #000000;
            font-weight: 500;
            text-align: left;
            width: 100%;
            z-index: 1;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #000000;
            margin-bottom: 2rem;
            font-weight: 300;
            text-align: left;
        }

        .hero-image {
            width: 150px;
            height: auto;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .pemanah-image {
            width: 300px;
            height: auto;
            margin-right: 50px;
            transform: scaleX(-1);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: scaleX(-1) translateY(0px);
            }
            50% {
                transform: scaleX(-1) translateY(-10px);
            }
            100% {
                transform: scaleX(-1) translateY(0px);
            }
        }

        .btn {
            padding: 12px 30px;
            border: 2px solid #000000;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #FFEFD5;
        }

        .btn:hover {
            background: #000000;
            color: #FFEFD5;
        }

        .btn-primary {
            color: #000000;
        }

        .features-section {
            padding: 60px 20px;
            background-color: #FFEFD5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .feature-card {
            background: #FFEFD5;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2rem;
            color: #000000;
            margin-bottom: 20px;
            padding: 15px;
            display: inline-block;
        }

        .feature-title {
            font-size: 1.2rem;
            color: #000000;
            margin-bottom: 15px;
        }

        .feature-text {
            color: #000000;
            font-size: 0.9rem;
        }

        footer {
            background-color: #FFEFD5;
            color: #000000;
            padding: 30px 20px;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .footer-links a {
            color: #000000;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 6px;
        }

        .footer-links a:hover {
            background: #000000;
            color: #FFEFD5;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }

            .hero-image {
                width: 120px;
            }
            
            .pemanah-image {
                width: 200px;
                margin-right: 20px;
            }

            .hero-content {
                margin-left: 20px;
            }
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-header">
                <h1 class="hero-title">Todolist App</h1>
                <img src="{{ asset('asset/todolist.png') }}" alt="Notes Icon" class="hero-image">
            </div>
            <p class="hero-subtitle">Bidik Target dan Raih Produktivitas!. Selesaikan Tugas dengan Cerdas!</p>
            <a href="{{ route('login') }}" style="color: #000000; text-decoration: none;"><button class="btn btn-primary">Login untuk melanjutkan</button></a>
        </div>
        <img src="{{ asset('asset/pemanah.png') }}" alt="Pemanah Icon" class="pemanah-image">
    </section>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List App')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">@yield('header')</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ToDoListController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Auth;


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [ToDoListController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/todolist', [ToDoListController::class, 'store'])->middleware('auth')->name('todolist.store');
Route::patch('/todolist/{todolist}', [ToDoListController::class, 'update'])->middleware('auth')->name('todolist.update');
Route::delete('/todolist/{todolist}', [ToDoListController::class, 'destroy'])->middleware('auth')->name('todolist.destroy');
Route::get('/todolist/{todolist}/edit', [ToDoListController::class, 'edit'])->middleware('auth')->name('todolist.edit');
Route::patch('/todolist/{todolist}/update-nama', [ToDoListController::class, 'updateNama'])->middleware('auth')->name('todolist.updateNama');

Route::get('/todolist/history', [ToDoListController::class, 'history'])->middleware('auth')->name('todolist.history');

Route::get('/', function () {
    return view('landing');
})->name('landing');

<?php //Menandakan awal dari file PHP.

// Mengimpor tiga kelas utama yang digunakan dalam migrasi:
use Illuminate\Database\Migrations\Migration; 
use Illuminate\Database\Schema\Blueprint; 
use Illuminate\Support\Facades\Schema; 


return new class extends Migration {
    public function up(): void
    {
        Schema::create('todolists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_tugas');
            $table->enum('status_tugas', ['pending', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('todolists');
    }
};

<?php

namespace App\Http\Controllers; // Define namespace

use App\Models\ToDoList; // Import ToDoList
use Illuminate\Http\Request; // Import Request
use Illuminate\Support\Facades\Auth; // Import Auth
use Carbon\Carbon; // Import Carbon

class ToDoListController extends Controller // Define class ToDoListController extends Controller
{
    public function index() // Define index method
    {

        //Menambahkan fitur untuk menampilkan tanggal sekarang
        $hariIni = Carbon::now()->translatedFormat('l, d F Y H:i:s'); // Format: Hari, Tanggal Bulan Tahun Jam:Menit:Detik

        // Menambahkan fitur untuk menampilkan data hanya untuk hari ini
        $tanggalHariIni = Carbon::now()->toDateString(); // Format: YYYY-MM-DD

        // Ambil data hanya untuk hari ini berdasarkan created_at
        $todolists = ToDoList::where('user_id', Auth::id()) // Filter berdasarkan user_id
            ->whereDate('created_at', $tanggalHariIni) // Filter berdasarkan tanggal hari ini
            ->get(); // Ambil semua data
        return view('dashboard', compact('todolists', 'hariIni')); // Kirim data ke view
    }

    public function store(Request $request) // Define store method
    {
        $request->validate([ // Validasi input
            'nama_tugas' => 'required|string|max:255', // Nama tugas harus diisi, bertipe string, maksimal 255 karakter
        ]);

        ToDoList::create([ // Simpan data ke database
            'user_id' => Auth::id(), // Ambil user_id dari Auth
            'nama_tugas' => $request->nama_tugas, // Ambil nama_tugas dari input
            'status_tugas' => 'pending', // Set status_tugas ke pending
        ]);

        return redirect()->route('dashboard')->with('success', 'Tugas berhasil ditambahkan!'); // Redirect ke dashboard dengan pesan sukses
    }

    public function update(Request $request, ToDoList $todolist)
    {
        if ($todolist->user_id !== Auth::id()) { // Cek apakah user_id pada ToDoList sama dengan user_id yang sedang login
            return redirect()->route('dashboard')->with('error', 'Akses ditolak!'); // Redirect ke dashboard dengan pesan error
        }

        $todolist->update([
            'status_tugas' => $request->status_tugas, // Update status_tugas
        ]);

        return redirect()->route('dashboard')->with('success', 'Status tugas diperbarui!'); // Redirect ke dashboard dengan pesan sukses
    }

    public function destroy(ToDoList $todolist)
    {
        if ($todolist->user_id !== Auth::id()) { // Cek apakah user_id pada ToDoList sama dengan user_id yang sedang login
            return redirect()->route('dashboard')->with('error', 'Akses ditolak!'); // Redirect ke dashboard dengan pesan error
        }

        $todolist->delete(); // Hapus data
        return redirect()->route('dashboard')->with('success', 'Tugas berhasil dihapus!'); // Redirect ke dashboard dengan pesan sukses
    }

    public function edit(ToDoList $todolist)
    {
        if ($todolist->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak!');
        }

        return view('edit_todolist', compact('todolist'));
    }

    public function updateNama(Request $request, ToDoList $todolist)
    {
        if ($todolist->user_id !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak!');
        }

        $request->validate([
            'nama_tugas' => 'required|string|max:255',
        ]);

        $todolist->update([
            'nama_tugas' => $request->nama_tugas,
        ]);

        return redirect()->route('dashboard')->with('success', 'Nama tugas berhasil diperbarui!');
    }

    public function history()
    {
        $todolists = ToDoList::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get(); // Ambil data berdasarkan user_id dan urutkan berdasarkan created_at secara descending

        return view('history_todolist', compact('todolists')); // Kirim data ke view
    }
}
