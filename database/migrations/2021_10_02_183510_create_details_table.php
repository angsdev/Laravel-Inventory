<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Details', function (Blueprint $table) {
          $table->id();
          $table->foreignId('item_id')->references('id')->on('Items')->onUpdate('no action')->onDelete('cascade');
          $table->foreignId('type_id')->references('id')->on('DetailTypes')->onUpdate('no action')->onDelete('cascade');
          $table->string('value');
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
        Schema::dropIfExists('Details');
    }
}
