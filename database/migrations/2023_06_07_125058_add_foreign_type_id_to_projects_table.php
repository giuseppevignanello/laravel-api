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
        Schema::table('projects', function (Blueprint $table) {
            //add the column
            $table->unsignedBigInteger('type_id')->nullable()->after('id');

            // add the foreign key connected with id in types
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {

            // drop the connection
            $table->dropForeign('projects_type_id_foreign');

            // drop the column
            $table->dropColumn('type_id');
        });
    }
};
