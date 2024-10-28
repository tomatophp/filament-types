<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Schema::hasTable('typables')) {
            Schema::create('typables', function (Blueprint $table) {
                $table->foreignId('type_id')->references('id')->on('types')->onDelete('cascade');

                $table->unsignedBigInteger('typables_id');
                $table->string('typables_type');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typbables');
    }
};
