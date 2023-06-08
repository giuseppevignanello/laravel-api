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
        Schema::create('_project__technology', function (Blueprint $table) {

            // add project_id column
            $table->unsignedBigInteger('project_id');
            //add technology_id column
            $table->unsignedBigInteger('technology_id');

            //add foreign keys
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete();
            $table->foreign('technology_id')->references('id')->on('technologies')->cascadeOnDelete();

            //add primary keys
            $table->primary(['project_id', 'technology_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_project__technology');
    }
};
