<?php

namespace App\Livewire;

use App\Models\satuan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Basisdata extends Component
{
    public $Query;
    public function AddQuery(){
        DB::insert("INSERT INTO satuan (nama_satuan, status) 
VALUES ('Unit', 1);
  ");
    }





    
    public function create_table_satuan(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec("php {$projectPath}/artisan make:model satuan -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_satuans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        $Content = 
        <<<PHP
        <?php
        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Support\Facades\DB;
        return new class extends Migration
        {
            public function up(): void
            {
                DB::statement("CREATE TABLE satuan (
                    idsatuan INT PRIMARY KEY AUTO_INCREMENT,
                    nama_satuan VARCHAR(45),
                    status TINYINT
                )");
            }
            public function down(): void
            {
                Schema::dropIfExists('satuan');
            }
        };
        PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_barang(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model barang -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_barangs_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_kartu_stok(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model kartustok -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_kartustoks_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_vendor(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model vendor -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_vendors_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_pengadaan(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model pengadaan -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_pengadaans_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
                            timestamp TIMESTAMP,
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_detailpengadaan(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model detailpengadaan -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_detailpengadaans_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_penerimaan(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model penerimaan -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_penerimaans_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
                <?php
                use Illuminate\Database\Migrations\Migration;
                use Illuminate\Database\Schema\Blueprint;
                use Illuminate\Support\Facades\Schema;
                return new class extends Migration
                {
                    public function up(): void
                    {
                        DB::statement("CREATE TABLE penerimaan (
                            idpenerimaan BIGINT PRIMARY KEY AUTO_INCREMENT,
                            created_at TIMESTAMP,
                            status CHAR(1),
                            idpengadaan BIGINT,
                            iduser INT
                        )
                        ");
                    }
                    public function down(): void
                    {
                        Schema::dropIfExists('penerimaan');
                    }
                };
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_detailpenerimaan(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model detailpenerimaan -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_detailpenerimaans_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_retur(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model retur -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_returs_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
                <?php
                use Illuminate\Database\Migrations\Migration;
                use Illuminate\Database\Schema\Blueprint;
                use Illuminate\Support\Facades\Schema;
                return new class extends Migration
                {
                    public function up(): void
                    {
                        DB::statement("CREATE TABLE retur (
                            idretur BIGINT PRIMARY KEY AUTO_INCREMENT,
                            created_at TIMESTAMP,
                            idpenerimaan BIGINT,
                            iduser INT
                            );
                        ");
                    }
                    public function down(): void
                    {
                        Schema::dropIfExists('retur');
                    }
                };
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_detailretur(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model detailretur -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_detailreturs_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_penjualan(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model penjualan -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_penjualans_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_detailpenjualan(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model detailpenjualan -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_detailpenjualans_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }
    public function create_table_marginpenjualan(){
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        shell_exec(command: "php {$projectPath}/artisan make:model marginpenjualan -m");
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_marginpenjualans_table.php");
        $latestMigrationFile = end($migrationFiles); 
            $Content = 
            <<<PHP
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
            PHP;
        file_put_contents($latestMigrationFile, $Content);
        shell_exec(command: "php {$projectPath}/artisan migrate");
    }














    public function delete_table_satuan(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE satuan');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_satuans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\satuan.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\satuan.php'); 
        }
    }
    public function delete_table_barang(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE barang');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_barangs_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\barang.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\barang.php'); 
        }
    }
    public function delete_table_kartu_stok(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE kartustok');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_kartustoks_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\kartustok.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\kartustok.php'); 
        }
    }
    public function delete_table_vendor(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE vendor');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_vendors_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\vendor.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\vendor.php'); 
        }
    }
    public function delete_table_pengadaan(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE pengadaan');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_pengadaans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\pengadaan.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\pengadaan.php'); 
        }
    }
    public function delete_table_detailpengadaan(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE detailpengadaan');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_detailpengadaans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\detailpengadaan.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\detailpengadaan.php'); 
        }
    }
    public function delete_table_penerimaan(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE penerimaan');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_penerimaans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\penerimaan.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\penerimaan.php'); 
        }
    }
    public function delete_table_detailpenerimaan(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE detailpenerimaan');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_detailpenerimaans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\detailpenerimaan.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\detailpenerimaan.php'); 
        }
    }
    public function delete_table_retur(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE retur');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_returs_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\retur.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\retur.php'); 
        }
    }
    public function delete_table_detailretur(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE detailretur');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_detailreturs_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\detailretur.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\detailretur.php'); 
        }
    }
    public function delete_table_penjualan(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE penjualan');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_penjualans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\penjualan.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\penjualan.php'); 
        }
    }
    public function delete_table_detailpenjualan(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE detailpenjualan');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_detailpenjualans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\detailpenjualan.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\detailpenjualan.php'); 
        }
    }
    public function delete_table_marginpenjualan(){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::statement('DROP TABLE marginpenjualan');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $projectPath = 'C:\PROJECT_UTS_LARAVEL\laravel';
        $migrationFiles = glob("{$projectPath}/database/migrations/*_create_marginpenjualans_table.php");
        $latestMigrationFile = end($migrationFiles); 
        if (file_exists($latestMigrationFile)) {
            unlink($latestMigrationFile); 
        }
        if (file_exists('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\marginpenjualan.php')) {
            unlink('C:\PROJECT_UTS_LARAVEL\laravel\app\Models\marginpenjualan.php'); 
        }
    }












    public function render()
    {
        $satuan = [];
        $barang = [];
        $kartustok = [];
        $vendor = [];
        $pengadaan = [];
        $detailpengadaan = [];
        $penerimaan = [];
        $detailpenerimaan = [];
        $retur = [];
        $detailretur = []; 
        $penjualan = []; 
        $detailpenjualan = []; 
        $marginpenjualan = []; 

        try {
            $satuan = DB::select("SELECT * FROM satuan");
        } catch (\Exception $e) {

        }
    
        try {
            $barang = DB::select("SELECT * FROM barang");
        } catch (\Exception $e) {
           
        }

        try {
            $kartustok = DB::select("SELECT * FROM kartustok");
        } catch (\Exception $e) {
           
        }

        try {
            $vendor = DB::select("SELECT * FROM vendor");
        } catch (\Exception $e) {
           
        }

        try {
            $pengadaan = DB::select("SELECT * FROM pengadaan");
        } catch (\Exception $e) {
           
        }

        try {
            $detailpengadaan = DB::select("SELECT * FROM detailpengadaan");
        } catch (\Exception $e) {
           
        }

        try {
            $penerimaan = DB::select("SELECT * FROM penerimaan");
        } catch (\Exception $e) {
           
        }

        try {
            $detailpenerimaan = DB::select("SELECT * FROM detailpenerimaan");
        } catch (\Exception $e) {
           
        }

        try {
            $retur = DB::select("SELECT * FROM retur");
        } catch (\Exception $e) {
           
        }

        try {
            $detailretur = DB::select("SELECT * FROM detailretur");
        } catch (\Exception $e) {
           
        }

        try {
            $penjualan = DB::select("SELECT * FROM penjualan");
        } catch (\Exception $e) {
           
        }

        try {
            $detailpenjualan = DB::select("SELECT * FROM detailpenjualan");
        } catch (\Exception $e) {
           
        }

        try {
            $marginpenjualan = DB::select("SELECT * FROM marginpenjualan");
        } catch (\Exception $e) {
           
        }
    
        return view('livewire.basisdata', [
            "satuan" => $satuan,
            "barang" => $barang,
            "kartustok" => $kartustok,
            "vendor" => $vendor,
            "pengadaan" => $pengadaan,
            "detailpengadaan" => $detailpengadaan,
            "penerimaan" => $penerimaan,
            "detailpenerimaan" => $detailpenerimaan,
            "retur" => $retur,
            "detailretur" => $detailretur,
            "penjualan" => $penjualan,
            "detailpenjualan" => $detailpenjualan,
            "marginpenjualan" => $marginpenjualan,
        ]);
    }
}
