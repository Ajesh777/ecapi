<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
// 9.1 Use ProductCollection:
use App\Http\Resources\Product\ProductColleciton;
// 11.1 Use ProductResource:
use App\Http\Resources\Product\ProductResource;
// 18.1 Use ProductRequest:
use App\Http\Requests\ProductRequest;
// 18.7 Use Symfony\Response:
use Symfony\Component\HttpFoundation\Response;
// 27.0 Use Exception created:
use App\Exceptions\ProductNotOfUser;
use Auth;

class ProductController extends Controller
{
    // 17.1: Create Product Constructor for auth
        public function __construct()
        {
            $this->middleware('auth:api')->except('index', 'show');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 9.2 return all products with transformed api:
            //return ProductColleciton::collection(Product::all());
        // 9.3 paginate 9.2 with 5
            return ProductColleciton::collection(Product::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * 18.2: @param app\Http\Requests\ProductRequest
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // 18.3 Test:
            //return 'success';
        // 18.4 Request all product detail:
            //return  $request->all();

        // 18.5 Insert into product table:
            $product = new Product;
            $product->name = $request->name;
            $product->detail = $request->description;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->discount = $request->discount;
            $product->save();
        // 18.6 Return with success msg [201-HTTP_CREATED]:
            return response([
                'data' => new ProductResource($product)
            ],Response::HTTP_CREATED);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // 11.1 Testing Product api:
            //return $product;
        // 11.2 Return api standardised @ ProductResource:
            return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // 27.1 ProductUserCheck:
            $this->ProductUserCheck($product);

        // 18.7 Test:
            //return $request->all();

        // 18.8 Handle description to detail:
            $request['detail'] = $request->description;
            unset($request['description']);
        
        // 18.9 Update Product:
            $product->update($request->all());
        
        // 18.10 Return with success msg [201-HTTP_CREATED]:
        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // 27.2 ProductUserCheck:
            $this->ProductUserCheck($product);

        // 18.11 Test return:
            //return $product;

        // 18.12 Delete Product:
            $product->delete();
        
        // 18.13 Return with success msg [201-HTTP_NO_CONTENT]:
        return response(null,Response::HTTP_NO_CONTENT);
    }

    // 27.3 Function for ProductUserCheck:
        public function ProductUserCheck($product)
        {
            if (Auth::id() !== $product->user_id) {
                throw new ProductNotOfUser;
            }
        }
}
