<?php

namespace App\Http\Controllers\Logistic;

use App\Models\Category\ItemType;
use App\Models\Category\LogisticProcess;
use App\Models\Category\Province;
use App\Models\Logistic\LogisticItem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogisticListController extends Controller
{
   public function index()
   {
      $logistics = LogisticItem::all();
      $provinces = Province::all();
      $processes = LogisticProcess::all();
      $itemTypes = ItemType::all();
      return view(
         'admin.logistic.logisticList',
         compact([
            'logistics',
            'provinces',
            'processes',
            'itemTypes',
         ])
      );
   }

   public function storeLogistic(Request $req)
   {
      $imgName = null;
      if ($req->hasFile('photo')) {
         $img = $req->file('photo');
         $imgName = 'logisticItem' . time() . '.' . $img->getClientOriginalExtension();
         $img->move(public_path('logisticItem'), $imgName);
      }

      LogisticItem::create([
         'photo' => $imgName,
         'name' => $req->name,
         'description' => ' ' . $req->description,
         'price' => $req->price,
         'item_price' => $req->item_price,
         'item_type' => $req->item_type,
         'payment_method' => $req->payment_method,
         'from_location' => $req->from_location,
         'to_destination' => $req->to_destination,
         'process' => $req->process,
         'status' => '0',
      ]);

      return redirect()->back()->with('success', 'Success');
   }
}
