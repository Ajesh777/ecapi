<?php

namespace App\Http\Controllers;

use App\Model\Review;
use Illuminate\Http\Request;
// 12.0 Use Product Model:
use App\Model\Product;
// 12.01 Use ReviewResource collection:
use App\Http\Resources\ReviewResource;
// 29.1 Use ReviewRequest created & HttpFoundation Library:
use App\Http\Requests\ReviewRequest;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * 12.1 @parms Product id
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        // 12.2 Get all the reviews for the Product:
        return ReviewResource::collection($product->reviews);
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
     * 29.2 @param \App\Model\Product $product
     * 29.3 @param \App\Http\Requests\ReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request, Product $product)
    {
        // 29.4 return test:
            //return $product;

        // 29.5 Create Review in db:
            $review = new Review($request->all());

        // 29.6 Create Review with Right Product id:
            $product->reviews()->save($review);

        // 29.7 Response Msg:
            return response([
                'data' => new ReviewResource($review)
            ], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * 32.2 @param \App\Model\Product $product
     * 32.3 @param \App\Http\Requests\ReviewRequest  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, ReviewRequest $request, Review $review)
    {
        // 32.4 Return Review test:
            return $review;

        // 32.5 Update the Review:
            $review->update($request->all());

        // 32.6 Response Msg:
            return response([
                'data' => new ReviewResource($review)
            ], Response::HTTP_CREATED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * 33.2 @param \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Review $review)
    {
        // 33.3 Delete the Review:
            $review->delete();

        // 33.4 Response Msg:
            return response(null, Response::HTTP_NO_CONTENT);
    }
}
