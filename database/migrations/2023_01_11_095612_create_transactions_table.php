<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('transactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->UnsignedBigInteger('sender_id');
            $table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->UnsignedBigInteger('receiver_id');
            $table->foreign('receiver_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->decimal('amount', $precision = 8, $scale = 2);
            $table->string('currency')->default('XOF');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
