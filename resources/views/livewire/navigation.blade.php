<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/products" wire:navigate>
            <i class="bi bi-box-seam"></i> Product Management
        </a>
        
        <div class="navbar-nav ms-auto">
            <span class="navbar-text me-3">
                Welcome, {{ auth()->user()->name }}!
            </span>
            <button class="btn btn-outline-danger btn-sm" wire:click="logout" wire:loading.attr="disabled">
                <span wire:loading.remove>
                    <i class="bi bi-box-arrow-right"></i> Logout
                </span>
                <span wire:loading>
                    <i class="bi bi-arrow-repeat"></i> Logging out...
                </span>
            </button>
        </div>
    </div>
</nav>
