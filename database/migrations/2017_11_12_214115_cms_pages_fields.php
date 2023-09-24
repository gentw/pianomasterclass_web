<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsPagesFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages_fields', function(Blueprint $table) {
            $table->integer('id', true)->unsigned();

            $table->string('label', 255);
            $table->string('name', 255);
            $table->string('model', 255);
            $table->boolean('slugable')->default(false);
            $table->enum('type', array('text', 'editor', 'numeric', 'date', 'email', 'file', 'gallery', 'select'));
            $table->enum('rule', array('required'));
            $table->integer('page_type_id')->unsigned();

            $table->foreign('page_type_id')->references('id')->on('cms_pages_types')->onDelete('cascade');

            

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
        Schema::drop('cms_pages_fields');
    }
}
