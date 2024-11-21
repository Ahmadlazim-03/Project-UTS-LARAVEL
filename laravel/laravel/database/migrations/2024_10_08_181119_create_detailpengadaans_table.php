    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE detailpengadaan (
                iddetail_pengadaan BIGINT PRIMARY KEY AUTO_INCREMENT,
                harga_satuan INT,
                jumlah INT,
                sub_total INT,
                idpengadaan BIGINT,
                idbarang INT
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('detailpengadaan');
        }
    };