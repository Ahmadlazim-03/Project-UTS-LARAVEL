    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration
    {
        public function up(): void
        {
            DB::statement("CREATE TABLE vendor (
                idvendor INT PRIMARY KEY AUTO_INCREMENT,
                nama_vendor VARCHAR(100),
                badan_hukum CHAR(1),
                status CHAR(1)
            );
            ");
        }
        public function down(): void
        {
            Schema::dropIfExists('vendor');
        }
    };