<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Category;
use App\Models\Product;

class ServiceController extends Controller
{
    public function allServices(){
        $services = Product::where('type', 'خدمة')->get();
        $services->load('categories', 'sale');
        $category = 'جميع الخدمات';
        return view('client.service', compact('services', 'category'));
    }

    public function loadByCategory($category){
        $services = Product::where('type', 'خدمة')
        ->whereHas('categories', function($query) use ($category){
            $query->where('name', $category);
        })
        ->get();

        $services->load('categories', 'sale');
        return view('client.service', compact('services', 'category'));
    }

    public function loadProducts(){
        $services = Product::where('type', 'منتوج')->get();
        $services->load('categories', 'sale');
        $category = 'جميع المنتجات';
        return view('client.service', compact('services', 'category'));
    }

    public function details($id){
        try{
            $product = Product::findOrFail($id);
            $product->load('sale');
            return view('client.details', compact('product'));
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    public function allAPiServices(){
        $services = Product::all();
        $services->load('sale');
        return response()->json($services);
    }
}
