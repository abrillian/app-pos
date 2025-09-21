<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login - POS Modern</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #667eea, #764ba2);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-card {
      background: #fff;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15);
      width: 100%;
      max-width: 400px;
      transition: transform 0.3s ease;
    }

    .login-card:hover {
      transform: translateY(-5px);
    }

    .login-card h4 {
      text-align: center;
      margin-bottom: 25px;
      font-weight: 600;
      color: #333;
    }

    .form-control {
      border-radius: 50px;
      padding-left: 40px;
      transition: box-shadow 0.3s ease, border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 10px rgba(102, 126, 234, 0.3);
    }

    .input-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #667eea;
    }

    .position-relative {
      position: relative;
    }

    .btn-login {
      border-radius: 50px;
      padding: 10px;
      background: #667eea;
      border: none;
      width: 100%;
      font-weight: 500;
      transition: background 0.3s ease;
    }

    .btn-login:hover {
      background: #5a67d8;
    }

    .alert {
      border-radius: 10px;
      font-size: 0.9rem;
    }

    .footer-text {
      text-align: center;
      margin-top: 15px;
      color: #fff;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h4>Login to POS</h4>

    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
      @csrf

      <div class="mb-3 position-relative">
        <i class="bi bi-person-fill input-icon"></i>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>

      <div class="mb-3 position-relative">
        <i class="bi bi-lock-fill input-icon"></i>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>

      <button type="submit" class="btn btn-login">Login</button>
    </form>
  </div>

  

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
