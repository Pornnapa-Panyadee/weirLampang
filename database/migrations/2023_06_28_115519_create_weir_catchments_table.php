<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeirCatchmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weir_catchments', function (Blueprint $table) {
            $table->id();
            $table->char('weir_id',15);
            $table->char('weir_code',20);
            
            $table->double('area', 8, 2)->nullable();
            $table->double('L', 8, 2)->nullable();
            $table->double('LC', 8, 2)->nullable();
            $table->double('H', 8, 2)->nullable();
            $table->double('S', 8, 2)->nullable();
            $table->double('c', 8, 2)->nullable();
            $table->double('I', 8, 2)->nullable();

            $table->double('Return_period', 8, 2)->nullable();
            $table->double('flow', 8, 2)->nullable();
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
        Schema::dropIfExists('weir_catchments');
    }
}
