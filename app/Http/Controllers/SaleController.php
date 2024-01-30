<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Product;
use App\Models\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        $data = $sales->load('product');
        return view('admin.sale.list', compact('data'));
    }


    public function promotions($type, $category)
    {
        $sales = Sale::whereHas('product', function($query) use ($category, $type){
            $query->where('type', $type)->whereHas('categories', function($query) use ($category){
                $query->where('name', $category);
            });
        })->get();
        $sales->load('product.sale');
        $services = [];
        foreach($sales as $sale){
            $services[] = $sale->product;
        }
        $services = collect($services);
        return view('client.service', compact('services', 'category'));
    }

    public function create(){
        $services = Product::all();
        $services->load('sale');
        return view('admin.sale.test', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->service as $item){
            $service = Product::find($item);
            $newprice = $service->price; 
            $newprice -= $newprice*($request->percent/100);
            Sale::create([
                'product_id' => $service->id,
                'price' => $newprice
            ]);
        }

        return redirect('/sales');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $product = Product::findOrFail($id);
            return view('admin.sale.create', compact('product'));
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'price' => 'required|numeric',
                'product_id' => 'unique:sale' 
            ],
            [
                'price.required' => 'السعر مطلوب.',
                'price.numeric' => 'السعر يجب أن يكون رقمًا.',
                'product_id.unique' => 'هذه الخدمة موجودة بالفعل في التخفيضات.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }

            $product = Product::findOrFail($id);
            Sale::create([
                'product_id' => $id,
                'price' => $request->price
            ]);

            return redirect('/sales');
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $product = Sale::findOrFail($id);
            $product->delete();
            return redirect('/sales');
        }catch (ModelNotFoundException $e){
            abort(404);
        }
    }
}
