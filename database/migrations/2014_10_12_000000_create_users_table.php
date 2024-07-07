<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

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
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('referral_link')->nullable()->unique();
            $table->unsignedInteger('direct_downlines_count')->default(0);
            $table->nestedSet();
            $table->boolean('overflow_distributed')->default(false);
            $table->enum('role', ['User', 'Moderator', 'Admin'])->default('User');
            $table->boolean('is_subscribed')->default(false);
            $table->boolean('sub_status')->default(false);
            $table->timestamp('next_billing')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('sponsor')->nullable();
            $table->enum('package', ['Starter', 'Bronze', 'Silver', 'Gold', 'Diamond']);
            $table->unsignedInteger('amount');
            $table->integer('level')->default(0);
            $table->string('bank_name');
            $table->string('bank_account_name');
            $table->string('bank_account_number');
            $table->string('address');
            $table->string('state');
            $table->string('country');
            $table->boolean('three_month_sub')->default(false);
            $table->timestamp('last_payment_date')->useCurrent(Carbon::now());
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('unsubscribed_days')->default(0);
            $table->json('earned_downliner_ids')->nullable();
            $table->json('monthly_earned_downliner_ids')->nullable(); //->default(json_encode([]));
            $table->timestamp('last_monthly_earnings_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
