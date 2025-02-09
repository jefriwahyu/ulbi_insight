<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Relasi ke posts
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Bisa null untuk visitor
            $table->string('name')->nullable(); // Nama visitor
            $table->string('email')->nullable(); // Email visitor
            $table->text('content'); // Isi komentar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
