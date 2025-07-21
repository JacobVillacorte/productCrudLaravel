<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class Show extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function deleteProduct()
    {
        // Delete image file if exists
        if ($this->product->image) {
            Storage::disk('public')->delete($this->product->image);
        }
        
        $this->product->delete();
        session()->flash('message', 'Product deleted successfully!');
        
        return $this->redirect('/products', navigate: true);
    }

    public function render()
    {
        return view('livewire.products.show');
    }
}
