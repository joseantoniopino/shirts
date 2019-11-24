<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Variant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    private $variants;

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->variants = Variant::pluck('name', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create', ['variants' => $this->variants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->variants()->attach($request->get('variants'));

        return redirect()->route('products.edit', $product->id)
            ->with('info', 'Producto creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['variants' => $this->variants, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);

        $product->fill($request->all())->save();

        $product->variants()->sync($request->get('variants'));

        return redirect()->route('products.edit', $product->id)
            ->with('info', 'Producto actualizada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('info', $product->name . ' se ha eliminado con éxito' );
    }
}
