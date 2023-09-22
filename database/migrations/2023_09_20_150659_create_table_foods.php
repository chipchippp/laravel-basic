<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('count');
            $table->longText('description');
            $table->timestamps();
            // foreign keys
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
            ->onDelete('cascade');
//            ->onDelete('set null');
        });
        //One category has many foods
//        Schema::create('categories', function (Blueprint $table){
//            $table->increments('id'); // category id
//            $table->string('name'); //category_name
//            $table->longText('description');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
