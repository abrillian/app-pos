<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login - POS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background-color: #f1f3f5;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
    }

    .login-box {
      background: #fff;
      border-radius: 6px;
      padding: 25px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 360px;
    }

    .login-box h4 {
      text-align: center;
      margin-bottom: 20px;
      font-weight: 500;
      color: #333;
    }

    .form-control {
      padding-left: 36px;
    }

    .input-icon {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #6c757d;
    }

    .position-relative {
      position: relative;
    }

    .btn-login {
      width: 100%;
    }

    .alert {
      font-size: 0.85rem;
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h4>Login POS</h4>

    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
      @csrf

      <div class="mb-3 position-relative">
        <i class="bi bi-person input-icon"></i>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>

      <div class="mb-3 position-relative">
        <i class="bi bi-lock input-icon"></i>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>

      <button type="submit" class="btn btn-primary btn-login">Login</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
