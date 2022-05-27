<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of user products.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $products = Auth::user()->products;

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedFields = $request->validate([
            'name' => 'required',
            'description' => 'required|max:160',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,scg|max:2048',
        ]);


        $imagePath = $validatedFields['image']->store('product_images');

        Auth::user()->products()->create([
            'name' => $validatedFields['name'],
            'user_id', Auth::user()->id,
            'description' => $validatedFields['description'],
            'price' => $validatedFields['price'],
            'image' => $imagePath,
        ]);

        return to_route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $product = Auth::user()->products()->findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedFields = $request->validate([
            'name' => 'required',
            'description' => 'required|max:160',
            'price' => 'required',
            'image' => 'image|mimes:jpg,png,scg|max:2048',
        ]);

        $product = Auth::user()->products()->findOrFail($id);

        $product->name = $validatedFields['name'];
        $product->description = $validatedFields['description'];
        $product->price = $validatedFields['price'];

        // We have a new image, so we need to remove the current image and save the new one.
        if (isset($validatedFields['image']) && !empty($validatedFields['image'])) {
            Storage::delete($product->image);
            $imagePath = $validatedFields['image']->store('product_images');
            $product->image = $imagePath;
        }

        $product->save();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $product = Auth::user()->products()->findOrFail($id);

        $product->delete();

        Storage::disk('local')->delete($product->image);

        return to_route('products.index');
    }
}
