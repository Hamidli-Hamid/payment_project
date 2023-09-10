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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->integer('balance')->default(0);
            $table->string('full_name', 100);
            $table->string('card_number',16)->unique();
            $table->string('cvv',3);
            $table->string('date_month', 2);
            $table->string('date_year', 4);
            $table->string('currency',10)->default('AZN');
            $table->string('password');
            $table->tinyInteger('status')->default(0)->comment('0:deactive; 1-active; 2-expired; 3-blocked');
            $table->softDeletes($column = 'deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
