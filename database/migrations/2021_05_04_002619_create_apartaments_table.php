<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartaments', function (Blueprint $table) {
            $table->id();
            $table->integer('build')->unsigned();
            $table->integer('price')->unsigned();
            $table->text('video')->nullable();
            $table->integer('status')->default(1)->unsigned();
            $table->text('description')->nullable();
            $table->bigInteger('flat_id')->unsigned();
            $table->foreign('flat_id')->references('id')->on('flats')->onDelete('cascade');
            $table->bigInteger('entrance_id')->unsigned();
            $table->foreign('entrance_id')->references('id')->on('entrances')->onDelete('cascade');
            $table->bigInteger('condiction_id')->unsigned();
            $table->foreign('condiction_id')->references('id')->on('condictions')->onDelete('cascade');
            $table->bigInteger('negociable_id')->unsigned();
            $table->foreign('negociable_id')->references('id')->on('negociables')->onDelete('cascade');
            $table->bigInteger('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('collaborators')->onDelete('cascade');
            $table->bigInteger('topology_id')->unsigned();
            $table->foreign('topology_id')->references('id')->on('topologies')->onDelete('cascade');
            $table->bigInteger('block_id')->unsigned();
            $table->foreign('block_id')->references('id')->on('blocks')->onDelete('cascade');
            $table->bigInteger('business_id')->unsigned();
            $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
            $table->bigInteger('available_id')->unsigned();
            $table->foreign('available_id')->references('id')->on('availables')->onDelete('cascade');

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
        Schema::dropIfExists('apartaments');
    }
}
