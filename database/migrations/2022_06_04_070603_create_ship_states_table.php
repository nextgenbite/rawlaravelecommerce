<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_states', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->contrained('divisions')->onDelete('cascade');
            $table->foreignId('district_id')->contrained('districts')->onDelete('cascade');
            
            $table->string('state_name');
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
        Schema::dropIfExists('ship_states');
    }
}
