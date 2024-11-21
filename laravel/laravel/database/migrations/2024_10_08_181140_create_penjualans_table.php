    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE penjualan (
                idpenjualan INT PRIMARY KEY AUTO_INCREMENT,
                created_at TIMESTAMP,
                subtotal_nilai INT,
                ppn INT,
                total_nilai INT,
                iduser INT,
                idmargin_penjualan INT
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('penjualan');
        }
    };