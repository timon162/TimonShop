<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/auths/register.css') }}">
    <title>Register</title>
</head>

<body>
    <div class="container py-5">
        <div class="" id="loginModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" data-bs-dismiss="modal">Welcome Timon Shop</h5>
                    </div>
                    <div class="modal-body">
                        <form id="id-form-register">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name User</label>
                                <div class="input-group">
                                    <input id="id-name" type="text" class="form-control" placeholder="Name">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <div class="input-group">
                                    <input id="id-email" type="email" class="form-control"
                                        placeholder="name@gmail.com">
                                    <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="id-password" type="password" class="form-control"
                                        placeholder="Enter your password">
                                    <span class="input-group-text password-toggle">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password Confirmation</label>
                                <div class="input-group">
                                    <input id="id-password-confirmation" type="password" class="form-control"
                                        placeholder="Password Confirmation">
                                    <span class="input-group-text password-toggle">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-login text-white"
                                id="id-register-btn">Register</button>
                            <div class="register-link">
                                You have an account? <a href="{{ route('login') }}" class="text-decoration-none">Come To
                                    Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/auths/register.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
