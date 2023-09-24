<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsPageEntities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages_entities', function(Blueprint $table) {
            $table->integer('id', true)->unsigned();

            $table->string('slug', 255);
            $table->string('slugable', 2000)->nullable();
            $table->integer('type_id')->unsigned();



            $table->foreign('type_id')->references('id')->on('cms_pages_types')->onDelete('cascade');

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
        Schema::drop('cms_pages_entities');
    }
}
