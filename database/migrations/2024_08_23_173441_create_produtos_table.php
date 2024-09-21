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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('preco', 8, 2);
            $table->integer('quantidade_estoque')->default(0);
            $table->integer('volume');
            $table->string('imagem')->nullable();
            $table->text('descricao');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('fornecedor_id')->constrained()->onDelete('cascade');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
