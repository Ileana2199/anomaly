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
        Schema::create('components', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('title')->nullable(false);
            $table->BigInteger('subsystem_id')->unsigned();
            $table->BigInteger('system_id')->unsigned();
            $table->BigInteger('equipment_id')->unsigned();
            $table->BigInteger('area_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('subsystem_id')->references('id')->on('subsystems')->onDelete("cascade");
            $table->foreign('system_id')->references('id')->on('systems')->onDelete("cascade");
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete("cascade");
            $table->foreign('area_id')->references('id')->on('areas')->onDelete("cascade");
           


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
