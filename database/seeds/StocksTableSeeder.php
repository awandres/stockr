<?php

use Illuminate\Database\Seeder;
use Crockett\CsvSeeder\CsvSeeder;
use App\Stock;

class StocksTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MARKETS = ['amex', 'nasdaq', 'nyse'];

        $this->aliases = [
          'Name' => 'name',
          'Symbol' => 'symbol',
          'Sector' => 'sector'
        ];

        $this->mapping = [
          0 => 'Symbol',
          1 => 'Name',
          5 => 'Sector',
          6 => 'industry'
        ];
        
        // foreach ($MARKETS as $market) {
        //   if (($handle = fopen (database_path("seeds/stock_names/{$market}.csv"), 'r')) !== FALSE)
        //   {
        //     while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
        //       $stock = new Stock();
        //       $stock->symbol = $data[0];
        //       $stock->name = $data[1];
        //       $stock->sector = $data[5];
        //       $stock->industry = $data[6];
        //       $stock->save();
        //     }
        //     fclose ( $handle );
        //   }
        // }

        $this->seedFromCSV(database_path("seeds/stock_names/nasdaq.csv"), 'stocks');
        $this->seedFromCSV(database_path("seeds/stock_names/nyse.csv"), 'stocks');
        $this->seedFromCSV(database_path("seeds/stock_names/amex.csv"), 'stocks');
    }
}
