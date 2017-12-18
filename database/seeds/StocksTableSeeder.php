<?php

use Illuminate\Database\Seeder;
use Crockett\CsvSeeder\CsvSeeder;
use App\Stock;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $MARKETS = ['amex', 'nasdaq', 'nyse'];

        foreach ($MARKETS as $market) {
          if (($handle = fopen (database_path("seeds/stock_names/{$market}.csv"), 'r')) !== FALSE)
          {
            while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
              if( !empty($data[0])
                  && !Stock::where('symbol', $data[0])->exists()
                  && $data[0] != 'Symbol') {

                $stock = new Stock();
                $stock->symbol = $data[0];
                $stock->name = $data[1];
                $stock->sector = $data[5];
                $stock->industry = $data[6];
                $stock->createSlug();
                $stock->save();
              }
            }
            fclose ( $handle );
          }
        }
    }
}
