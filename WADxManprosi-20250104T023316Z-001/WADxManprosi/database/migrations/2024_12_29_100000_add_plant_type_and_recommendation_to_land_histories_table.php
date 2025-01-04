<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlantTypeAndRecommendationToLandHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('land_histories', function (Blueprint $table) {
            $table->string('plant_type')->after('land_id'); // Menambahkan kolom plant_type
            $table->text('recommendation')->after('humidity')->nullable(); // Menambahkan kolom recommendation
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('land_histories', function (Blueprint $table) {
            $table->dropColumn('plant_type'); // Menghapus kolom plant_type jika rollback
            $table->dropColumn('recommendation'); // Menghapus kolom recommendation jika rollback
        });
    }
} 