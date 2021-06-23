<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRProduitDemandePrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r__produit__demande_prestations', function (Blueprint $table) {
            $table->id();
            $table->UnsignedSmallInteger('qtedemandee');
            $table->UnsignedSmallInteger('qteprise');
            $table->foreignId('produit_id')->constrained('produits')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreignId('demande_id')->constrained('demandes')->onUpdate('CASCADE')->onDelete('RESTRICT');
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
        Schema::dropIfExists('r__produit__demande_prestations');
    }
}
