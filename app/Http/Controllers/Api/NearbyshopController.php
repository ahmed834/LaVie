<?php

namespace App\Http\Controllers\Api;

use App\Models\Nearbyshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NearbyshopResource;
use App\Http\Controllers\Api\ApiResponseTrait;

class NearbyshopController extends Controller
{
    
    use ApiResponseTrait;
    public function index(){
        $Nearbyshops = NearbyshopResource::collection(Nearbyshop::get());
        // $msg=["ok"];
        // return response($posts ,200,$msg);

        return $this->apiResponse($Nearbyshops , "ok" , 200);
    }
   
}
