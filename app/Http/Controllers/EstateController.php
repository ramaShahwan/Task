<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Filesystem\FilesystemAdapter;
//use File;
use Illuminate\Filesystem\FilesystemManager;
use League\Flysystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Auth;

class EstateController extends Controller
{
  
    
    public function index()
    { 
        //$estate = Estate::all()->latest()->first() ;
       // $estate = Estate::latest('updated_at')->first()->all();
       $estate = Estate::orderBy('updated_at','desc')->get();
     
    //  if ( auth()->user()->role == 'admin')
    //     {
    //         return view('components.index',compact('estate'));
    //     }
    //    else if ( auth()->user()->role == 'customer')
    //     {
    //         return view('customer.index',compact('estate'));
    //     }
    //     else 
    //     return view('visitor.index',compact('estate'));

    
    if (optional(auth()->user())->role == 'admin') 
    {
        return view('components.index',compact('estate'));
    }
     elseif (optional(auth()->user())->role == 'customer')
      {
        return view('customer.index',compact('estate'));
     }
     else 
     {
        return view('visitor.index',compact('estate'));
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ( auth()->user()->role == 'admin')
        {
            return view('components.create');
        }
       else if ( auth()->user()->role == 'customer')
        {
            return view('customer.create');
        }
    
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
            'image_name' =>'required',
            'slug' => 'required|max:255',
        ]);

        $estate= Estate::create([

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
   'slug' => Str::slug( $request->slug),
   'user_id'=>auth()->id()
   
]);

//for images from another table(one to many)
if($request->hasfile('image_name'))
{
    foreach($request->file('image_name') as $image)
    {
        $name = $image->getClientOriginalName(); 
        $image->move(public_path('images'), $name);
       //  $e=  Estate::latest()->first()->id;
            Image::create([
            //'estate_id' => $e,
           'estate_id'=>$estate->id,
            'image_name' => $name,
        ]);
    }
}

    session()->flash('Add', 'Added successfully.');
   
    
    if ( auth()->user()->role == 'admin')
    {
        return redirect()->route('estate');
    }
   else if ( auth()->user()->role == 'customer')
    {
        return redirect()->route('customer.estate');
    }
//return back();
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
    public function edit( $id)
    {
       $es = Estate::findOrFail($id);

       if ( auth()->user()->role == 'admin')
       {
        return view('components.edit',compact('es'));
       }
      else if ( auth()->user()->role == 'customer')
       {
        return view('customer.edit',compact('es'));
       }
       
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         $es = Estate::findOrFail($id);
         $es->update([
             'Address' => $request->Address,
             'Contact_phone' => $request->Contact_phone,
             'outlook' => $request->outlook,
             'direction' => $request->direction,
             'floor' => $request->floor,
             'ownership' => $request->ownership,
             'room_number' => $request->room_number,
             'bath_number' => $request->bath_number,
             'description' => $request->description,
             'price' => $request->price,
             'parking' => $request->parking == '1' ? 1 : 0,
             'place_for_barbecue' => $request->place_for_barbecue == '1' ? 1 : 0,
             'left' => $request->left == '1' ? 1 : 0,
             'TV_cable' => $request->TV_cable == '1' ? 1 : 0,
             'internet' => $request->internet == '1' ? 1 : 0,
             'central_heating' => $request->central_heating == '1' ? 1 : 0,
             'slug' => Str::slug($request->slug)
         ]);
     
         foreach ($es->images as $image) {
             if ($request->hasFile('image_name_' . $image->id)) {
                 // Delete the old image from server
                 File::delete(public_path('images/' . $image->image_name));
     
                 // Upload new image
                 $imageName = $request->file('image_name_' . $image->id)->getClientOriginalName();
                 $request->file('image_name_' . $image->id)->move(public_path('images'), $imageName);
     
                 // Update the image record with the new image name
                 $image->update(['image_name' => $imageName]);
             }
         }
         if ( auth()->user()->role == 'admin')
         {
            return redirect()->route('estate');
         }
        else if ( auth()->user()->role == 'customer')
         {
            return redirect()->route('customer.estate');
         }
        
     }
     

public function updateImage(Request $request, $id)
{
    $es = Estate::findOrFail($id);
    
    foreach ($request->image_id as $key => $imageId) {
        $image = Image::findOrFail($imageId);
        
        if ($request->hasFile('image_name') && isset($request->image_name[$key])) {
            // Delete the old image file from server
            File::delete(public_path('images/' . $image->image_name));
            
            // Upload new image
            $imageName = $request->file('image_name')[$key]->getClientOriginalName();
            $request->file('image_name')[$key]->move(public_path('images'), $imageName);
            
            // Update the image record in the database
            $image->update(['image_name' => $imageName]);
        }
    }

    return redirect()->route('estate.edit', $id);
}

/*
*/
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Image::where('estate_id',$id)->delete();
       Estate::findOrFail($id)->delete();
       if ( auth()->user()->role == 'admin')
       {
          return redirect()->route('estate');
       }
      else if ( auth()->user()->role == 'customer')
       {
          return redirect()->route('customer.estate');
       }
    }

    public function deleteAll()
    {
        Image::whereNotNull('estate_id')->delete();
        Estate::whereNotNull('id')->delete();
    // Estate::truncate();  
        return redirect()->route('estate');
    }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/login');
    // }
}
   
