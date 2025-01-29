<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #037294; /* Biru malam */
            color: #fff;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 15%; /* Posisikan lebih dekat ke atas (8% dari tinggi layar) */
            left: 50%;
            transform: translate(-55%, -50%); /* Memastikan logo benar-benar di tengah */
            max-width: 300px; /* Ukuran maksimum logo diperbesar */
            width: auto; /* Supaya proporsi logo tetap */
            height: auto;
        }

        .card {
            background-color: #fff; /* Warna latar belakang card */
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            margin-top: 20px;
        }

        .card-header {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            background-color: #fff;
            border-bottom: 1px solid #444;
            color: #000;
        }

        .form-control {
            background-color: #b0b0b0;
            border: 1px solid #555;
            color: #fff;
        }

        .form-control:focus {
            background-color: #a1a1a1;
            border-color: #1e90ff;
            box-shadow: none;
        }

        .btn {
            background-color: #1e90ff;
            border: none;
        }

        .btn:hover {
            background-color: #1c86ee;
        }

        .error {
            color: crimson;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Logo di luar form -->
    <img src="{{ asset('assets2/img/logodisbun.png') }}" alt="Logo" class="logo">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login_proses') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="username" class="form-control-label">Username:</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                                <div>
                                    @error('username')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-control-label">Password:</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                                <div>
                                    @error('password')
                                    <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center mt-2">
                        <small>&copy; 2024 Disbunnak</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
