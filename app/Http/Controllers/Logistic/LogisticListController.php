<?php

namespace App\Http\Controllers\Logistic;

use Illuminate\Support\Facades\DB;
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
      try {
         $provinces = Province::all();
         $processes = LogisticProcess::all();
         $itemTypes = ItemType::all();

         $logistics = DB::select('SELECT i.id, i.name, i.photo, i.description, i.price, i.item_price, i.status, i.payment_method, i.created_at, t.name AS item_type, pf.name AS from_location, pt.name AS to_destination, pr.name AS process FROM logistic_items i LEFT JOIN item_types t ON i.item_type = t.id LEFT JOIN provinces pf ON i.from_location = pf.id LEFT JOIN provinces pt ON i.to_destination = pt.id LEFT JOIN logistic_processes pr ON i.process = pr.id ORDER BY i.id DESC');

         return view(
            'admin.logistic.logisticList',
            compact([
               'logistics',
               'provinces',
               'processes',
               'itemTypes',
            ])
         );
      } catch (\Exception $e) {
         echo 'Error: ' . $e->getMessage();
      }
   }

   public function storeLogistic(Request $req)
   {
      try {
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
      } catch (\Exception $e) {
         echo 'Error: ' . $e->getMessage();
      }
   }
}
