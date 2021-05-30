<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - MJ Shop</title>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/authentication/form-2.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-icons/fontawesome/css/all.min.css') }}">
    <style>
        .form-form .form-form-wrap form .field-wrapper svg.feather-eye {
            top: 46px;
        }

    </style>

</head>

<body>
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Login</h1>
                        <p class="message">Login ke akun MJ Shop</p>

                        <form method="POST" action="#" id="login-form" class="text-left">

                            @csrf

                            <div class="form">

                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">Email</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="email" type="email" placeholder="Email" class="form-control" name="email"
                                        required autocomplete="email" autofocus>

                                    <span class="invalid-feedback" role="alert"></span>
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="{{ route('password.request') }}" class="forgot-pass-link">Lupa
                                            Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" placeholder="Password"
                                        value="password" class="form-control" required autocomplete="current-password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>

                                    <span class="invalid-feedback" role="alert"></span>
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" id="submit"
                                            value="">{{ __('Login') }}</button>
                                    </div>
                                </div>

                                <div class="division">
                                    <span>atau login dengan akun sosial</span>
                                </div>

                                <div class="social">
                                    <a href="javascript:void(0);" class="btn social-fb">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>
                                        <span class="brand-name">Facebook</span>
                                    </a>
                                    <a href="javascript:void(0);" class="btn social-google">
                                        <i class="fab fa-google"></i>
                                        <span class="brand-name">Google</span>
                                    </a>
                                </div>

                                <p class="signup-link">Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang!</a></p>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/authentication/form-2.js') }}"></script>

    <script>
        const loginForm = document.querySelector('#login-form');
        const loginBtn = loginForm.querySelector('#submit');
        const message = document.querySelector('.message');

        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();

            loginBtn.innerHTML = '<i class="fa fa-spin fa-spinner"></i> Login...';
            loginBtn.setAttribute('disabled', 'disabled');

            const emailField = loginForm.querySelector('#username-field');
            const emailInput = emailField.querySelector('#email');
            const emailFeedback = emailField.querySelector('.invalid-feedback');

            const passwordField = loginForm.querySelector('#password-field');
            const passwordInput = passwordField.querySelector('#password');
            const passwordFeedback = passwordField.querySelector('.invalid-feedback');

            if (emailInput.classList.contains('is-invalid')) {
                emailInput.classList.remove('is-invalid');
                emailFeedback.innerHTML = null;
            }
            if (passwordInput.classList.contains('is-invalid')) {
                passwordInput.classList.remove('is-invalid');
                passwordFeedback.innerHTML = null;
            }
            if (message.classList.contains('text-danger')) {
                message.classList.remove('text-danger');
                message.classList.add('text-info');
                message.innerHTML = 'Mencoba login kembali...';
            }

            const email = emailInput.value;
            const password = passwordInput.value;

            fetch('{{ route('auth.login') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password
                    })
                })
                .then(res => res.json())
                .then(res => {
                    loginBtn.innerHTML = 'Login';
                    loginBtn.removeAttribute('disabled');

                    if (res.error) {
                        const errors = res.validations;
                        if (message.classList.contains('text-info')) {
                            message.innerHTML = 'Validasi gagal';
                        }
                        if (errors.email) {
                            emailInput.classList.add('is-invalid');

                            errors.email.forEach(error => {
                                emailFeedback.innerHTML = error;
                            })
                        }
                        if (errors.password) {
                            passwordInput.classList.add('is-invalid');

                            errors.password.forEach(error => {
                                passwordFeedback.innerHTML = error;
                            })
                        }
                        if (errors.result) {
                            message.classList.add('text-danger');
                            message.innerHTML = errors.result;
                        }
                    } else if (res.success) {
                        message.classList.add('text-success');
                        message.innerHTML = res.message;

                        loginBtn.innerHTML = '<i class="fa fa-check"></i> Berhasil login!';
                        setTimeout(() => {
                            message.innerHTML = 'Anda akan segera dialihkan...';
                        }, 2000);
                        setTimeout(() => {
                            message.innerHTML =
                                '<i class="fa fa-spin fa-spinner"></i> Mengalihkan...';
                        }, 3000);
                        setTimeout(() => {
                            window.location = res.redirect_to;
                        }, 5000);

                        if (res.token !== null) {
                            localStorage.setItem('passportAccessToken', res.token.accessToken);
                            localStorage.setItem('passportExpiresAt', res.token.expiresAt);
                        }
                    }
                })
                .catch(errors => {
                    loginBtn.innerHTML = 'Login';
                    loginBtn.removeAttribute('disabled');

                    message.classList.add('text-danger');
                    message.innerHTML = `Kesalahan teknis: <i>${errors}</i>`;
                })
        });

    </script>
</body>

</html>
