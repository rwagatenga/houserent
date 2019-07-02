<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('province');
            $table->string('district');
            $table->string('sector');
            $table->string('address');
            $table->string('house_class');
            $table->string('house_type');
            $table->string('bedroom');
            $table->string('bathroom');
            $table->string('kitchen');
            $table->string('parking');
            $table->string('first_photo');
            $table->string('inside_photos');
            $table->string('price');
            $table->string('currency');
            $table->string('negotiate');
            $table->string('commission')->nullable();
            $table->string('details');
            $table->string('status');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('user_id');
            $table->integer('agent_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
