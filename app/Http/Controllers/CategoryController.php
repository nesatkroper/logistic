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
        try {
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
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function storeProvince(Request $req)
    {
        try {
            Province::create([
                'name' => $req->name,
                'kh_name' => $req->kh_name,
                'code' => 'province00' . $req->code,
                'status' => '0'
            ]);
            return redirect()->back()->with('success', 'province created');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function storeItemType(Request $req)
    {
        try {
            ItemType::create([
                'name' => $req->name,
                'kh_name' => $req->kh_name,
                'code' => 'itemType00' . $req->code,
                'status' => '0'
            ]);

            return redirect()->back()->with('success', 'province created');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function storeProcess(Request $req)
    {
        try {
            LogisticProcess::create([
                'name' => $req->name,
                'kh_name' => $req->kh_name,
                'code' => 'process00' . $req->code,
                'status' => '0'
            ]);

            return redirect()->back()->with('success', 'Process created');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function updateProvince(Request $req, string $id)
    {
        try {
            $province = Province::findOrFail($id);
            $province->update([
                'name' => $req->name,
                'kh_name' => $req->kh_name,
                'code' => $req->code,
            ]);

            return redirect()->back()->with('success', 'province updated');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function updateItemType(Request $req, string $id)
    {
        try {
            $province = ItemType::findOrFail($id);
            $province->update([
                'name' => $req->name,
                'kh_name' => $req->kh_name,
                'code' => $req->code,
            ]);

            return redirect()->back()->with('success', 'province updated');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function updateProcess(Request $req, string $id)
    {
        try {
            $province = LogisticProcess::findOrFail($id);
            $province->update([
                'name' => $req->name,
                'kh_name' => $req->kh_name,
                'code' => $req->code,
            ]);

            return redirect()->back()->with('success', 'Process updated');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function removeProvince(string $id)
    {
        try {
            $province = Province::findOrFail($id);
            $province->update([
                'status' => '1'
            ]);

            return redirect()->back()->with('error', 'province removed');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function removeItemType(string $id)
    {
        try {
            $province = ItemType::findOrFail($id);
            $province->update([
                'status' => '1'
            ]);

            return redirect()->back()->with('error', 'province removed');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function removeProcess(string $id)
    {
        try {
            $province = LogisticProcess::findOrFail($id);
            $province->update([
                'status' => '1'
            ]);

            return redirect()->back()->with('error', 'Process removed');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function activeProvince(string $id)
    {
        try {
            $province = Province::findOrFail($id);
            $province->update([
                'status' => '0'
            ]);

            return redirect()->back()->with('success', 'Province active');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function activeItemType(string $id)
    {
        try {
            $province = ItemType::findOrFail($id);
            $province->update([
                'status' => '0'
            ]);

            return redirect()->back()->with('success', 'Item Type active');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function activeProcess(string $id)
    {
        try {
            $province = LogisticProcess::findOrFail($id);
            $province->update([
                'status' => '0'
            ]);

            return redirect()->back()->with('success', 'Process active');
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
