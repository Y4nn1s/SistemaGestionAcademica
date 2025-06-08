<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->string('cedula_identidad')->unique()->after('apellido');
            $table->dropColumn('email'); // Elimina el campo antiguo
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('correo_electrónico')->unique()->nullable()->after('apellido');
            $table->dropColumn('cedula_identidad');
        });
    }
};
