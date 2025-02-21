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
