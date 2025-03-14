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
        Schema::table('produits', function (Blueprint $table) {
           $table->foreignId("categorie_id")
            ->constrained()
            // ->cascadeOnDelete();
            // ->restrictOnDelete();
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign('produits_categorie_id_foreign');
            $table->dropColumn("categorie_id");
         });
    }
};
