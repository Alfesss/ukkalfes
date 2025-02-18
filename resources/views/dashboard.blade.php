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
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            top: 0;
            background: #0a0a0a;
            padding: 0;
        }

        .clock-display {
            font-size: 1.1rem;
            color: #00cc00;
            text-shadow: 0 0 8px rgba(0, 204, 0, 0.5);
            padding: 0.5rem 1rem;
            border: 1px solid #00ff00;
            border-radius: 20px;
        }

        .task-form {
            background: rgba(0, 255, 0, 0.05);
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .task-input {
            background: #0a0a0a;
            border: 2px solid #00ff00;
            color: #00ff00;
            padding: 1rem;
            border-radius: 8px;
            width: 100%;
            margin-bottom: 1rem;
            box-shadow: inset 0 0 10px rgba(0, 255, 0, 0.1);
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
            position: sticky;
            top: 80px;
            background: #0a0a0a;
            z-index: 5;
        }

        .task-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 255, 0, 0.2);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
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

        .btn:hover {
            background: #00ff00;
            color: #0a0a0a;
        }

        .btn-danger {
            border-color: #ff0000;
            color: #ff0000;
        }

        .btn-danger:hover {
            background: #ff0000;
            color: #0a0a0a;
        }

        .status-select {
            background: #0a0a0a;
            border: 2px solid #00ff00;
            color: #00ff00;
            padding: 0.5rem;
            border-radius: 6px;
            width: 100%;
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
