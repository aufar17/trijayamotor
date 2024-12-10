<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tri Jaya Motor Admin</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}   ">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}   ">
</head>
<style>
    #loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    #loader img {
        width: 100px;
        height: 100px;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 left-section" style="background-image: url('images/bg-login.png')">
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <div class="col-md-6 right-section"
                style="background-position: right; background-size: cover; background-image: url('images/bg-login2.png');">
                <div class="login-form">
                    <h2 class="text-center mb-4">SIGN IN</h2>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div id="loader" style="display: none; text-align: center;">
                        <img src="{{ asset('images/loading.gif') }}" alt="Loading..." />
                    </div>

                    <form id="loginForm" action="{{ route('login-process') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder=" "
                                required>
                            <label for="username" class="form-label">Username</label>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder=" "
                                required>
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitButton">Sign In</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>



    <!-- Link Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function () {
            // Tampilkan loader
            document.getElementById('loader').style.display = 'flex';
            // Nonaktifkan tombol submit untuk mencegah pengiriman ulang form
            document.getElementById('submitButton').disabled = true;
        });
    </script>


</body>

</html>