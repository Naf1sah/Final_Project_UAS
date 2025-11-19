<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Kolom baru temp
        $table->string('role_new', 20)->default('user');
    });

    // Pindahkan data dari kolom lama ke kolom baru
    DB::statement('UPDATE users SET role_new = role');

    Schema::table('users', function (Blueprint $table) {
        // Hapus kolom lama
        $table->dropColumn('role');
    });

    Schema::table('users', function (Blueprint $table) {
        // Rename kolom baru ke role
        $table->renameColumn('role_new', 'role');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('role_old', 20)->default('user');
    });

    DB::statement('UPDATE users SET role_old = role');

    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
    });

    Schema::table('users', function (Blueprint $table) {
        $table->renameColumn('role_old', 'role');
    });
}

};
