<div class="col-md-5">
    <div class="card auth-card">
        <div class="card-header auth-header text-center py-4">
            <h3 class="mb-0">Test Register</h3>
        </div>
        <div class="card-body p-5">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            
            <form wire:submit="testSubmit">
                <div class="mb-3">
                    <input type="text" wire:model="name" class="form-control" placeholder="Name">
                </div>
                <div class="mb-3">
                    <input type="email" wire:model="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="password" wire:model="password" class="form-control" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input type="password" wire:model="password_confirmation" class="form-control" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Test Submit</button>
            </form>
        </div>
    </div>
</div>
