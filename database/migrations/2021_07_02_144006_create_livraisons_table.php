<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande_livraisons', function (Blueprint $table) {
            $table->id();
            $table->enum('traitement_livraison',['','NonTraitée','Recue','Traitée'])->default('');
            $table->foreignId('utilisateur_id')->constrained('utilisateurs')->onUpdate('CASCADE')->onDelete('RESTRICT');
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
        Schema::dropIfExists('demande_livraisons');
    }
}
