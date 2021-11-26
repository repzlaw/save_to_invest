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
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->foreignId('role_id')->references('id')->on('user_roles');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->enum('gender', ['male', 'female', 'other', 'prefer not to say'])->nullable();
            $table->enum('marital_status', ['married', 'single' , 'divorced' , 'widowed', 'separated'])->nullable();
            $table->date('dob')->nullable();
            $table->longText('address')->nullable();
            $table->enum('religion', ['christianity', 'islam' , 'traditional' , 'other','none'])->nullable();
            $table->string('image')->nullable();
            $table->enum('active', ['yes', 'no'])->default('yes');
            $table->enum('profile_completed', ['yes', 'no'])->default('no');
            $table->foreignId('lga_id')->nullable()->constrained('state_lgas');
            $table->enum('enable_2fa', ['yes', 'no'])->default('no');
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
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
