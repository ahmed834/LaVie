<?php

namespace App\Http\Controllers\Api;



use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;

class ProductController extends Controller
{

    use ApiResponseTrait;
    public function index(){
        $products = ProductResource::collection(Product::get());
        // $msg=["ok"];
        // return response($posts ,200,$msg);

        return $this->apiResponse($products , "ok" , 200);
    }
   
}
