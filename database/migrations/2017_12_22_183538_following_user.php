<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FollowingUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('following_user', function (Blueprint $table) {
          $table->engine = "InnoDB";

          $table->increments('id');
          $table->timestamps();
          $table->integer('following_id')->unsigned();
          $table->integer('user_id')->unsigned();

          $table->foreign('following_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('following_user', function (Blueprint $table) {
        $table->dropForeign(['following_id']);
        $table->dropForeign(['user_id']);
      });

      Schema::dropIfExists('following_user');
    }
}
