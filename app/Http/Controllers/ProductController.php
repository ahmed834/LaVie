<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(){
        $products= Product::select('id','name', 'description' , 'image')
        ->orderBy('id','DESC')
        ->paginate(3);

        return view('products.index',[
            'products' => $products
        ]);
    }

    public function show($productId){
        
        $product = Product::findOrFail($productId);
       
    // $category->load('books');
      
        return view('products.show',[
            'product' => $product
        ]);

       
    }


    public function create(){
        
        return view('products.create');
    }



    public function store( Request $request){
        //validation
        $data = $request ->validate([
            'name' => 'required|string|max:100' ,
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg|max:5120',
        ]);

        $FileName = Storage::putFile("public/products" , $data['image']);

        $data['image'] = $FileName;

        Product::create($data);
       
        // Category::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'img' => $request->img,
        // ]) ;

        return redirect(url('/products'));


    }


    public function edit($productId){
        $product = Product::findOrFail($productId);

        return view('products.edit',[
            'product' => $product
        ]);

    }


    public function update(Product $product , Request $request){
        //validation
        $data =  $request -> validate([
          'name' => "required | string | max:100" ,
          'description' => 'required',
          'image' => 'nullable|image|mimes:png,jpg|max:5120',
      ]);

      if($request->hasFile('image')){
          Storage::delete($product->image);
          $FileName = Storage::putFile("public/products",$data['image']);
          $data['image'] = $FileName;
      }
 

      $product->update($data);

      return redirect(url('/products'));

}

public function destroy( Product $product){
    Storage::delete($product->image);
    $product->delete();
    //Category::findOrFail($categoryID)->delete();
    return redirect(url('/products'));
}






    
}
