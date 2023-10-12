<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('ud')->nullable();
            $table->string('photo_ud_frent')->nullable();
            $table->string('photo_ud_back')->nullable();
            $table->string('password')->nullable();
            $table->integer('contry_id')->unsigned()->nullable()->index();
            $table->string('accepted')->nullable();
            $table->string('refused')->nullable();
            $table->string('contry');
            $table->string('adresse')->nullable();
            $table->string('fax')->nullable();
            $table->string('POBOX')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
