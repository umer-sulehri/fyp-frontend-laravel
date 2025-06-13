@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!-- Auth Section -->
<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="custom-block bg-white auth-container">
                    <ul class="nav nav-tabs auth-tabs mb-4" id="authTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true">Login</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup-tab-pane" type="button" role="tab" aria-controls="signup-tab-pane" aria-selected="false">Sign Up</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="authTabsContent">
                        <!-- Login Tab -->
                        <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab" tabindex="0">
                            <form class="custom-form" method="POST" action="{{ route('login') }}" role="form">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" id="login-email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="login-email">Email address</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" id="login-password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
                                    <label for="login-password">Password</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="small">Forgot password?</a>
                                    @endif
                                </div>
                                
                                <button type="submit" class="btn custom-btn w-100 mb-3">Login</button>
                                
                                <div class="divider">
                                    <span class="divider-text">or continue with</span>
                                </div>
                                
                                <div class="social-login mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100">
                                        <i class="bi-google"></i> Google
                                    </a>
                                    <a href="#" class="btn btn-outline-dark w-100">
                                        <i class="bi-github"></i> GitHub
                                    </a>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Signup Tab -->
                        <div class="tab-pane fade" id="signup-tab-pane" role="tabpanel" aria-labelledby="signup-tab" tabindex="0">
                            <form class="custom-form" method="POST" action="{{ route('register') }}" role="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="first_name" id="first-name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First name" value="{{ old('first_name') }}" required autocomplete="given-name">
                                            <label for="first-name">First name</label>
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating">
                                            <input type="text" name="last_name" id="last-name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last name" value="{{ old('last_name') }}" required autocomplete="family-name">
                                            <label for="last-name">Last name</label>
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" id="signup-email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="signup-email">Email address</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" id="signup-password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="new-password">
                                    <label for="signup-password">Password</label>
                                    <div class="form-text">At least 8 characters with a number and symbol</div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-4">
                                    <input type="password" name="password_confirmation" id="confirm-password" class="form-control" placeholder="Confirm password" required autocomplete="new-password">
                                    <label for="confirm-password">Confirm password</label>
                                </div>
                                
                                <div class="form-check mb-4">
                                    <input class="form-check-input @error('terms') is-invalid @enderror" type="checkbox" name="terms" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="{{ route('terms') }}">Terms of Service</a> and <a href="{{ route('privacy') }}">Privacy Policy</a>
                                    </label>
                                    @error('terms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn custom-btn w-100 mb-3">Create Account</button>
                                
                                <div class="divider">
                                    <span class="divider-text">or sign up with</span>
                                </div>
                                
                                <div class="social-login mt-4">
                                    <a href="#" class="btn btn-outline-primary w-100">
                                        <i class="bi-google"></i> Google
                                    </a>
                                    <a href="#" class="btn btn-outline-dark w-100">
                                        <i class="bi-github"></i> GitHub
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection