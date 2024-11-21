    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE detailpenerimaan (
                iddetail_penerimaan BIGINT PRIMARY KEY AUTO_INCREMENT,
                idpenerimaan BIGINT,
                barang_idbarang INT,
                jumlah_terima INT,
                harga_satuan_terima INT,
                sub_total_terima INT
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('detailpenerimaan');
        }
    };