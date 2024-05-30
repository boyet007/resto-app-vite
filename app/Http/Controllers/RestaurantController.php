<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json(['pesan' => 'Data restaurant sukses diambil', 'restaurants' => $restaurants], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:restaurants|max:255',
            'contact' => 'required|max:255',
            'address' => 'required'
        ]);

        $restaurant = Restaurant::create($request->all());
        return response()->json(['pesan' => 'Data restaurant sukses di buat.', 'restaurant' => $restaurant ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        return response()->json(['pesan'=> 'Restaurant berhasil ditemukan.', 'restaurant' => $restaurant], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:restaurants,name,' . $id,
            'contact' => 'required|max:255',
            'address' => 'required'
        ]);

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->all());   
        return response()->json(['pesan' => 'Data restaurant sukses di update.', 'restaurant' => $restaurant],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();
        return response()->json(['pesan' => 'Data restaurant sukses di hapus.'],204);

    }
}
