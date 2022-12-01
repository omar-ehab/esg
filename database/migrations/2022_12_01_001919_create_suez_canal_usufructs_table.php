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
        Schema::create('suez_canal_usufructs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->double('from');
            $table->double('to');
            $table->decimal('tariif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('suez_canal_usufructs');
    }
};
