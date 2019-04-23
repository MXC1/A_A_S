<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
			
			$table->string('name', 20);
			$table->date('dob');
			$table->string('species', 20);
			$table->string('description', 500);
			$table->integer('availability')->default(0);
			$table->integer('ownerid', 11)->nullable();
			$table->string('image', 256)->nullable();
			
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
        Schema::dropIfExists('animals');
    }
}
