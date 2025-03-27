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
        Schema::disableForeignKeyConstraints();

        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('age')->after('email')->nullable(); // Ajout d'une colonne après 'email'
            $table->enum('sexe', ['homme', 'femme', 'autre'])->after('age')->nullable(); // Enum avec valeurs
            $table->string('profile_picture')->unique()->nullable()->after('sexe');
            $table->text('biography')->nullable()->after('profile_picture');
            $table->string('speciality')->after('biography');
            $table->bigInteger('projets_id')->unsigned()->after('speciality');
            $table->foreign('projets_id')->references('id')->on('projets')->onDelete('cascade'); // Clé étrangère
            $table->tinyInteger('year_experience')->after('projets_id')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['age', 'sexe', 'profile_picture', 'biography', 'speciality', 'projets_id', 'year_experience']);
        });
    }
};
