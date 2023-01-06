<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use ApiResponseTrait;

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required',
            'the_order' => 'required',
            'country' => 'required',
            'city' => 'required',
            'adress' => 'required',
            'phone' => 'required',
            
        ]);

        if ($validator->fails()) {
            
            return $this->apiResponse( null, $validator->errors() , 400);
        }


        $order = Order::create($request->all());

        if($order){
            return $this->apiResponse(new OrderResource($order) , "Data save" , 201);
        }

        return $this->apiResponse( null, "data not save" , 400);


    }

}
