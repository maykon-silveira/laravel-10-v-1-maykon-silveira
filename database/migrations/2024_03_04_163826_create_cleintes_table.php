<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); //int 
            $table->string('nome'); // string 
            $table->string('cpf'); // string  777.777.777-77
            $table->string('email'); // string  cursos@maykonsilveira.com.br
            $table->string('fone'); // string  (41)77777-7777
            $table->date('nascimento'); // date  1998-07-07
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cleintes');
    }
};
