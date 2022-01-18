<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <title>
        Hello,
        world!
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/v4-shims.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body class="mh-100">

    <section>
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-12 col-md-6 col-lg-6 p-0 img-login" data-aos=fade-right data-aos-duration="3000">
                    <img src="{{ asset('images/coffee/login.jpg') }}" class="login w-100 ">
                </div>

                <div class=" col-12 col-md-6 col-lg-6 p-0 mx-auto" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="3000">
                    <form action=" {{ route('admin.login.submit') }}" method="post">@csrf
                        <div class="container">
                            <div class="d-flex flex-column login-form m-auto">
                                <h1 class="text-center zhaws-text mb-0">
                                    ZHAWS
                                    <span style="color:var(--red);">COFFEE</span>
                                </h1>
                                <p class="text-center zhaws-tagline">
                                    Crafted
                                    with
                                    quality
                                </p>
                                <h2 class="mb-4">
                                    Admin
                                    Login
                                </h2>
                                <label class="mb-4" for="">Login
                                    to
                                    your
                                    account</label>
                                <div class="username-form ">
                                    <input style="font-family:'Font Awesome 5 Free' !important" type="text" name="email"
                                        value="{{ old('email') }}" placeholder="&#xf007   Username Or Email" required>
                                </div>
                                <label class="mb-4" for="">Input
                                    your
                                    password</label>
                                <div class="username-form form-password">
                                    <input class="password-input" style="font-family:'Font Awesome 5 Free' !important"
                                        value="{{ old('password') }}" name="password" type="password"
                                        placeholder="       Password" required>
                                    <i class="password-icon fas fa-lock"></i>
                                </div>
                                <button type="submit" class="btn-login mx-auto btn">Login</button>
                                <small class="mx-auto" style="margin-top:100px">
                                    forgot the
                                    password? <a href="#" style="color: var(--red)" class="create-account"><u>
                                            click here </u></a>to send your password by email!</small>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/v4-shims.js">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js">
    </script>

    <script>
        AOS
            .init();
    </script>
</body>

</html>
