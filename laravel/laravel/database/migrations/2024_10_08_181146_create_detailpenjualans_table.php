    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE detailpenjualan (
                iddetail_penjualan BIGINT PRIMARY KEY AUTO_INCREMENT,
                harga_satuan INT,
                jumlah INT,
                subtotal INT,
                idpenjualan INT,
                idbarang INT
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('detailpenjualan');
        }
    };