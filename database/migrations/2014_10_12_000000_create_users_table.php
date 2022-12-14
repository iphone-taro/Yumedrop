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
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id')->unique();
            $table->string('hash_code')->default('');
            $table->string('twitter_id')->default('');
            $table->string('twitter_code')->default('');
            $table->boolean('show_twitter')->default(false);
            $table->string('twitter_token')->default('');
            $table->string('twitter_token_secret')->default('');
            $table->string('mail_address')->default('');
            $table->string('password')->default('');
            $table->string('user_name');
            $table->string('profile')->default('');
            $table->string('favorite_tag')->default('');
            $table->string('mute_tag')->default('');
            $table->integer('disp_r18')->default(0);
            $table->integer('disp_r18g')->default(0);
            $table->rememberToken();
            // $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
};
