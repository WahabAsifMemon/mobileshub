<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('slug', 100);

            $table->string('designation', 100);
            $table->string('edition_number', 100)->nullable();
            $table->string('availability', 100)->nullable();
            $table->string('price', 100)->nullable();
            

            $table->string('camera', 100)->nullable();
            $table->string('battery_mah', 100)->nullable();
            $table->string('variation', 100)->nullable();



            $table->string('mobile_img', 200);
            $table->text('description')->nullable();
            $table->string('status', 10);
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
        Schema::dropIfExists('product');
    }
}
