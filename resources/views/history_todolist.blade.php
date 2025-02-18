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
            background-color: #0a0a0a;
            min-height: 100vh;
            display: grid;
            grid-template-columns: auto 1fr;
            color: #00ff00;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .sidebar {
            background: #0a0a0a;
            color: #00ff00;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            border-right: 2px solid #00ff00;
            box-shadow: 20px 0 60px rgba(0, 255, 0, 0.1);
            width: 300px;
            transition: all 0.3s ease;
            position: relative;
            height: 100vh;
        }

        .sidebar.collapsed {
            width: 80px;
            padding: 2rem 1rem;
        }

        .sidebar.collapsed .nav-link span,
        .sidebar.collapsed .logo span {
            display: none;
        }

        .toggle-btn {
            position: absolute;
            right: -15px;
            top: 20px;
            background: #0a0a0a;
            border: 2px solid #00ff00;
            color: #00ff00;
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
            background: #00ff00;
            color: #0a0a0a;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: #00ff00;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
            margin-bottom: 2rem;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
        }

        .nav-link {
            color: #00ff00;
            text-decoration: none;
            padding: 1rem;
            margin: 0.5rem 0;
            border-radius: 8px;
            border: 2px solid #00ff00;
            box-shadow: 5px 5px 10px rgba(0, 255, 0, 0.1);
            transition: all 0.3s ease;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
        }

        .nav-link:hover {
            background: #00ff00;
            color: #0a0a0a;
            transform: translateY(-2px);
        }

        .main-content {
            padding: 2rem;
            background: #0a0a0a;
            height: 100vh;
            overflow-y: auto;
            border-radius: 0;
            border: none;
            border-left: 2px solid #00ff00;
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.2);
            transition: all 0.3s ease;
        }

        .header {
            margin-bottom: 2rem;
            color: #00ff00;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        .task-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 0.5rem;
        }

        .task-table th {
            background: rgba(0, 255, 0, 0.1);
            padding: 1rem;
            text-align: left;
            border-bottom: 2px solid #00ff00;
            color: #00ff00;
        }

        .task-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 255, 0, 0.2);
            color: #00ff00;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: 2px solid #00ff00;
            border-radius: 6px;
            background: transparent;
            color: #00ff00;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-danger {
            border-color: #ff0000;
            color: #ff0000;
        }

        .btn-danger:hover {
            background: #ff0000;
            color: #0a0a0a;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
        }

        .badge-warning {
            background: #0a0a0a;
            color: #ffd700;
            border: 2px solid #ffd700;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.2);
        }

        .badge-success {
            background: #0a0a0a;
            color: #00ff00;
            border: 2px solid #00ff00;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.2);
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

        <table class="task-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama tugas</th>
                    <th>Status</th>
                    <th>Tugas dibuat pada</th>
                    <th>Diselesaikan Pada</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
