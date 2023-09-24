<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsPageType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages_types', function(Blueprint $table) {
            $table->integer('id', true)->unsigned();

            $table->string('name', 255);
            $table->string('slug', 255);
            $table->enum('type', array('one', 'many'));
            $table->boolean('edit')->default(false);
            $table->integer('page_id')->unsigned();

            $table->foreign('page_id')->references('id')->on('cms_pages')->onDelete('cascade');

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
        Schema::drop('cms_pages_types');
    }
}
