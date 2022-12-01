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
        Schema::create('suez_canal_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ship_type_id');
            $table->double('scnt_from');
            $table->double('scnt_to')->nullable();
            $table->string('slice');
            $table->double('laden_cost');
            $table->double('ballest_cost')->nullable();

            $table->foreign('ship_type_id')->references('id')->on('suez_canal_ship_types')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('suez_canal_costs');
    }
};
