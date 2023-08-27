<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTypeWeirCatchmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weir_catchments', function (Blueprint $table) {
           
            $table->float('area')->change();
            $table->float('L')->change();
            $table->float('LC')->change();
            $table->float('H')->change();
            $table->float('S')->change();
            $table->float('c')->change();
            $table->float('I')->change();

            $table->float('Return_period')->change();
            $table->float('flow')->change();
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
