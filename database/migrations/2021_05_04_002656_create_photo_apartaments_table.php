<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoApartamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_apartaments', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->bigInteger('apartament_id')->unsigned();
            $table->foreign('apartament_id')->references('id')->on('apartaments')->onDelete('cascade');
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
        Schema::dropIfExists('photo_apartaments');
    }
}
