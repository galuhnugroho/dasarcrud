<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'file', 'max:10240'],
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        Products::create($validatedData);
        return redirect()->route('products.index')->with('success', 'Data berhasil ditambah!');
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
        $product = Products::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => ['string', 'max:255'],
            'color' => ['string', 'max:255'],
            'stock' => ['integer'],
            'price' => ['integer'],
            'image' => ['image', 'mimes:jpg,png,jpeg,gif,svg', 'file', 'max:10240'],
        ]);

        $product = Products::findOrFail($id);
        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        Storage::delete('public/images/' . $product->image);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Data berhasil dihapus!');
    }
}
