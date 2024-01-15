<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Filesystem\FilesystemAdapter;
use File;
use Illuminate\Filesystem\FilesystemManager;
use League\Flysystem\Filesystem;
use Illuminate\Support\Str;
 


class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function uploadMultiple(Request $request): array
     {
         $files = $request->file('images');
         $arrayOfImages = array();
     
         for ($i = 0; $i < count($files); $i++) {
             $filename = $request->get('slug') . $i . '.' . $files[$i]->getClientOriginalExtension();
     
             Storage::disk('publicDirectory')->putFileAs(
                 'public/images/',
                 $files[$i],
                 $filename
             );
     
             array_push($arrayOfImages, 'public/images/' . $filename);
         }
     
         return $arrayOfImages;
     }

    //$files[$i]->getClientOriginalName(). '.' . 
    public function index()
    { 
    //     $data= Estate::get('images');
    //    $img=json_decode( $data);
        $estate = Estate::all();
       // $imgs = Estate::get('images');
     return view('components.index',compact('estate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

     return view('components.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Address' => 'required|max:255',
            'Contact_phone' => 'required|max:10|min:7',
            'outlook' => 'required|max:20',
            'direction' => 'required|max:50',
            'floor' => 'required|max:2',
            'ownership' => 'required|max:20',
            'room_number' => 'required|max:2',
            'bath_number' => 'required|max:2',
            'description' => 'required|max:255',
            'images' =>'required',
            'slug' => 'required|max:255',
        ]);

        $image_array = [];
        if($request->hasFile('images'))
        {
        $image_array = $this->uploadMultiple($request);
        }
        $image_paths = implode(',',$image_array);

     Estate::create([
    'Address'=>$request->Address,
    'Contact_phone'=>$request->Contact_phone,
    'outlook' => $request->outlook,
    'direction' => $request->direction,
    'floor' => $request->floor,
    'ownership' => $request->ownership,
    'room_number' => $request->room_number,
    'bath_number' => $request->bath_number,
    'description'=>$request->description,
    'price' => $request->price,
    'parking' => $request->parking == '1' ? 1 : 0,
    'place_for_barbecue' => $request->place_for_barbecue == '1' ? 1 : 0,
    'left' => $request->left == '1' ? 1 : 0,
    'TV_cable' => $request->TV_cable == '1' ? 1 : 0,
    'internet' => $request->internet == '1' ? 1 : 0,
    'central_heating' => $request->central_heating == '1' ? 1 : 0,
    'images'=>$image_paths,
   'slug' => Str::slug( $request->slug)
]);
 
// $image_array = array();
// if($request->file('images'))
// {
// if(count($request->file('images'))>0)
//   {
//     $image_array=$this->uploadMultiple($request);
//   }
//  }
// // return $image_array;
// foreach($image_array as$img)
// {
//     $image = new Estate;
//     $image->images=$img;
//     $image->save();
// }


//for images from another table(one to many)
// if($request->hasfile('image_name'))
// {
//    foreach($request->file('image_name') as $image)
//    {
//        $name=$image->getClientOriginalName();
//        $image->move(public_path().'/public/images/', $name);  
//        Image::create([
//                     'estate_id'=>Estate::latest()->first()->id,
//                     'image_name' => $name,
//                     'image_url' =>$image,
//                 ]);
//    }
// }

    session()->flash('Add', 'Added successfully.');
    return back(); 
}
  

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $es = Estate::findOrFail($id);
       return view('estate.edit',compact('es'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $es = Estate::finndOrFail($id);
       $es->update([
        'Address'=>$request->Address,
        'Contact_phone'=>$request->Contact_phone,
        'outlook' => $request->outlook,
        'direction' => $request->direction,
        'floor' => $request->floor,
        'ownership' => $request->ownership,
        'room_number' => $request->room_number,
        'bath_number' => $request->bath_number,
        'description'=>$request->description,
        'price' => $request->price,
        'parking' => $request->parking == '1' ? 1 : 0,
        'place_for_barbecue' => $request->place_for_barbecue == '1' ? 1 : 0,
        'left' => $request->left == '1' ? 1 : 0,
        'TV_cable' => $request->TV_cable == '1' ? 1 : 0,
        'internet' => $request->internet == '1' ? 1 : 0,
        'central_heating' => $request->central_heating == '1' ? 1 : 0,
        'images'=>$request->images,
       'slug' => Str::slug( $request->slug)
       ]);
       return redirect()->route('estate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $es = Estate::findOrFail($id)->delete();
    }
   
}
