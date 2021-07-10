<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRProduitDemandeLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r__produit__demande_livraisons', function (Blueprint $table) {
            $table->id();
            $table->UnsignedSmallInteger('qtedemandee');
            $table->UnsignedSmallInteger('qtelivrai')->default(0);
            $table->foreignId('produit_id')->constrained('produits')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreignId('demande_livraison_id')->constrained('demande_livraisons')->onUpdate('CASCADE')->onDelete('RESTRICT');
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
        Schema::dropIfExists('r__produit__demande_livraisons');
    }
}
