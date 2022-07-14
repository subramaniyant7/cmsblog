<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagetype', function (Blueprint $table) {
            $table->id('page_id');
            $table->string('page_pagename');
            $table->string('page_subpagename');
            $table->text('page_content');
            $table->text('page_about');
            $table->string('page_title');
            $table->string('page_desc');
            $table->string('page_keyword');
            $table->string('page_abstract');
            $table->string('page_topic');
            $table->string('page_type');
            $table->string('page_author');
            $table->string('page_site');
            $table->string('page_copyright');
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
        Schema::dropIfExists('pagetype');
    }
}
