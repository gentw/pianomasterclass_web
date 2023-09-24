<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Entities\Language;

class EgLanguages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_languages', function (Blueprint $table) {
            $table->integer('id', true)->unsigned();
            $table->string('key', 250)->unique();
            $table->string('name', 250);
            $table->timestamps();

        });

        $lang = new Language();
        $lang->key = "en";
        $lang->name = "English";
        $lang->save();

        $lang_2 = new Language();
        $lang_2->key = "al";
        $lang_2->name = "Albanian";
        $lang_2->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cms_languages');
    }
}
