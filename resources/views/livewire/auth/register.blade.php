<div class="col-md-5">
    <div class="card auth-card">
        <div class="card-header auth-header text-center py-4">
            <h3 class="mb-0"><i class="bi bi-person-plus"></i> Register</h3>
        </div>
        <div class="card-body p-5">
            <form wire:submit="register">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" 
                               wire:model="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               placeholder="Enter your full name">
                    </div>
                    @error('name') 
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" 
                               wire:model="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               placeholder="Enter your email">
                    </div>
                    @error('email') 
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" 
                               wire:model="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" 
                               placeholder="Enter your password">
                    </div>
                    @error('password') 
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" 
                               wire:model="password_confirmation" 
                               class="form-control @error('password_confirmation') is-invalid @enderror" 
                               id="password_confirmation" 
                               placeholder="Confirm your password">
                    </div>
                    @error('password_confirmation') 
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mb-3" wire:loading.attr="disabled">
                    <span wire:loading.remove>
                        <i class="bi bi-person-plus"></i> Create Account
                    </span>
                    <span wire:loading>
                        <i class="bi bi-arrow-repeat"></i> Creating account...
                    </span>
                </button>
            </form>

            <div class="text-center">
                <p class="text-muted mb-0">
                    Already have an account? 
                    <a href="/login" wire:navigate class="text-decoration-none">
                        <strong>Login here</strong>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
