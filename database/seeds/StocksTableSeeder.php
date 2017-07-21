<?php

use Crockett\CsvSeeder\CsvSeeder;

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

        $this->seedFromCSV(database_path("seeds/stock_names/nyse.csv"), 'stocks');
        $this->seedFromCSV(database_path("seeds/stock_names/amex.csv"), 'stocks');
        $this->seedFromCSV(database_path("seeds/stock_names/nasdaq.csv"), 'stocks');
    }
}
