<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 /**
* Display a listing of the resource.
*/
 public function index() : View
 {
return view('products.index', [
'products' => Product::latest()->paginate(2)
]);
 }
 /**
* Show the form for creating a new resource.
*/
 public function create() : View
 {
return view('products.create');
 }
 /**
* Store a newly created resource in storage.
*/
public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        // Check if image was uploaded
        if ($request->hasFile('image')) {
            $originalFilename = $request->file('image')->getClientOriginalName();
            $data['image'] = $request->file('image')->store('products', 'public');
            Storage::disk('public')->putFileAs(
                'products',
                $request->file('image'),
                $originalFilename
            );
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'New product is added successfully.');
    }
 /**
* Display the specified resource.
*/
 public function show(Product $product) : View
 {
return view('products.show', compact('product'));
 }
 
 public function edit(Product $product) : View
 {
return view('products.edit', compact('product'));
 }
 /**
* Update the specified resource in storage.
*/
 public function update(UpdateProductRequest $request, Product$product) : RedirectResponse
 {
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Product::findOrFail($id);
    $data = $request->all();

    // Check if image was uploaded
    if ($request->hasFile('image')) {
        if($product->image) {
            // Delete the old image if it exists
            Storage::disk('public')->delete($product->image);
        }
        $originalFilename = $request->file('image')->getClientOriginalName();
        $data['image'] = $request->file('image')->store('products', 'public');
        Storage::disk('public')->putFileAs(
            'products',
            $request->file('image'),
            $originalFilename
        );
    }

    $product->update($data);

    return redirect()->route('products.index')
        ->withSuccess('Product is updated successfully.');
}


 public function destroy(Product $product) : RedirectResponse
 {
$product->delete();
return redirect()->route('products.index')->withSuccess('Product is deleted successfully.');
 }

}