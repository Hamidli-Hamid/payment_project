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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_id_order');
            $table->foreign('fk_id_order')->references('id')->on('orders');
            $table->unsignedBigInteger('fk_id_card');
            $table->foreign('fk_id_card')->references('id')->on('cards');
            $table->integer('amount');
            $table->tinyInteger('status')->default(0)->comment('0:CANCELED; 1-Success; 3-No balances available;');
            $table->softDeletes($column = 'deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
