<div>
    <form wire:submit.prevent="store">
        <div class="form-group mb-2">
            <input type="text" wire:model="name" class="form-control" placeholder="Product Name">
            @error('name') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-2">
            <textarea wire:model="description" class="form-control" placeholder="Product Description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mb-2">
            <input type="number" step="0.01" wire:model="price" class="form-control" placeholder="Price">
            @error('price') <span class="text-danger">{{ $message }}</span>@enderror
        </div>
        <button type="submit" class="btn btn-success">Save Product</button>
    </form>
</div>
