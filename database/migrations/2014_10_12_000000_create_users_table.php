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
            $table->id();
            $table->string('name');
            $table->integer("type_role")->comment("1=ADMIN;0=USER")->default(0);
            $table->string("type_user")->comment("MAHASISWA/DOSEN/KARYAWAN/SAPRAS");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phonenumber', 15)->unique();
            $table->string('password');
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
};
