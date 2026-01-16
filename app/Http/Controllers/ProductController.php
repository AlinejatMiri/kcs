<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function dashboard(Request $request)
    {
        $products = Product::orderByDesc('created_at')->get();

        return view('dasboard.dashboard', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $imageFileName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/products'), $imageFileName);
        }

        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'category' => $validated['category'] ?? null,
            'image_url' => $imageFileName,
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'Product created successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'category' => $validated['category'] ?? null,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/images/products'), $imageFileName);
            $data['image_url'] = $imageFileName;
        }

        $product->update($data);

        return redirect()->route('admin.dashboard')->with('status', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.dashboard')->with('status', 'Product deleted successfully.');
    }
}
