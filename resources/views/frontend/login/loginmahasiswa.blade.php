<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Mahasiswa</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../dist/css/style.css">
</head>

<body>

    <div class="container-fluid form_bg">
        <div class="row form_display">
            <div class="col-3 p-4 form_content">
                <form method="POST">
                    @csrf
                    <div class="form-group text-center">
                        <p class="h1"><i class="bi bi-buildings-fill"></i></p>
                        <p class="h4 py-3">Login Mahasiswa</p>
                    </div>
                    <div class="form-group text-center">
                        <label for="NIM">NIM</label>
                        <input type="text" class="form-control logform_input" id="NIM" placeholder="NIM">
                    </div>
                    <div class="form-group text-center">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control logform_input" id="Password" placeholder="password">
                    </div>
                    <div class="form-group d-flex justify-content-center py-2">
                        <button type="submit" class="btn btn-primary" id="login_but">Login</button>
                    </div>
                    <div class="form-group">
                        <p class="text-center">Masuk sebagai <a href="/logindosen">Dosen</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
