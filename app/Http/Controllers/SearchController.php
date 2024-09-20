<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Biography;
use App\Order;
use App\Product;
use DB;

class SearchController extends Controller
{
    public function searchOrder()
      {
        $biographies = Biography::latest()->orderByRaw('(id)desc LIMIT 1')->get();

        $q = Input::get ( 'q' );
        if($q != ""){
          $orders = Order::where ( 'id', $q )->get ();
          if (count ( $orders ) > 0)
            return view ( 'orderSearchResult', compact('biographies') )->withDetails ( $orders )->withQuery ( $q );
          else
            return view ( 'orderSearchResult', compact('biographies') )->withMessage ("");
        }
      }
}
