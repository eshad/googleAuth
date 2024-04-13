<!DOCTYPE html>
<html>
<head>
    <title>QR Code View</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Google Auth Check</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('authenticate') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="one_time_password" class="col-md-4 col-form-label text-md-right">One Time Password</label>
                                <div class="col-md-8">
                                    <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
                                </div>
                                <label for="secret" class="col-md-4 col-form-label text-md-right">Secret Code</label>
                                <div class="col-md-8">
                                    <input id="secret" type="text" class="form-control" name="secret" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
