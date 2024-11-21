    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE barang (
                idbarang INT PRIMARY KEY AUTO_INCREMENT,
                jenis CHAR(1),
                nama VARCHAR(50),
                status TINYINT,
                stock INT,
                harga INT,
                idsatuan INT,
                created_at TIMESTAMP,
                FOREIGN KEY (idsatuan) REFERENCES satuan(idsatuan))
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('barang');
        }
    };