<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Painting;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PaintingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paintings = Painting::all();
        return view('home.homepage', [
            'paintings' => $paintings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();

        return view('addpaintings.add', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imgId = uniqid();

        $painting = new Painting;
        $painting->title = $request->title;
        $painting->description = $request->description;
        $painting->price = $request->price;
        $painting->user_id = auth()->user()->id;

        if($request->file('image')){
            $painting->image = 'image-painting-' . $imgId . '.' . $request->file('image')->extension();
            $painting->image_Id = $imgId;
            $filename = 'image-painting-' . $imgId . '.' . $request->file('image')->extension();
            $image = $request->file('image')->storeAs('public', $filename);
        }
        else{
            $painting->image = '';
            $painting->image_Id = '';
        }

        $painting->save();

        $categories = $request->categories;

        $currentPainting = Painting::find($painting->id);

        foreach($categories as $category){

            $currentPainting->categories()->attach($category);

        }

        return redirect()->route('homepage'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Painting $painting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $painting = Painting::find($id);

        $categories = Categories::all();

        if (auth()->user()->id == $painting->user_id){

            return view('postEdit.postedit', [
                'painting' => $painting,
                'categories' => $categories
            ]);

        }else{
            return redirect()->route('homepage');
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $imgId = uniqid();

        $painting = Painting::find($id);

        if (auth()->user()->id == $painting->user_id){

            $painting->title = $request->title;
            $painting->description = $request->description;
            $painting->price = $request->price;

            if($request->file('image')){
                $painting->image = 'image-painting-' . $imgId . '.' . $request->file('image')->extension();
                $painting->image_Id = $imgId;
                $filename = 'image-painting-' . $imgId . '.' . $request->file('image')->extension();
                $image = $request->file('image')->storeAs('public', $filename);
            }

            $painting->save();

            $currentPainting = Painting::find($painting->id);

            // Vado a eliminare la vecchia categoia scelto in precedente(se esiste)
            $allCategories = Categories::all();

            foreach($allCategories as $category){

                $currentPainting->categories()->detach($category->id);

            }

            // Vado ad aggiungere la nuova categoria
            $categories = $request->categories;

            foreach($categories as $category){

                $currentPainting->categories()->attach($category);

            }

            return redirect()->route('profile', $id);

        }else {

            return redirect()->route('homepage');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $painting = Painting::find($id);

        $painting->delete();
        
        
        return redirect()->route('profile');
    }


    // Show Checkout view

    public function checkout($id){

        $painting = Painting::find($id);

        return view('checkout.checkout-form', [
            'painting' => $painting
        ]);
    }

    // Do Checkout customers

    public function doCheckout(Request $request, $id){

        $add_customers = (new CustomerController)->store($request);
        $add_orders = (new OrderController)->store($request, $add_customers);
        
        return $add_orders;

    }

    // Do Checkout orders
}
