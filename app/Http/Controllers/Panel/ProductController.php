<?php

namespace App\Http\Controllers\Panel;

use App\PanelProduct;
use Illuminate\Http\Request;
use App\Scopes\AvailableScope;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        return view('products.index')->with([
            'products' => PanelProduct::all()
        ]);
    }

    public function create()
    {
        return view('products.create');
    }
    
    public function store(ProductRequest $request)
    {
        $product = PanelProduct::create( $request->validated() );

        // return redirect()->back(); // redirige al formulario
        // return redirect()->action('ProductController@index');
        // session()->flash('success', "The new product with id {$product->id} was created");

        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
    }

    public function show(PanelProduct $product)
    {
        return view('products.show')->with([
            'product' => $product
        ]);
    }
    
    public function edit(PanelProduct $product)
    {
        return view('products.edit')->with([
            'product' => $product
        ]);
    }
    
    public function update(ProductRequest $request, PanelProduct $product)
    {
        dd($request->validated());
        $product->update( $request->validated() );

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }
    
    public function destroy(PanelProduct $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was deleted");;
    }
}
