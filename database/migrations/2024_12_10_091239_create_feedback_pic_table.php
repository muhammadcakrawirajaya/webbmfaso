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
        Schema::create('feedback_pic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_uic')->constrained('uic_kendala')->onDelete('restrict')->onUpdate('cascade');
            $table->string('feedback_pic');
            $table->foreignId('id_status_kendala')->constrained('status_kendala')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('jenis_kendala');
    }
};
