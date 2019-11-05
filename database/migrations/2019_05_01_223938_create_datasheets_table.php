<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasheets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vehicle_id');
            $table->date('last_oil')->nullable();
            $table->date('next_oil')->nullable();
            $table->date('warranty')->nullable();
            $table->string('maintenance_description')->nullable();
            $table->date('maintenance_expected_date')->nullable();
            $table->date('maintenance_date_held')->nullable();
            $table->date('repair_date_held')->nullable();
            $table->string('repair_description')->nullable();
            $table->string('repair_professional')->nullable();
            $table->string('repair_professional_contact')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datasheets');
    }
}
