<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsGalleryImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_gallery_images', function(Blueprint $table) {
            $table->integer('id', true)->unsigned();

            $table->integer('gallery_id')->unsigned();
            $table->string('image');



            $table->foreign('gallery_id')->references('id')->on('cms_gallery_entity')->onDelete('cascade');

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
        //
    }
}
