<?php

namespace App\Http\Controllers;

use App\Models\Category\ItemType;
use App\Models\Category\LogisticProcess;
use App\Models\Category\Province;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $province = Province::all();
        $itemType = ItemType::all();
        $process = LogisticProcess::all();

        return view(
            'admin.category.index',
            compact([
                'province',
                'itemType',
                'process'
            ])
        );
    }

    public function storeProvince(Request $req)
    {
        Province::create([
            'name' => $req->name,
            'kh_name' => $req->kh_name,
            'code' => 'province00' . $req->code,
            'status' => '0'
        ]);

        return redirect()->back()->with('success', 'province created');
    }
    public function storeItemType(Request $req)
    {
        ItemType::create([
            'name' => $req->name,
            'kh_name' => $req->kh_name,
            'code' => 'itemType00' . $req->code,
            'status' => '0'
        ]);

        return redirect()->back()->with('success', 'province created');
    }
    public function storeProcess(Request $req)
    {
        LogisticProcess::create([
            'name' => $req->name,
            'kh_name' => $req->kh_name,
            'code' => 'process00' . $req->code,
            'status' => '0'
        ]);

        return redirect()->back()->with('success', 'Process created');
    }


    public function updateProvince(Request $req, string $id)
    {
        $province = Province::findOrFail($id);
        $province->update([
            'name' => $req->name,
            'kh_name' => $req->kh_name,
            'code' => $req->code,
        ]);

        return redirect()->back()->with('success', 'province updated');
    }
    public function updateItemType(Request $req, string $id)
    {
        $province = ItemType::findOrFail($id);
        $province->update([
            'name' => $req->name,
            'kh_name' => $req->kh_name,
            'code' => $req->code,
        ]);

        return redirect()->back()->with('success', 'province updated');
    }
    public function updateProcess(Request $req, string $id)
    {
        $province = LogisticProcess::findOrFail($id);
        $province->update([
            'name' => $req->name,
            'kh_name' => $req->kh_name,
            'code' => $req->code,
        ]);

        return redirect()->back()->with('success', 'Process updated');
    }

    public function removeProvince(string $id)
    {
        $province = Province::findOrFail($id);
        $province->update([
            'status' => '1'
        ]);

        return redirect()->back()->with('error', 'province removed');
    }
    public function removeItemType(string $id)
    {
        $province = ItemType::findOrFail($id);
        $province->update([
            'status' => '1'
        ]);

        return redirect()->back()->with('error', 'province removed');
    }
    public function removeProcess(string $id)
    {
        $province = LogisticProcess::findOrFail($id);
        $province->update([
            'status' => '1'
        ]);

        return redirect()->back()->with('error', 'Process removed');
    }

    public function activeProvince(string $id)
    {
        $province = Province::findOrFail($id);
        $province->update([
            'status' => '0'
        ]);

        return redirect()->back()->with('success', 'Province active');
    }
    public function activeItemType(string $id)
    {
        $province = ItemType::findOrFail($id);
        $province->update([
            'status' => '0'
        ]);

        return redirect()->back()->with('success', 'Item Type active');
    }
    public function activeProcess(string $id)
    {
        $province = LogisticProcess::findOrFail($id);
        $province->update([
            'status' => '0'
        ]);

        return redirect()->back()->with('success', 'Process active');
    }
}
