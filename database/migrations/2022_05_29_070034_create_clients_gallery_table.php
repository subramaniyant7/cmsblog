<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_gallery', function (Blueprint $table) {
            $table->id('clients_gallery_id');
            $table->integer('clients_gallery_client');
            $table->integer('clients_gallery_category');
            $table->integer('clients_gallery_subcategory')->nullable();
            $table->string('clients_gallery_date');
            $table->string('clients_gallery_location');
            $table->string('clients_gallery_budget');
            $table->text('clients_gallery_description');
            $table->integer('clients_gallery_created_by');
            $table->integer('status');
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
        Schema::dropIfExists('clients_gallery');
    }
}
