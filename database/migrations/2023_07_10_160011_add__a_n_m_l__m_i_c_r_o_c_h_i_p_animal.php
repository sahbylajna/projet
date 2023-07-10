<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('a_n_i_m_a_l__i_n_f_os', function (Blueprint $table) {
            $table->string('ANML_MICROCHIP')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('a_n_i_m_a_l__i_n_f_os', function (Blueprint $table) {
            //
        });
    }
};
