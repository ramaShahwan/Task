<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\Image;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return view('components.index');
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
            'outlook' => 'required|max:10',
            'direction' => 'required|max:50',
            'floor' => 'required|max:2',
            'ownership' => 'required|max:10',
            'room_number' => 'required|max:2',
            'bath_number' => 'required|max:2',
            'description' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);
     

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
    'slug' => $request->slug,
]);
 
if($request->hasfile('image_name'))
{
   foreach($request->file('image_name') as $image)
   {
       $name=$image->getClientOriginalName();
       $image->move(public_path().'/public/images/', $name);  
       Image::create([
                    'estate_id'=>Estate::latest()->first()->id,
                    'image_name' => $name,
                    'image_url' =>$image,
                ]);
   }
}

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function returnImages(string $id)
    {
        $estate = Estate::find($id)->images;
    }
}
