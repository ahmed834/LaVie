<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearbyshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nearbyshops', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->text('phone');
            $table->string('image')->nullable();
            $table->string('type_of_products')->default('plants');
            
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
        Schema::dropIfExists('nearbyshops');
    }
}
