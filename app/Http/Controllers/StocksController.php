<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class StocksController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $stocks = Stock::orderBy('symbol', 'asc')->simplePaginate(50);

      return view('stocks.index', compact('stocks'));
    }

    public function search()
    {
      $search = request('search');
      $query = Stock::orderBy('symbol', 'asc');

      if (!empty(request('by_symbol')) && !empty(request('by_name'))) {
        $query->searchBySymbol($search)->searchByName($search, true);
      } elseif (!empty(request('by_symbol'))) {
        $query->searchBySymbol($search);
      } elseif (!empty(request('by_name'))) {
        $query->searchByName($search);
      }


      $stocks = $query->simplePaginate(50);

      return view('stocks.index', compact('stocks'));

    }

    public function show(Stock $stock)
    {
      return view('stocks.show', compact('stock'));
    }
}
