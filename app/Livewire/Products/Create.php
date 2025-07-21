<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class Create extends Component
{
    use WithFileUploads;

    // Form properties
    public $code = '';
    public $name = '';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $image = null;

    public function save()
    {
        // Custom validation rules
        $rules = [
            'code' => 'required|string|max:255|unique:products,code',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ];

        $this->validate($rules);

        $data = [
            'code' => $this->code,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description,
        ];

        if ($this->image) {
            // Ensure products directory exists
            if (!Storage::disk('public')->exists('products')) {
                Storage::disk('public')->makeDirectory('products');
            }
            $data['image'] = $this->image->store('products', 'public');
        }

        Product::create($data);
        session()->flash('message', 'Product created successfully!');
        
        return $this->redirect('/products', navigate: true);
    }

    protected function messages()
    {
        return [
            'code.unique' => 'This product code is already taken. Please choose a different code.',
            'code.required' => 'Product code is required.',
            'name.required' => 'Product name is required.',
            'quantity.required' => 'Quantity is required.',
            'quantity.integer' => 'Quantity must be a valid number.',
            'quantity.min' => 'Quantity cannot be negative.',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Price must be a valid number.',
            'price.min' => 'Price cannot be negative.',
            'image.image' => 'Please select a valid image file.',
            'image.max' => 'Image size cannot exceed 2MB.',
        ];
    }

    public function render()
    {
        return view('livewire.products.create');
    }
}
