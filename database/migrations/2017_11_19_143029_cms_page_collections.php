<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsPageCollections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages_collections', function(Blueprint $table) {
            $table->integer('id', true)->unsigned();

            $table->integer('entity_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->string('field_name');
            $table->string('field_type');
            $table->mediumText('value')->nullable();

            $table->foreign('entity_id')->references('id')->on('cms_pages_entities')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('cms_pages_fields')->onDelete('cascade');

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
        Schema::drop('cms_pages_collections');
    }
}
