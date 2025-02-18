@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="neu-container p-5">
        <h1 class="neu-title text-center mb-4">Edit Task</h1>
        
        <form action="{{ route('todolist.updateNama', $todolist->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="nama_tugas" class="neu-label mb-2">Task Name</label>
                <input type="text" name="nama_tugas" class="neu-input form-control" value="{{ $todolist->nama_tugas }}" required>
            </div>

            <div class="d-flex justify-content-between mt-4">
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
    margin: 0;
    padding: 0;
    height: 100vh;
    overflow: hidden;
}

.neu-container {
    background: #FFEFD5;
    border-radius: 10px;
    box-shadow: 20px 0 60px rgba(0, 0, 0, 0.1);
    border: 2px solid #000000;
    width: 100%;
    max-width: 800px; /* Increased from 600px */
}

.neu-title {
    color: #000000;
    font-weight: 500;
    font-size: 1.5rem;
}

.neu-label {
    color: #000000;
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
    background: transparent;
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
