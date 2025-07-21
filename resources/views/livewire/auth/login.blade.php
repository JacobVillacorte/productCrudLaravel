<div class="col-md-4">
    <div class="card auth-card">
        <div class="card-header auth-header text-center py-4">
            <h3 class="mb-0"><i class="bi bi-box-arrow-in-right"></i> Login</h3>
        </div>
        <div class="card-body p-5">
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <form wire:submit="login">
                <div class="mb-4">
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

                <div class="mb-4">
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
                    <div class="form-check">
                        <input type="checkbox" wire:model="remember" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mb-3" wire:loading.attr="disabled">
                    <span wire:loading.remove>
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </span>
                    <span wire:loading>
                        <i class="bi bi-arrow-repeat"></i> Logging in...
                    </span>
                </button>
            </form>

            <div class="text-center">
                <p class="text-muted mb-0">
                    Don't have an account? 
                    <a href="/register" wire:navigate class="text-decoration-none">
                        <strong>Register here</strong>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
