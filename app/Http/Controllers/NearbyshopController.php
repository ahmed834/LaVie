<?php

namespace App\Http\Controllers;

use App\Models\Nearbyshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NearbyshopController extends Controller
{
    public function index(){
        $Nearbyshops= Nearbyshop::select('id','name', 'address' , 'image' ,'phone')
        ->orderBy('id','DESC')
        ->paginate(3);

        return view('Nearbyshops.index',[
            'Nearbyshops' => $Nearbyshops
        ]);
    }


    public function show($NearbyshopId){
        
        $Nearbyshop = Nearbyshop::findOrFail($NearbyshopId);
       
    // $category->load('books');
      
        return view('Nearbyshops.show',[
            'Nearbyshop' => $Nearbyshop
        ]);

       
    }





    public function create(){
        
        return view('Nearbyshops.create');
    }



    public function store( Request $request){
        //validation
        $data = $request ->validate([
            'name' => 'required|string|max:100' ,
            'address' => 'required',
            'phone' => 'required|string|max:100',
            'image' => 'required|image|mimes:png,jpg|max:5120',
        ]);
 

        $FileName = Storage::putFile("public/Nearbyshops" , $data['image']);

        $data['image'] = $FileName;

        Nearbyshop::create($data);
       
        // Category::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'img' => $request->img,
        // ]) ;

        return redirect(url('/NearbyShops'));


    }







    public function edit($NearbyshopId){
        $Nearbyshop = Nearbyshop::findOrFail($NearbyshopId);

        return view('Nearbyshops.edit',[
            'Nearbyshop' => $Nearbyshop
        ]);

    }


    public function update(Nearbyshop $Nearbyshop , Request $request){
        //validation
        $data =  $request -> validate([
            'name' => 'required|string|max:100' ,
            'address' => 'required',
            'phone' => 'required|string|max:100',
            'image' => 'required|image|mimes:png,jpg|max:5120',
      ]);

      if($request->hasFile('image')){
          Storage::delete($Nearbyshop->image);
          $FileName = Storage::putFile("public/Nearbyshops",$data['image']);
          $data['image'] = $FileName;
      }
 

      $Nearbyshop->update($data);

      return redirect(url('/NearbyShops'));

}



public function destroy( Nearbyshop $Nearbyshop ){
    Storage::delete($Nearbyshop->image);
    $Nearbyshop->delete();
    //Category::findOrFail($categoryID)->delete();
    return redirect(url('/NearbyShops'));
}




}
