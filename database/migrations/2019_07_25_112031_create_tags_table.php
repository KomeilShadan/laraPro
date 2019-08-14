<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('order_tag', function (Blueprint $table) {   //* O...T singular and sequential alphabet for pivot table name
            $table->bigInteger('order_id')->unsigned()->index();
            $table->bigInteger('tag_id')->unsigned()->index();

            $table->primary(['order_id', 'tag_id']);

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->timestamps();   // *
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_tag');  // * drop the constraint first!
        Schema::dropIfExists('tags');
    }
}
