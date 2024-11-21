    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE detailretur (
                iddetail_retur INT PRIMARY KEY AUTO_INCREMENT,
                jumlah INT,
                alasan VARCHAR(200),
                idretur BIGINT,
                iddetail_penerimaan BIGINT
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('detailretur');
        }
    };