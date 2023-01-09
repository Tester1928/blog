<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropToBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop("blogs");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->date('date_add')->default(date("Y-m-d"));
            $table->string('title');
            $table->string("author")->nullable();
            $table->string('preview_text');
            $table->string('preview_picture');
            $table->text('detail_text')->nullable();
            $table->string('detail_picture')->nullable();
            $table->string('count_comments')->nullable();
            $table->timestamps();
        });
    }
}
