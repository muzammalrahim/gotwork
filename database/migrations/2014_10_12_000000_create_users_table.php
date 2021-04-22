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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('profile_photo_url')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('city')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('is_phone_number_verified')->default(false);
            $table->longText('description')->nullable();
            $table->enum('status',['Active','Deleted'])->default('Active');
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
