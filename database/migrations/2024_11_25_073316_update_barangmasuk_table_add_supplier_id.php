<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBarangmasukTableAddSupplierId extends Migration
{
    public function up()
    {
        Schema::table('barangmasuk', function (Blueprint $table) {
            // Menambahkan kolom supplier_id
            $table->unsignedBigInteger('supplier_id')->after('id'); // Menambahkan supplier_id

            // Menambahkan foreign key constraint
            $table->foreign('supplier_id')->references('kode_supplier')->on('supplier')->onDelete('cascade');

            // Menghapus kolom nama_supplier yang sudah tidak digunakan lagi
            $table->dropColumn('nama_supplier');
        });
    }

    public function down()
    {
        Schema::table('barangmasuk', function (Blueprint $table) {
            // Menghapus kolom supplier_id
            $table->dropForeign(['supplier_id']);  // Menghapus foreign key
            $table->dropColumn('supplier_id');  // Menghapus kolom supplier_id

            // Menambahkan kembali kolom nama_supplier
            $table->string('nama_supplier')->nullable();
        });
    }
}
