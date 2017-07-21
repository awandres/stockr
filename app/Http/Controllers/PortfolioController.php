<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class PortfolioController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function add_stock()
    {
      $stock_id = request('stock_id');
      $stock = Stock::find($stock_id);
      $portfolio = auth()->user()->portfolio;

      // prevent a stock from being added twice
      if (!$portfolio->stocks->contains($stock_id)) {
        $portfolio->stocks()->attach($stock_id);
      }


      if (request()->ajax()) {
        return $stock;
      }

      return redirect()->route('dashboard');
    }

    public function remove_stock()
    {
      $stock_id = request('stock_id');
      $stock = Stock::find($stock_id);
      $portfolio = auth()->user()->portfolio;

      // prevent a stock from being added twice
      if ($portfolio->stocks->contains($stock_id)) {
        $portfolio->stocks()->detach($stock_id);
      }


      if (request()->ajax()) {
        return $stock;
      }

      return redirect()->route('dashboard');
    }


}
