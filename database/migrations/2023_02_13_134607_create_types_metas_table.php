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
        if (! Schema::hasTable('types_metas')) {
            Schema::create('types_metas', function (Blueprint $table) {
                $table->id();

                // Link To Table
                $table->unsignedBigInteger('model_id')->nullable();
                $table->string('model_type')->nullable();

                $table->foreignId('type_id')->references('id')->on('types')->onDelete('cascade');
                $table->string('key')->index();
                $table->json('value')->nullable();

                $table->timestamps();
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
        Schema::dropIfExists('types_metas');
    }
};
