<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body class="index-page">



    <section class="pt-5 pb-4" id="count-stats">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">

                    <form class="d-block mx-auto mt-3" style="max-width:300px;"
                        action="{{ url('/complete_registration') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ request()->query('token') }}" class="form-control"
                            name="token" />
                        <p class="m-0">New Password</p>
                        <input type="password" class="form-control" name="password" />
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <p class="m-0">New Password</p>
                        <input type="password" class="form-control" name="password_confirmation" />
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </form>



                </div>
            </div>
        </div>
    </section>





















</body>

</html>
