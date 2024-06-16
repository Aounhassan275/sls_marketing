<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIncomeFieldsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_stock')->default(0)->nullable();
            $table->float('direct_income')->default(0)->nullable();
            $table->float('personal_reward')->default(0)->nullable();
            $table->float('indirect_income_level')->nullable();
            $table->float('product_income')->default(0)->nullable();
            $table->float('expense_income')->default(0)->nullable();
            $table->float('flash_income')->default(0)->nullable();
            $table->float('reward_income')->default(0)->nullable();
            $table->float('loss_income')->default(0)->nullable();
            $table->float('salary')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('is_stock');
            $table->dropColumn('direct_income');
            $table->dropColumn('personal_reward');
            $table->dropColumn('indirect_income_level');
            $table->dropColumn('product_income');
            $table->dropColumn('expense_income');
            $table->dropColumn('flash_income');
            $table->dropColumn('reward_income');
            $table->dropColumn('loss_income');
            $table->dropColumn('salary');
        });
    }
}
