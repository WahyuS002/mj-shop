<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <title>Buat Password Baru</title>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/authentication/form-2.css') }}" rel="stylesheet" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forms/switches.css') }}">
</head>

<body class="form no-image-content">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Buat Password Baru</h1>
                        <p class="signup-link recovery">
                            @if (session('status'))
                                <span class="text-info">{{ session('status') }}</span>
                            @else
                                Buat password baru untuk akun <i>{{ old('email', $request->email) }}</i>
                            @endif
                        </p>
                        <form action="{{ route('password.update') }}" method="POST" class="text-left">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">EMAIL</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="email" type="email"
                                        value="{{ old('email', $request->email) }}"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                        required="required">

                                    @error('email')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div id="password-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password"
                                        value="{{ old('password', $request->password) }}"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Password baru" required="required" autofocus>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    @error('password')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div id="confirm-password-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="confirm-password">KONFIRMASI PASSWORD</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="confirm-password" name="password_confirmation" type="password"
                                        value="{{ old('password_confirmation', $request->password_confirmation) }}"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        placeholder="Konfirmasi Password Baru" required="required" autofocus>
                                    @error('cpassword_confirmation')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-sm-flex justify-content-between">

                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Perbarui Password</button>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/authentication/form-2.js') }}"></script>
</body>

</html>
