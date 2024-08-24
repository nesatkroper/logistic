<?php

namespace App\Http\Controllers\Logistic;

use App\Models\Category\ItemType;
use App\Models\Category\LogisticProcess;
use App\Models\Category\Province;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        try {
            $provinces = Province::all();
            $processes = LogisticProcess::all();
            $itemTypes = ItemType::all();

            $logistics = DB::select('SELECT i.id, i.name, i.photo, i.payment_method, pf.name AS from_location, pt.name AS to_destination, pr.name AS process FROM logistic_items i LEFT JOIN provinces pf ON i.from_location = pf.id LEFT JOIN provinces pt ON i.to_destination = pt.id LEFT JOIN logistic_processes pr ON i.process = pr.id WHERE pr.id NOT IN (5,6)');

            return view(
                'admin.logistic.transfer',
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
}
