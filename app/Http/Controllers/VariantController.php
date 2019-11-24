<?php

namespace App\Http\Controllers;

use App\Exceptions\ObjectNotFoundException;
use App\Http\Infrastructure\VariantRepository;
use App\Http\Infrastructure\VariantService;
use App\Http\Requests\VariantRequest;
use App\Product;
use App\Variant;
use Exception;
use Illuminate\Http\Response;

class VariantController extends Controller
{

    private $products;

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->products = Product::pluck('name', 'id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $variants = Variant::all();
        $cheapVariant = VariantService::getCheapVariant();
        $avgPrices = VariantService::avgPrices();
        ;
        return view('variants.index', [
            'variants' => $variants,
            'cheapVariant' => $cheapVariant,
            'avgPrice' => round($avgPrices->price,2),
            'avgOptionalPrice' => round($avgPrices->optional_price,2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('variants.create', ['variants' => $this->products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VariantRequest $request
     * @return Response
     */
    public function store(VariantRequest $request)
    {
        $variant = Variant::create($request->all());
        $variant->products()->attach($request->get('products'));

        return redirect()->route('variants.edit', $variant->id)
            ->with('info', 'Variante creada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     * @throws ObjectNotFoundException
     */
    public function show($id)
    {
        VariantService::checkIfVariantExist($id);
        $variant = Variant::find($id);
        return view('variants.show', ['variant' => $variant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     * @throws ObjectNotFoundException
     */
    public function edit($id)
    {
        VariantService::checkIfVariantExist($id);
        $variant = Variant::find($id);
        return view('variants.edit', ['products' => $this->products, 'variant' => $variant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VariantRequest $request
     * @param int $id
     * @return Response
     * @throws ObjectNotFoundException
     */
    public function update(VariantRequest $request, $id)
    {
        VariantService::checkIfVariantExist($id);

        $variant = Variant::find($id);

        $variant->fill($request->all())->save();

        $variant->products()->sync($request->get('products'));

        return redirect()->route('variants.edit', $variant->id)
            ->with('info', 'Variante actualizada con éxito!');
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
        VariantService::checkIfVariantExist($id);

        $variant = Variant::find($id);

        $variant->delete();

        return back()->with('info','La talla ' . $variant->name . ' se ha eliminado con éxito' );
    }

}
