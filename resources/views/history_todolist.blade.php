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
