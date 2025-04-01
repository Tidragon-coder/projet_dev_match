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
            $table->string('pseudo')->after('name')->nullable();
            $table->date('date_naissance')->after('email')->nullable();
            $table->enum('sexe', ['homme', 'femme', 'autre'])->after('date_naissance')->nullable(); // Enum avec valeurs
            $table->string('profile_picture')->unique()->nullable()->after('sexe');
            $table->text('biography')->nullable()->after('profile_picture');
            $table->string('speciality')->after('biography');
            $table->string('localisation')->after('speciality')->nullable();
            $table->string('center_interest')->after('localisation')->nullable();
            $table->string('phone_number')->after('center_interest')->nullable();
            $table->bigInteger('projets_id')->unsigned()->nullable()->after('speciality');
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
            $table->dropColumn(['date_naissance', 'sexe', 'profile_picture', 'biography', 'speciality', 'projets_id', 'year_experience']);
        });
    }
};