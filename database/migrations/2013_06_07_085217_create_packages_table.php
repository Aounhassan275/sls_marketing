<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->float('price')->default(0)->nullable();
            $table->float('direct_income')->default(0)->nullable();
            $table->float('indirect_income')->default(0)->nullable();
            $table->float('withdraw_limit')->default(0)->nullable();
            $table->float('income_limit')->default(0)->nullable();
            $table->float('indirect_income_level')->nullable();
            $table->float('product_income')->default(0)->nullable();
            $table->float('expense_income')->default(0)->nullable();
            $table->float('flash_income')->default(0)->nullable();
            $table->float('reward_income')->default(0)->nullable();
            $table->float('loss_income')->default(0)->nullable();
            $table->float('salary')->default(0)->nullable();
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
        Schema::dropIfExists('packages');
    }
}
