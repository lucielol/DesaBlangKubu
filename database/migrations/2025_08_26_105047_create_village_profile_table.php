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
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('village_name');
            $table->string('district');
            $table->string('regency');
            $table->string('province');
            $table->text('vision');
            $table->text('mission');
            $table->text('history');
            $table->string('area_size');
            $table->text('geographic_info');
            $table->text('boundaries');
            $table->string('topography');
            $table->string('climate');
            $table->string('head_village_name');
            $table->string('secretary_name');
            $table->string('treasurer_name');
            $table->string('bpd_chairman');
            $table->string('bpd_vice_chairman');
            $table->text('google_maps_url')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_profile');
    }
};
