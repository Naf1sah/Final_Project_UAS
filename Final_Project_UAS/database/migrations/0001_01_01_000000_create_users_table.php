<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up()
{
Schema::create('users', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('username')->unique();
$table->string('email')->unique();
$table->timestamp('email_verified_at')->nullable();
$table->string('password');
$table->string('role',['staff','user'])->default('user');
$table->enum('jenis_user', ['mahasiswa', 'dosen'])->nullable();
$table->rememberToken();
$table->timestamps();
});
}


public function down()
{
Schema::dropIfExists('users');
}
};