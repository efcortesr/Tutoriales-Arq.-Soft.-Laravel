<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Productos de ejemplo (estilo del curso)
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV", "price" => "499.99"],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone", "price" => "899.00"],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast", "price" => "49.99"],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses", "price" => "29.99"],
    ];

    private static function getProducts(): array
    {
        $sessionProducts = session('products', []);
        return array_merge(self::$products, $sessionProducts);
    }

    private static function findProductById(string $id): ?array
    {
        foreach (self::getProducts() as $product) {
            if ((string) $product['id'] === (string) $id) {
                return $product;
            }
        }

        return null;
    }

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] = "List of products";
        $viewData["products"] = self::getProducts();

        return view('product.index')->with("viewData", $viewData);
    }

    /**
     * Show a product or redirect to home if not found.
     *
     * @return View | \Illuminate\Http\RedirectResponse
     */
    public function show(string $id): View|\Illuminate\Http\RedirectResponse
    {
        $product = self::findProductById($id);
        if (!$product) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $viewData["title"] = $product["name"] . " - Online Store";
        $viewData["subtitle"] = $product["name"];
        $viewData["product"] = $product;

        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|gt:0',
            'description' => 'nullable|max:255',
        ]);

        // crear producto temporal y guardarlo en sesión (estilo demo del curso)
        $all = self::getProducts();
        $nextId = (string) (count($all) + 1);

        $newProduct = [
            'id' => $nextId,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ];

        $sessionProducts = $request->session()->get('products', []);
        $sessionProducts[] = $newProduct;
        $request->session()->put('products', $sessionProducts);

        // mostrar vista de éxito con mensaje (actividad opcional)
        $viewData = [];
        $viewData['title'] = 'Product created';
        $viewData['subtitle'] = 'Product created successfully';
        $viewData['message'] = 'Product created successfully!';

        return view('product.created')->with('viewData', $viewData);
    }
}

