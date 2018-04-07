<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->enum('title',['Mr', 'Mrs', 'Miss', 'Ms', 'Sir', 'Dr']);
            $table->string('fname');
            $table->string('lname');
            $table->string('nominee');
            $table->enum('relation_with_nominee',['Father', 'Mother','Sister','Brother','Spouse']);
            $table->string('contact_no');
            $table->string('dob');
            $table->enum('correspondence',['courier', 'Speed Post']);
            $table->string('username');
            $table->string('email',60)->unique();
            $table->string('password');
            $table->string('ddno');
            $table->string('amount');
            $table->string('issuing_bank');
            $table->string('issuing_date');
            $table->string('bank_branch');
            $table->tinyInteger('verified')->default(0);
            $table->string('email_token')->nullable();
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
