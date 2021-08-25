<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuisioners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('jk');
            $table->string('usia');
            $table->string('membeli');
            $table->string('cara');
            $table->string('harapan1')->default(null);
            $table->string('harapan2')->default(null);
            $table->string('harapan3')->default(null);
            $table->string('harapan4')->default(null);
            $table->string('harapan7')->default(null);
            $table->string('harapan8')->default(null);
            $table->string('harapan9')->default(null);
            $table->string('harapan10')->default(null);
            $table->string('harapan11')->default(null);

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
        Schema::dropIfExists('kuisioners');
    }
}
