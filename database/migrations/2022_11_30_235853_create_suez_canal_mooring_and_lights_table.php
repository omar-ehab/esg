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
        Schema::create('suez_canal_mooring_and_lights', function (Blueprint $table) {
            $table->id();
            $table->double('grt_from');
            $table->double('grt_to')->nullable();
            $table->double('launch');
            $table->double('projector');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('suez_canal_mooring_and_lights');
    }
};
