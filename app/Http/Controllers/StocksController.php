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
      $stocks = Stock::simplePaginate(50);

      return view('stocks.index', compact('stocks'));
    }
}
