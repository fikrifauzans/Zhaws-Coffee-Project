<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totals', function (Blueprint $table) {
            $table->id();
            $table->integer('total_purchase')->nullable();
            $table->integer('unique_code');
            $table->string('payment_proof')->nullable(); //Belum
            $table->integer('weight')->nullable();
            $table->string('courer')->nullable();
            $table->integer('courer_price')->nullable();
            $table->string('estimation')->nullable();
            $table->integer('all_total')->nullable();
            $table->integer('user_id');
            $table->string('address')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('expires')->nullable();
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
        Schema::dropIfExists('totals');
    }
}
