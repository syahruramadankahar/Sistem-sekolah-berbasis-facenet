<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Sistem Sekolah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: absolute;
      width: 400px;
      height: 400px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
      top: -150px;
      right: -80px;
      animation: float 6s ease-in-out infinite;
    }

    body::after {
      content: '';
      position: absolute;
      width: 350px;
      height: 350px;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 50%;
      bottom: -120px;
      left: -80px;
      animation: float 8s ease-in-out infinite reverse;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(20px); }
    }

    .login-container {
      position: relative;
      z-index: 1;
      width: 100%;
      max-width: 420px;
      margin: 0 auto;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 24px;
      padding: 40px 35px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      transition: transform 0.3s ease;
      margin: 0 10px;
    }

    .login-card:hover {
      transform: translateY(-5px);
    }

    .logo-section {
      text-align: center;
      margin-bottom: 32px;
      padding-top: 10px;
    }

    .logo-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      border-radius: 20px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
      box-shadow: 0 8px 16px rgba(30, 60, 114, 0.3);
    }

    .logo-icon i {
      font-size: 36px;
      color: white;
    }

    .login-title {
      font-size: 28px;
      font-weight: 700;
      color: #1e3c72;
      margin-bottom: 10px;
    }

    .login-subtitle {
      font-size: 14px;
      color: #718096;
      font-weight: 400;
      line-height: 1.5;
    }

    .form-label {
      font-size: 14px;
      font-weight: 600;
      color: #4a5568;
      margin-bottom: 10px;
      display: block;
    }

    .input-group-custom {
      position: relative;
      margin-bottom: 24px;
    }

    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #a0aec0;
      font-size: 18px;
      z-index: 2;
      line-height: 1;
    }

    .form-control-custom {
      width: 100%;
      padding: 16px 16px 16px 48px;
      border: 2px solid #e2e8f0;
      border-radius: 12px;
      font-size: 15px;
      transition: all 0.3s ease;
      background: #f7fafc;
      height: 52px;
      line-height: 1.5;
    }

    .form-control-custom:focus {
      outline: none;
      border-color: #1e3c72;
      background: white;
      box-shadow: 0 0 0 4px rgba(30, 60, 114, 0.1);
    }

    .form-control-custom::placeholder {
      color: #cbd5e0;
    }

    .toggle-password {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #a0aec0;
      transition: color 0.3s ease;
      z-index: 2;
      background: none;
      border: none;
      font-size: 16px;
      padding: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }

    .toggle-password:hover {
      color: #1e3c72;
    }

    .btn-login {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      border: none;
      border-radius: 12px;
      color: white;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(30, 60, 114, 0.4);
      margin-top: 10px;
      height: 52px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(30, 60, 114, 0.5);
    }

    .btn-login:active {
      transform: translateY(0);
    }

    .alert-custom {
      border-radius: 12px;
      padding: 14px 16px;
      margin-bottom: 24px;
      border: none;
      display: flex;
      align-items: flex-start;
      gap: 12px;
      animation: slideDown 0.4s ease;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .alert-success-custom {
      background: #d4edda;
      color: #155724;
      border-left: 4px solid #28a745;
    }

    .alert-danger-custom {
      background: #f8d7da;
      color: #721c24;
      border-left: 4px solid #dc3545;
    }

    .alert-warning-custom {
      background: #fff3cd;
      color: #856404;
      border-left: 4px solid #ffc107;
    }

    .alert-info-custom {
      background: #d1ecf1;
      color: #0c5460;
      border-left: 4px solid #17a2b8;
    }

    .error-message {
      color: #dc3545;
      font-size: 13px;
      margin-top: 8px;
      display: none;
      padding-left: 5px;
    }

    .input-error {
      border-color: #dc3545 !important;
      background-color: #fff5f5 !important;
    }

    .shake-animation {
      animation: shake 0.5s ease-in-out;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
      20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    .footer-text {
      text-align: center;
      margin-top: 32px;
      font-size: 13px;
      color: #a0aec0;
      line-height: 1.6;
    }

    .divider {
      display: flex;
      align-items: center;
      margin: 24px 0;
      color: #cbd5e0;
      font-size: 13px;
    }

    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #e2e8f0;
    }

    .divider span {
      padding: 0 16px;
    }

    @media (max-width: 576px) {
      body {
        padding: 20px 15px;
      }
      
      .login-card {
        padding: 30px 25px;
        margin: 0 5px;
      }

      .login-title {
        font-size: 24px;
      }

      .logo-icon {
        width: 70px;
        height: 70px;
        margin-bottom: 18px;
      }

      .logo-icon i {
        font-size: 32px;
      }
      
      .form-control-custom {
        padding: 15px 16px 15px 48px;
        height: 50px;
      }
      
      .btn-login {
        height: 50px;
      }
    }

    .loading {
      display: none;
      width: 20px;
      height: 20px;
      border: 3px solid rgba(255, 255, 255, 0.3);
      border-top-color: white;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .btn-login.loading .loading {
      display: inline-block;
    }
    
    .form-control-custom:not(:placeholder-shown) + .toggle-password {
      color: #1e3c72;
    }
    
    .input-group-custom:last-of-type {
      margin-bottom: 30px;
    }

    .input-group-custom {
      display: flex;
      flex-direction: column;
    }

    .input-icon,
    .toggle-password i {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Notification Toast */
    .notification-toast {
      position: fixed;
      top: 20px;
      right: 20px;
      background: white;
      border-radius: 12px;
      padding: 16px 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      border-left: 4px solid #dc3545;
      display: flex;
      align-items: center;
      gap: 12px;
      z-index: 1000;
      transform: translateX(120%);
      transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      max-width: 350px;
    }

    .notification-toast.show {
      transform: translateX(0);
    }

    .notification-toast.success {
      border-left-color: #28a745;
    }

    .notification-toast .toast-icon {
      font-size: 20px;
      color: #dc3545;
    }

    .notification-toast.success .toast-icon {
      color: #28a745;
    }

    .notification-toast .toast-content {
      flex: 1;
    }

    .notification-toast .toast-title {
      font-weight: 600;
      font-size: 14px;
      margin-bottom: 4px;
      color: #2d3748;
    }

    .notification-toast .toast-message {
      font-size: 13px;
      color: #718096;
      line-height: 1.4;
    }

    .notification-toast .toast-close {
      background: none;
      border: none;
      color: #a0aec0;
      cursor: pointer;
      font-size: 16px;
      padding: 4px;
      transition: color 0.3s ease;
    }

    .notification-toast .toast-close:hover {
      color: #718096;
    }
  </style>
</head>
<body>

  <!-- Notification Toast -->
  <div class="notification-toast" id="notificationToast">
    <i class="fas fa-exclamation-circle toast-icon"></i>
    <div class="toast-content">
      <div class="toast-title" id="toastTitle">Login Gagal</div>
      <div class="toast-message" id="toastMessage">Email atau password yang Anda masukkan salah.</div>
    </div>
    <button class="toast-close" id="toastClose">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <div class="login-container">
    <div class="login-card">
      <div class="logo-section">
        <div class="logo-icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <h1 class="login-title">Selamat Datang</h1>
        <p class="login-subtitle">Masuk ke Sistem Informasi Sekolah</p>
      </div>

      <!-- Alert untuk menampilkan error dari Laravel -->
      @if($errors->any())
        <div class="alert-custom alert-danger-custom">
          <i class="fas fa-exclamation-circle"></i>
          <span>{{ $errors->first() }}</span>
        </div>
      @endif

      @if(session('success'))
        <div class="alert-custom alert-success-custom">
          <i class="fas fa-check-circle"></i>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      <!-- Demo Alert (untuk preview) -->
      <div class="alert-custom alert-success-custom" style="display: none;" id="successAlert">
        <i class="fas fa-check-circle"></i>
        <span>Login berhasil! Mengalihkan...</span>
      </div>

      <form id="loginForm" action="{{ route('login.post') }}" method="POST">
        @csrf
        
        <div class="input-group-custom">
          <label class="form-label">Email</label>
          <div style="position: relative;">
            <i class="fas fa-envelope input-icon"></i>
            <input 
              type="email" 
              name="email" 
              id="email"
              class="form-control-custom" 
              placeholder="nama@email.com" 
              value="{{ old('email') }}"
              required 
              autocomplete="email"
            >
          </div>
          <div class="error-message" id="emailError">Format email tidak valid</div>
        </div>

        <div class="input-group-custom">
          <label class="form-label">Password</label>
          <div style="position: relative;">
            <i class="fas fa-lock input-icon"></i>
            <input 
              type="password" 
              name="password" 
              id="password"
              class="form-control-custom" 
              placeholder="Masukkan password" 
              required
              autocomplete="current-password"
            >
            <button type="button" class="toggle-password" id="togglePassword">
              <i class="fas fa-eye"></i>
            </button>
          </div>
          <div class="error-message" id="passwordError">Password harus minimal 6 karakter</div>
        </div>

        <button type="submit" class="btn-login">
          <span>Masuk</span>
          <div class="loading"></div>
        </button>
      </form>

      <div class="footer-text">
        <i class="fas fa-shield-alt"></i> Terlindungi dan Aman
        <br>
        © 2025 Sistem Informasi Sekolah
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Toggle password visibility
      $('#togglePassword').on('click', function() {
        const passwordField = $('#password');
        const icon = $(this).find('i');
        const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        icon.toggleClass('fa-eye fa-eye-slash');
        
        $(this).css('color', '#1e3c72');
        setTimeout(() => {
          if (type === 'password') {
            $(this).css('color', '#a0aec0');
          }
        }, 300);
      });

      // Notification Toast Functions
      function showNotification(title, message, isSuccess = false) {
        const toast = $('#notificationToast');
        $('#toastTitle').text(title);
        $('#toastMessage').text(message);
        
        if (isSuccess) {
          toast.removeClass('success').addClass('success');
          toast.find('.toast-icon').removeClass('fa-exclamation-circle').addClass('fa-check-circle');
        } else {
          toast.removeClass('success');
          toast.find('.toast-icon').removeClass('fa-check-circle').addClass('fa-exclamation-circle');
        }
        
        toast.addClass('show');
        
        // Auto hide after 5 seconds
        setTimeout(() => {
          hideNotification();
        }, 5000);
      }

      function hideNotification() {
        $('#notificationToast').removeClass('show');
      }

      // Close toast when close button is clicked
      $('#toastClose').on('click', function() {
        hideNotification();
      });

      // Client-side validation only
      $('#loginForm').on('submit', function(e) {
        // Reset error states
        $('.error-message').hide();
        $('.form-control-custom').removeClass('input-error');
        $('#warningAlert').remove();
        
        let isValid = true;
        
        // Email validation
        const email = $('#email').val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
          $('#emailError').show();
          $('#email').addClass('input-error');
          isValid = false;
        }
        
        // Password validation
        const password = $('#password').val();
        if (password.length < 6) {
          $('#passwordError').show();
          $('#password').addClass('input-error');
          isValid = false;
        }
        
        if (!isValid) {
          e.preventDefault();
          
          // Show warning alert
          $('<div class="alert-custom alert-warning-custom" id="warningAlert">' +
            '<i class="fas fa-exclamation-triangle"></i>' +
            '<span>Harap perbaiki kesalahan di atas sebelum melanjutkan</span>' +
            '</div>').insertAfter('.logo-section').hide().fadeIn();
          
          return false;
        }
        
        // Show loading state
        const btn = $('.btn-login');
        btn.addClass('loading');
        btn.find('span').text('Memproses...');
        
        // Form akan dikirim ke server secara normal
        // Biarkan Laravel yang menangani authentication
      });

      // Input focus animation
      $('.form-control-custom').on('focus', function() {
        $(this).parent().find('.input-icon').css('color', '#1e3c72');
        $(this).removeClass('input-error');
      }).on('blur', function() {
        $(this).parent().find('.input-icon').css('color', '#a0aec0');
      });

      // Auto hide alerts after 5 seconds
      setTimeout(function() {
        $('.alert-custom').fadeOut();
      }, 5000);
    });
  </script>

</body>
</html>