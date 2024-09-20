<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Order;
use Illuminate\Support\Str;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class OrderController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
      $users = User::latest()->get();
      if (Auth::check()){
      $userID = Auth::user()->id;
    }
      $orders = DB::table('orders as or')
               ->leftJoin('users as u', 'or.source_id', '=', 'u.id')
               ->leftJoin('users as ur', 'or.destination_id', '=', 'ur.id')
               ->select('or.*', 'u.site as source', 'ur.site as destination')
              ->orderByRaw('(or.created_at)desc')
              ->where('or.source_id', $userID)
              // ->where('or.destination_id', $userID)
              ->get();

      // $orders = Order::get()->where('source_id', '==', $userid);
    	return view('orders.addOrder', compact('orders', 'users'));
    }

    public function pending() {
        if (Auth::check()){
        $userID = Auth::user()->id;
      }
      $orders = DB::table('orders as or')
              ->leftJoin('users as u', 'or.source_id', '=', 'u.id')
              ->leftJoin('users as ur', 'or.destination_id', '=', 'ur.id')
              ->select('or.*', 'u.site as source', 'ur.site as destination')
              ->orderByRaw('(or.created_at)desc')
              ->where('or.destination_id', $userID)
              ->where('or.status', 1)
              ->get();
      return view('orders.pending', compact('orders'));
    }

    public function sent() {
      if (Auth::check()){
      $userID = Auth::user()->id;
    }

      $orders = DB::table('orders as or')
              ->leftJoin('users as u', 'or.source_id', '=', 'u.id')
              ->leftJoin('users as ur', 'or.destination_id', '=', 'ur.id')
              ->select('or.*', 'u.site as source', 'ur.site as destination')
              ->orderByRaw('(or.created_at)desc')
              ->where('or.destination_id', $userID)
              ->where('or.status', 2)
              ->get();
      return view('orders.sent', compact('orders'));
    }

    public function ready() {
      if (Auth::check()){
      $userID = Auth::user()->id;
    }

      $orders = DB::table('orders as or')
              ->leftJoin('users as u', 'or.source_id', '=', 'u.id')
              ->leftJoin('users as ur', 'or.destination_id', '=', 'ur.id')
              ->select('or.*', 'u.site as source', 'ur.site as destination')
              ->orderByRaw('(or.created_at)desc')
              ->where('or.destination_id', $userID)
              ->where('or.status', 3)
              ->get();
      return view('orders.ready', compact('orders'));
    }

    public function delivered() {
      if (Auth::check()){
      $userID = Auth::user()->id;
    }

      $orders = DB::table('orders as or')
              ->leftJoin('users as u', 'or.source_id', '=', 'u.id')
              ->leftJoin('users as ur', 'or.destination_id', '=', 'ur.id')
              ->select('or.*', 'u.site as source', 'ur.site as destination')
              ->orderByRaw('(or.created_at)desc')
              ->where('or.destination_id', $userID)
              ->where('or.status', 4)
              ->get();
      return view('orders.delivered', compact('orders'));
    }

    // save student
    public function store(Request $req) {
        $config = [
            'table' => 'orders',
            'length' => 4,
            'prefix' => date('y'),
            'reset_on_prefix_change' => true
        ];
       $order_id = IdGenerator::generate($config);
    	 $this->validate($req, [
    		'senderName' => 'required',
    		'senderPhone' => 'required',
    		'product' => 'required',
    		'destination_id' => 'required',
    		'receiverName' => 'required',
    		'receiverPhone' => 'required',
    		'status' => 'required',
    	]);
    	$order = new Order();
        $order->id = $order_id;
        $order->source_id = Auth::user()->id;
        $order->senderName = $req->senderName;
      	$order->senderPhone = $req->senderPhone;
      	$order->product = $req->product;
      	$order->destination_id = $req->destination_id;
      	$order->receiverName = $req->receiverName;
      	$order->receiverPhone = $req->receiverPhone;
      	$order->status = $req->status;
    	try {
    		$order->save();
            session()->flash('success', 'موفقانه ثبت شد');
    		session()->flash('order_id', $order_id);
    		return back();
    	} catch (Exception $e) {
    		session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
    		return back();
    	}
    }


    public function confirm($id) {
     $order = DB::select('select * from orders where id = ?',[$id]);
     return view('orders.confirmOrder',['order'=>$order]);
    }



        public function show($id) {
         $users = User::latest()->get();
         $order = DB::select('select * from orders where id = ?',[$id]);
         return view('orders.editOrder',['order'=>$order, 'users'=>$users]);
       }


      public function edit(Request $req) {
          $this->validate($req, [
            'senderName' => 'required',
            'senderPhone' => 'required',
            'product' => 'required',
            'destination_id' => 'required',
            'receiverName' => 'required',
            'receiverPhone' => 'required',
            'status' => 'required',
          ]);

          $order = Order::find($req->id);

          $order->senderName = $req->senderName;
          $order->senderPhone = $req->senderPhone;
          $order->product = $req->product;
          $order->destination_id = $req->destination_id;
          $order->receiverName = $req->receiverName;
          $order->receiverPhone = $req->receiverPhone;
          $order->status = $req->status;
          try {
              $order->save();
              session()->flash('success', 'موفقانه ثبت شد');
              return redirect('/order');
          } catch (Exception $e) {
              session()->flash('failed', 'ذخیره نشد. لطفا دوباره کوشش کنید.');
              return back();
          }
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
     public function destroy($id) {
     DB::delete('delete from orders where id = ?',[$id]);
     return back();
   }


}
