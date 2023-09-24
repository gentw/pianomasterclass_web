<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagetypeRelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pagetype_rel', function (Blueprint $table) {
            $table->integer('from_id')->references('id')->on('cms_pages_types');
            $table->integer('to_id')->references('id')->on('cms_pages_types');
            $table->string('type');
            $table->primary(['from_id', 'to_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_pagetype_rel');
    }
}
