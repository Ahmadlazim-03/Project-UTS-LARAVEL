<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    public function up(): void
    {
        DB::statement("CREATE TABLE satuan (
            idsatuan INT PRIMARY KEY AUTO_INCREMENT,
            nama_satuan VARCHAR(45),
            status TINYINT
        )");
    }
    public function down(): void
    {
        Schema::dropIfExists('satuan');
    }
};