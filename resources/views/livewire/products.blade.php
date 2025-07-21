<div>
    <!-- Success Messages -->
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2><i class="bi bi-box-seam"></i> Product Management</h2>
            <p class="text-muted">Manage your product inventory</p>
        </div>
        <a href="/products/create" wire:navigate class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Product
        </a>
    </div>

    <!-- Products Grid -->
    <div class="row">
        @forelse($products as $product)
            <div class="col-lg-4 col-md-6 mb-4" wire:key="product-{{ $product->id }}">
                <div class="card h-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             class="card-img-top product-image" 
                             style="height: 200px; object-fit: cover;" 
                             alt="{{ $product->name }}">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                             style="height: 200px;">
                            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                        </div>
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <div class="flex-grow-1">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="text-muted small mb-1">Code: {{ $product->code }}</p>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <div class="row text-center">
                                <div class="col-6">
                                    <small class="text-muted">Quantity</small>
                                    <div class="fw-bold">{{ number_format($product->quantity) }}</div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Price</small>
                                    <div class="fw-bold text-success">${{ number_format($product->price, 2) }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-3 d-flex gap-2">
                            <a href="/products/{{ $product->id }}" wire:navigate 
                               class="btn btn-info btn-sm flex-fill">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <a href="/products/{{ $product->id }}/edit" wire:navigate 
                               class="btn btn-warning btn-sm flex-fill">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <button wire:click="deleteProduct({{ $product->id }})" 
                                    wire:confirm="Are you sure you want to delete this product?"
                                    class="btn btn-danger btn-sm flex-fill">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-box text-muted" style="font-size: 4rem;"></i>
                    <h4 class="text-muted mt-3">No Products Found</h4>
                    <p class="text-muted">Get started by adding your first product.</p>
                    <a href="/products/create" wire:navigate class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Add First Product
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>
