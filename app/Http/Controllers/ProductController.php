<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    /**
     * Show a product or redirect to home if not found.
     */
    public function show(string $id): View|\Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        if (! $product) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $viewData['title'] = $product->name.' - Online Store';
        $viewData['subtitle'] = $product->name;
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        Product::create($request->only(['name', 'price']));

        return back();
    }
}
