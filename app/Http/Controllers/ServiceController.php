<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;

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
            $product->load('sale', 'reviews.client');
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

    public function category($category){
        $list = [
            [
                'title' => 'خدمات الشعر',
                'items' => [
                    'تساريح الشعر',
                    'صبغات الشعر',
                    'العناية بالشعر',
                ],
            ],
            [
                'title' => 'المعالجات',
                'items' => [
                    'المعالجات الحارة',
                    'المعالجات الباردة',
                ],
            ],
            [
                'title' => 'المكياج',
                'items' => [
                    'مكياج أساسي',
                    'مكياج مؤقت',
                ],
            ],
            [
                'title' => 'قسم العناية',
                'items' => [
                    'عناية بالأيدي والأرجل',
                    'حمام مغربي',
                    'تنظيف البشرة',
                    'إزالة الشعر',
                ],
            ],
            [
                'title' => 'بكجات العروس',
                'items' => [
                    'الملكة',
                    'عروس VIP',
                ],
            ],
        ];

        $item = Arr::first($list, function ($item) use ($category) {
            return $item['title'] === $category;
        });
        
        if ($item) {
            $subs = [];
            foreach($item['items'] as $sub){
                $services = Product::where('type', 'خدمة')
                ->whereHas('categories', function($query) use ($sub){
                    $query->where('name', $sub);
                })
                ->get();
                $services->load('categories', 'sale');

                $subs[] = [
                    'title' => $sub,
                    'items' => $services
                ];
            }

            return view('client.categories', compact('category', 'subs'));
        }else{
            abort(404);
        }
        
    }
}
