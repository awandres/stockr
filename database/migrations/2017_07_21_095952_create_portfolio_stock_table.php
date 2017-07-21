<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('portfolio_stock', function (Blueprint $table) {
             $table->engine = "InnoDB";

             $table->increments('id');
             $table->timestamps();
             $table->integer('portfolio_id')->unsigned();
             $table->integer('stock_id')->unsigned();

             $table->foreign('portfolio_id')
                   ->references('id')->on('portfolios');

             $table->foreign('stock_id')
                   ->references('id')->on('stocks');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('portfolios', function (Blueprint $table) {
           $table->dropForeign(['portfolio_id']);
           $table->dropForeign(['stock_id']);
         });

         Schema::dropIfExists('portfolio_stock');
     }
}
