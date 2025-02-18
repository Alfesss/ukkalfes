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
