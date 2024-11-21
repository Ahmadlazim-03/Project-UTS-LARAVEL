    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE kartustok (
                idkartu_stok BIGINT PRIMARY KEY AUTO_INCREMENT,
                jenis_transaksi CHAR(1),
                masuk INT,
                keluar INT,
                stock INT,
                created_at TIMESTAMP,
                idtransaksi INT,
                idbarang INT,
                FOREIGN KEY (idbarang) REFERENCES barang(idbarang)
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('kartustok');
        }
    };