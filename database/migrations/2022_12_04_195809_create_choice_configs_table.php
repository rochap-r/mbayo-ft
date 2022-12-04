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
        Schema::create('choice_configs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('quality');
            $table->string('recompense');
            $table->string('personnel');
            $table->string('assistance');
            $table->string('image');
            $table->string('team_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choice_configs');
    }
};
