    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE pengadaan (
                idpengadaan BIGINT PRIMARY KEY AUTO_INCREMENT,
                timestamp TIy   MESTAMP,
                user_iduser INT,
                vendor_idvendor INT,
                subtotal_nilai INT,
                ppn INT,
                total_nilai INT,
                status CHAR(1),
                FOREIGN KEY (vendor_idvendor) REFERENCES vendor(idvendor)
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('pengadaan');
        }
    };