<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('suez_canal_pilotage_dues', function (Blueprint $table) {
            $table->id();
            $table->double('scnt_from');
            $table->double('scnt_to');
            $table->double('north_val1');
            $table->double('north_val2')->nullable();
            $table->double('south_val1');
            $table->double('south_val2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('suez_canal_pilotage_dues');
    }
};
