    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE marginpenjualan (
                idmargin_penjualan INT PRIMARY KEY AUTO_INCREMENT,
                created_at TIMESTAMP,
                persen DOUBLE,
                status TINYINT,
                iduser INT
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('marginpenjualan');
        }
    };