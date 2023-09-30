<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTermsTable extends Migration
{

    public function up()
    {
        Schema::create('terms', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->longText('term_ar')->nullable();
            $table->longText('term_en')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('terms');
    }
}
