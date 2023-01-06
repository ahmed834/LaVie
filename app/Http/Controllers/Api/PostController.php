<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;



// Posts to communicate between users and each other


class PostController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $posts = PostResource::collection(Post::get());
        // $msg=["ok"];
        // return response($posts ,200,$msg);

        return $this->apiResponse($posts , "ok" , 200);
    }

    public function show($id){

        $posts = Post::find($id);

        if($posts){
            return $this->apiResponse(new PostResource($posts) , "ok" , 200);
        }

        return $this->apiResponse( null, "data not found" , 404);

    }


    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            
            return $this->apiResponse( null, $validator->errors() , 400);
        }


        $posts = Post::create($request->all());

        if($posts){
            return $this->apiResponse(new PostResource($posts) , "Data save" , 201);
        }

        return $this->apiResponse( null, "data not save" , 400);


    }


    public function update(Request $request , $id){

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            
            return $this->apiResponse( null, $validator->errors() , 400);
        }

        $posts = Post::find($id);

        if(! $posts){
            return $this->apiResponse( null, "data not found" , 404);

        }
      
        $posts->update($request->all());

        if($posts){
            return $this->apiResponse(new PostResource($posts) , "Data update" , 201);
        }

        return $this->apiResponse( null, "data not found" , 404);


    }


    public function destroy($id){

        $posts = Post::find($id);

        if(! $posts){
            return $this->apiResponse( null, "data not found" , 404);

        }

        $posts->delete($id);

        if($posts){
            return $this->apiResponse(null , "Data deleted" , 200);
        }
      
    }

}
