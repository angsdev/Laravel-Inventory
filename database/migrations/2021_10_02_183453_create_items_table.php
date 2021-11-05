<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('Users')->onUpdate('no action')->onDelete('cascade');
            $table->foreignId('type_id')->nullable()->references('id')->on('ItemTypes')->onUpdate('no action')->onDelete('cascade');
            $table->foreignId('brand_id')->nullable()->references('id')->on('Brands')->onUpdate('no action')->onDelete('cascade');
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
        Schema::dropIfExists('Items');
    }
}
