<div class="container mt-4">
    <h2>Product Management</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if($updateMode)
        <h4>Edit Product</h4>
    @else
        <h4>Add New Product</h4>
    @endif

    <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="text" wire:model="code" class="form-control" placeholder="Product Code">
            @error('code') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="text" wire:model="name" class="form-control" placeholder="Product Name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="number" wire:model="quantity" class="form-control" placeholder="Quantity">
            @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="number" step="0.01" wire:model="price" class="form-control" placeholder="Price">
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <textarea wire:model="description" class="form-control" placeholder="Description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
    <input type="file" wire:model="image" class="form-control">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

    @if ($image)
        <div class="mt-2">
            <p><strong>Image Preview:</strong></p>
            <img src="{{ $image->temporaryUrl() }}" width="150">
        </div>
    @endif
</div>


        <button type="submit" class="btn btn-primary">
            {{ $updateMode ? 'Update' : 'Add' }} Product
        </button>

        @if($updateMode)
            <button type="button" wire:click="cancel" class="btn btn-secondary">Cancel</button>
        @endif
    </form>

    <hr>

    <h4>Products List</h4>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr wire:key="product-{{ $product->id }}">
                <td>{{ $product->code }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <button wire:click="edit({{ $product->id }})" class="btn btn-sm btn-info">Edit</button>
                    <button wire:click="delete({{ $product->id }})" 
                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" 
                        class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
