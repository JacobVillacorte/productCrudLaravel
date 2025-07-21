<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class ProductLivewire extends Component
{
    use WithFileUploads;

    public $products;
    public $code, $name, $quantity, $price, $description, $image;
    public $productId;
    public $updateMode = false;

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::all();
    }

    public function store()
    {
        $validated = $this->validate([
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($this->image) {
            $validated['image'] = $this->image->store('images', 'public');
        }

        Product::create($validated);

        $this->resetForm();
        $this->loadProducts();
        session()->flash('message', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->updateMode = true;
    }

    public function update()
    {
        $product = Product::findOrFail($this->productId);

        $validated = $this->validate([
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable',
        ]);

        $product->update($validated);

        $this->resetForm();
        $this->loadProducts();
        session()->flash('message', 'Product updated successfully!');
    }

    public function delete($id)
    {
        Product::destroy($id);
        $this->loadProducts();
        session()->flash('message', 'Product deleted!');
    }

    public function cancel()
    {
        $this->resetForm();
        $this->updateMode = false;
    }

    public function resetForm()
    {
        $this->code = '';
        $this->name = '';
        $this->quantity = '';
        $this->price = '';
        $this->description = '';
        $this->image = null;
        $this->productId = null;
    }

    public function render()
    {
        return view('livewire.product-livewire')
            ->layout('components.layouts.app'); // Ensure this layout exists
    }
}
