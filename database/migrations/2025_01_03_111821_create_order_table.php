<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('bulan');
            $table->string('track_id_myir')->nullable();
            $table->string('trackid');
            $table->string('status_duplicate')->nullable();
            $table->string('nomor_sc')->nullable();
            $table->string('nama_pelanggan')->nullable();
            $table->text('alamat_pelanggan')->nullable();
            $table->string('cp')->nullable();
            $table->string('tipe_transaksi')->nullable();
            $table->string('layanan')->nullable();
            $table->string('jenis_layanan')->nullable();
            $table->foreignId('id_sto')->nullable()->constrained('sto')->onDelete('restrict')->onUpdate('cascade');
            $table->string('mitra')->nullable();
            $table->string('team')->nullable();
            $table->string('kategori')->nullable();
            $table->text('detail_progres')->nullable();
            $table->string('kendala');
            $table->string('ket_detail')->nullable();
            $table->string('chanel')->nullable();
            $table->string('agency')->nullable();
            $table->string('label_odp')->nullable();
            $table->string('label_odp_alternatif')->nullable();
            $table->string('ket_label_odp')->nullable();
            $table->string('kap_odp')->nullable();
            $table->string('port_odp')->nullable();
            $table->string('sisa_port_odp')->nullable();
            $table->string('tagging_lokasi_odp')->nullable();
            $table->string('tagging_lokasi_pelanggan')->nullable();
            $table->string('status_tagging_pelanggan')->nullable();
            $table->string('id_valins')->nullable();
            $table->string('segmen')->nullable();
            $table->string('produk')->nullable();
            $table->foreignId('id_feedback')->nullable()->constrained('feedback_pic')->onDelete('restrict')->onUpdate('cascade');
            $table->text('ket_feedback')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
