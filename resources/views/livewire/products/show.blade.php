<div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bi bi-info-circle"></i> Product Details
                        </h4>
                        <a href="/products" wire:navigate class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left"></i> Back to Products
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     class="img-fluid rounded product-image" 
                                     alt="{{ $product->name }}">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" 
                                     style="height: 300px;">
                                    <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <h2>{{ $product->name }}</h2>
                            <p class="text-muted mb-3">Code: {{ $product->code }}</p>
                            
                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Quantity:</strong>
                                    <div class="fs-5 text-primary">{{ number_format($product->quantity) }}</div>
                                </div>
                                <div class="col-6">
                                    <strong>Price:</strong>
                                    <div class="fs-5 text-success">${{ number_format($product->price, 2) }}</div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <strong>Description:</strong>
                                <p class="mt-2">{{ $product->description ?: 'No description available.' }}</p>
                            </div>

                            <div class="d-flex gap-2">
                                <a href="/products/{{ $product->id }}/edit" wire:navigate class="btn btn-warning">
                                    <i class="bi bi-pencil"></i> Edit Product
                                </a>
                                <button wire:click="deleteProduct" 
                                        wire:confirm="Are you sure you want to delete this product?"
                                        class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Delete Product
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
