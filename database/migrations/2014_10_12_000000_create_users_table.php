<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->string('refferral_link')->nullable();
            $table->string('refer_type')->nullable();
            $table->float('balance')->default(0);
            $table->float('auto_wallet')->default(0);
            $table->float('r_earning')->default(0);
            $table->float('pending_amount')->default(0);
            $table->date('a_date')->nullable();
            $table->unsignedSmallInteger('refer_by')->nullable();
            $table->unsignedSmallInteger('left_refferal')->nullable();
            $table->unsignedSmallInteger('right_refferal')->nullable();
            $table->unsignedSmallInteger('left_refferal_package_1')->nullable();
            $table->unsignedSmallInteger('right_refferal_package_1')->nullable();
            $table->boolean('autopool_package_1')->default(0)->nullable();
            $table->boolean('autopool_package_2')->default(0)->nullable();
            $table->unsignedSmallInteger('left_refferal_package_2')->nullable();
            $table->unsignedSmallInteger('right_refferal_package_2')->nullable();
            $table->float('left_amount')->default(0);
            $table->float('right_amount')->default(0);
            $table->string('top_referral')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
