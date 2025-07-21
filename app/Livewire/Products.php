<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class Products extends Component
{
    public $products;

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::latest()->get();
    }

    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);
        
        // Delete image file if exists
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        session()->flash('message', 'Product deleted successfully!');
        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.products');
    }
}
