<div>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="{{asset('signin/img/logo-mini.png')}}" alt="logo" width="80px">
                        </div>
                        <h3 class="text-center mb-4">Tech-Trendz</h3>
                        @if (session('status'))
                        <div class="alert alert-success mb-3 rounded-0" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <form action="{{ route('create') }}" method="POST" class="login-form">
                            @csrf
                            <div class="mb-3">
                                <x-jet-label value="{{ __('Name') }}" />
    
                                <x-jet-input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" />
                                <x-jet-input-error for="name"></x-jet-input-error>
                            </div>
    
                            <div class="mb-3">
                                <x-jet-label value="{{ __('Username') }}" />
    
                                <x-jet-input class="{{ $errors->has('username') ? 'is-invalid' : '' }}" type="username"
                                    name="username" :value="old('username')" required />
                                <x-jet-input-error for="username"></x-jet-input-error>
                            </div>
    
                            <div class="mb-3">
                                <x-jet-label value="{{ __('Email') }}" />
    
                                <x-jet-input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                                    name="email" :value="old('email')" required />
                                <x-jet-input-error for="email"></x-jet-input-error>
                            </div>
                            <div class="mb-3">
                                <x-jet-label value="{{ __('Phone') }}" />
    
                                <x-jet-input class="{{ $errors->has('phone') ? 'is-invalid' : '' }}" type="number"
                                    name="phone" :value="old('phone')" required />
                                <x-jet-input-error for="phone"></x-jet-input-error>
                            </div>
    
                            <div class="mb-3">
                                <x-jet-label value="{{ __('Password') }}" />
    
                                <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                    name="password" required autocomplete="new-password" />
                                <x-jet-input-error for="password"></x-jet-input-error>
                            </div>
    
                            <div class="mb-3">
                                <x-jet-label value="{{ __('Confirm Password') }}" />
    
                                <x-jet-input class="form-control" type="password" name="password_confirmation" required
                                    autocomplete="new-password" />
                            </div>
                            <input type="hidden" name="current_team_id" value="38">
                            <input type="hidden" name="role_id" value="3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
