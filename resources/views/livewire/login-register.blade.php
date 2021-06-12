<div>
    <div class="container-register {{$action == 'singUp' ? 'sign-up-mode' : ''}} ">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                    @csrf
                    <h2 class="title-form">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" placeholder="Email..."  value="{{ old('email') }}" required autocomplete="email" wire:model = 'email' name="email">
                    </div>
                    @error('email') <span class="error"> {{$message}} </span> @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password.." name="password" required autocomplete="current-password"  wire:model = 'password'>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <input type="submit" value="Log In" class="btn solid">
                    <p class="social-text">Or Sign In with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon"> <i class="fab fa-facebook-f"></i>  </a>
                        <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
                    </div>
                    <a class="btn solid" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </form>
    
                <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                    @csrf
                    <h2 class="title-form"> Sign Up </h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username..."  wire:model = 'username'  required name="name">
                    </div>
                    @error('username') <span class="error"> {{$message}} </span> @enderror

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email..." wire:model = 'email' required name="email">
                    </div>
                    @error('email') <span class="error"> {{$message}} </span> @enderror

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password (at least 6 characters) ..." wire:model = 'password' required>
                    </div>
                    @error('password') <span class="error"> {{$message}} </span> @enderror

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password Confirmation..." name="password_confirmation"  wire:model = 'password_confirmation' required>
                    </div>
                    @error('password_confirmation') <span class="error"> {{$message}} </span> @enderror

                    <input type="submit" class="btn solid" value="Register">

                    <p class="social-text">Or Sign Up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon"> <i class="fab fa-facebook-f"></i>  </a>
                        <a href="#" class="social-icon"> <i class="fab fa-twitter"></i> </a>
                        <a href="#" class="social-icon"><i class="fab fa-google"></i> </a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i> </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati optio vitae similique ex dignissimos soluta.</p>
                    <button class="btn transparent" id="sign-up-btn" wire:click.prevent = 'singUp'>Sign Up</button>
                </div>
                <img src=" {{asset('storage/images/log.svg')}} " alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati optio vitae similique ex dignissimos soluta.</p>
                    <button class="btn transparent" id="sign-in-btn" wire:click.prevent = 'singIn'>Sign In</button>
                </div>
                <img src=" {{asset('storage/images/register.svg')}} " class="image" alt="">
            </div>
        </div>
    </div>
</div>