@extends('layouts.app')

@section('content')
<div class="container">
    <div class="neu-container p-4 mt-5">
        <h1 class="neu-title text-center mb-4">Edit Task</h1>
        
        <form action="{{ route('todolist.updateNama', $todolist->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="nama_tugas" class="neu-label mb-2">Task Name</label>
                <input type="text" name="nama_tugas" class="neu-input form-control" value="{{ $todolist->nama_tugas }}" required>
            </div>

            <div class="d-flex justify-content-between mt-5">
                <button type="submit" class="neu-button neu-button-primary">
                    <i class="fas fa-save me-2"></i>Save Changes
                </button>
                <a href="{{ route('dashboard') }}" class="neu-button neu-button-secondary">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<style>
body {
    background: #000000;
}

.neu-container {
    background: #000000;
    border-radius: 20px;
    box-shadow: 9px 9px 16px rgba(0,255,0,0.2), -9px -9px 16px rgba(0,255,0,0.1),
                0 0 5px #00ff00, 
                0 0 10px #00ff00,
                0 0 15px #00ff00;
    border: 2px solid #00ff00;
}

.neu-title {
    color: #00ff00;
    font-weight: 600;
}

.neu-label {
    color: #00ff00;
    font-weight: 500;
}

.neu-input {
    border: none;
    background: #2d2d2d;
    border-radius: 12px;
    box-shadow: inset 5px 5px 10px rgba(0,0,0,0.4), inset -5px -5px 10px rgba(255,255,255,0.1);
    padding: 12px 16px;
    color: #00ff00;
}

.neu-button {
    padding: 10px 20px;
    border: none;
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.2s ease;
}

.neu-button:hover {
    transform: translateY(-2px);
}

.neu-button-primary {
    background: #006400;
    color: #00ff00;
    box-shadow: 5px 5px 10px rgba(0,0,0,0.4), -5px -5px 10px rgba(255,255,255,0.1);
}

.neu-button-secondary {
    background: #2d2d2d;
    color: #00ff00;
    box-shadow: 5px 5px 10px rgba(0,0,0,0.4), -5px -5px 10px rgba(255,255,255,0.1);
    text-decoration: none;
}
</style>
@endsection
