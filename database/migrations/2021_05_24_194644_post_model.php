<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('post', function(Blueprint $table){
            $table->id("id");
            $table->mediumText("content");
            $table->text("title");
            $table->text("status")->default("POSTED");  //POSTED | DRAFT
            $table->dateTime("publication_date");
            $table->timestamps();
            $table->unsignedBigInteger("poster_id")->nullable();

            $table->foreign("poster_id")
                ->references("id")
                ->on("users")
                ->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("post");
    }
}
