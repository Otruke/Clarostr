<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarningsTable extends Migration
{
    public function up()
    {
        Schema::create('earnings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('starter_earnings', 10, 2)->default(0.00);
            $table->decimal('direct_referral_earnings', 10, 2)->default(0.00);
            $table->decimal('downliners_earnings', 10, 2)->default(0.00);
            $table->decimal('descendants_monthly_earnings', 10, 2)->default(0.00);
            $table->decimal('monthly_earnings', 10, 2)->default(0.00);
            $table->decimal('food_invest_earnings', 10, 2)->default(0.00);
            $table->decimal('total_earnings', 10, 2)->default(0.00);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('earnings');
    }
}
