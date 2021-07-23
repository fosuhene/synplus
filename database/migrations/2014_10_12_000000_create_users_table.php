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
            $table->increments('id');           
            $table->string('full_name');             
            $table->string('username')->nullable();           
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();                               
            $table->string('password');            
            $table->string('telephone')->nullable();   
            $table->string('active')->nullable();    
            $table->string('account_locked')->nullable();
            $table->string('expired')->nullable();
            $table->string('locked')->nullable();           
            $table->enum('role', ['admin', 'vendor','customer'])->default('customer');
            $table->enum('status', ['active', 'inactive'])->default('active');            
            $table->string('photo')->nullable();
            $table->text('address')->nullable();
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
