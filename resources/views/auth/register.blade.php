<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Register | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">
            <!-- For Demo Purpose -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt=""
                    class="img-fluid mb-3 d-none d-md-block">
                <h1>Create an Account</h1>
            </div>

            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-5 ml-auto">
                <form method="post" action="{{ url('/register') }}">
                    @csrf
                    <div class="row">
                        <!-- First Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="bi bi-person text-muted"></i>
                                </span>
                            </div>
                            <input id="firstname" type="text" name="firstname" placeholder="First Name"
                                value="{{ old('firstname') }}" class="form-control bg-white border-left-0 border-md">
                            @error('firstname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Last Name -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="bi bi-person text-muted"></i>
                                </span>
                            </div>
                            <input id="lastname" type="text" name="lastname" placeholder="Last Name"
                                value="{{ old('lastname') }}" class="form-control bg-white border-left-0 border-md">
                            @error('lastname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="bi bi-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address"
                                value="{{ old('email') }}" class="form-control bg-white border-left-0 border-md">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="bi bi-phone text-muted"></i>
                                </span>
                            </div>
                            <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-3 border-md border-right-0">
                                    <i class="bi bi-lock"></i> </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password"
                                class="form-control bg-white border-left-0 border-md">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-3 border-md border-right-0">
                                    <i class="bi bi-lock"></i> </span>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <button type="submit" class="btn btn-primary btn-block py-2">
                                <span class="font-weight-bold">Create your account</span>
                            </button>
                        </div>

                        <!-- Already Registered -->
                        <div class="text-center w-100">
                            <p class="text-muted font-weight-bold">Already Registered? <a href="{{ route('login') }}"
                                    class="text-primary ml-2">Login</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <form method="post" action="{{ url('/register') }}">
                            @csrf
                            <h1>Register</h1>
                            <p class="text-muted">Create your account</p>
                            <!-- First Name Input -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    name="firstname" value="{{ old('firstname') }}" placeholder="First Name">
                                @error('firstname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Last Name Input -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    name="lastname" value="{{ old('lastname') }}" placeholder="Last Name">
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-phone"></i>
                                    </span>
                                </div>
                                <input type="phone" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" placeholder="Phone">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-flat mb-3">Register</button>
                            <a href="{{ route('login') }}" class="text-center">I already have an account.</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- CoreUI -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</body>

</html>
