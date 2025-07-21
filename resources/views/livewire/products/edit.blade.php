<div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-pencil-square"></i> Edit Product
                        </h4>
                        <a href="/products" wire:navigate class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Back to Products
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit="update">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">Product Code</label>
                                    <input type="text" 
                                           wire:model="code" 
                                           class="form-control @error('code') is-invalid @enderror" 
                                           id="code" 
                                           placeholder="Enter product code">
                                    @error('code') 
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" 
                                           wire:model="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           placeholder="Enter product name">
                                    @error('name') 
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" 
                                           wire:model="quantity" 
                                           class="form-control @error('quantity') is-invalid @enderror" 
                                           id="quantity" 
                                           min="0" 
                                           placeholder="Enter quantity">
                                    @error('quantity') 
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" 
                                               step="0.01" 
                                               wire:model="price" 
                                               class="form-control @error('price') is-invalid @enderror" 
                                               id="price" 
                                               min="0" 
                                               placeholder="0.00">
                                    </div>
                                    @error('price') 
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea wire:model="description" 
                                      class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      rows="3" 
                                      placeholder="Enter product description"></textarea>
                            @error('description') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Product Image</label>
                            <input type="file" 
                                   wire:model="image" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   accept="image/*">
                            @error('image') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if ($image)
                                <div class="mt-3">
                                    <p class="mb-2"><strong>New Image Preview:</strong></p>
                                    <img src="{{ $image->temporaryUrl() }}" 
                                         class="img-thumbnail product-image" 
                                         style="max-width: 200px;">
                                </div>
                            @elseif($product->image)
                                <div class="mt-3">
                                    <p class="mb-2"><strong>Current Image:</strong></p>
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         class="img-thumbnail product-image" 
                                         style="max-width: 200px;" 
                                         alt="{{ $product->name }}">
                                </div>
                            @endif
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading.remove>
                                    <i class="bi bi-check-circle"></i> Update Product
                                </span>
                                <span wire:loading>
                                    <i class="bi bi-arrow-repeat"></i> Updating...
                                </span>
                            </button>
                            <a href="/products" wire:navigate class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
