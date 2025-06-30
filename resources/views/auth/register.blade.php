<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 420px;
            margin: 60px auto;
            padding: 30px;
            background: white;
            border-radius: 30px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 10px;
        }
        p {
            text-align: center;
            font-size: 14px;
            color: #666;
        }
        input, select, textarea {
            width: 100%;
            padding: 12px 14px;
            margin: 10px 0;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 14px;
            box-sizing: border-box;
        }
        input::placeholder, textarea::placeholder {
            font-size: 14px;
            color: #888;
        }
        select {
            appearance: none;
            padding-left: 14px;
        }
        .password-field {
            position: relative;
        }
        .password-field input {
            padding-right: 44px;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .form-footer {
            text-align: center;
            margin-top: 15px;
        }
        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }
        .privacy {
            font-size: 12px;
            color: #666;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar</h1>
    <p>Selamat datang! Daftar dan lacak kebutuhan peliharaan Anda.</p>

    <form method="POST" action="{{ route('register.action') }}">
        @csrf

        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Alamat Email" required>

        <div class="password-field">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <span class="toggle-password" onclick="togglePassword('password', 'eye1')">
                <svg id="eye1" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M2.5 12C4 7 8 4 12 4s8 3 9.5 8c-1.5 5-5.5 8-9.5 8s-8-3-9.5-8z"/>
                </svg>
            </span>
        </div>

        <div class="password-field">
            <input type="password" name="password_confirmation" id="confirm_password" placeholder="Ulangi Password" required>
            <span class="toggle-password" onclick="togglePassword('confirm_password', 'eye2')">
                <svg id="eye2" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="black" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path d="M2.5 12C4 7 8 4 12 4s8 3 9.5 8c-1.5 5-5.5 8-9.5 8s-8-3-9.5-8z"/>
                </svg>
            </span>
        </div>

        <select name="role" required>
            <option value="">Pilih Peran</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
            <option value="user">User</option>
        </select>

        <input type="text" name="no_hp" placeholder="Nomor HP" required>
        <textarea name="alamat" rows="3" placeholder="Alamat Lengkap" required></textarea>

        <p class="privacy">
            Dengan mengklik "Daftar", Anda setuju dengan <a href="#">kebijakan privasi kami</a>.
        </p>

        <button>Daftar</button>

        <div class="form-footer">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </div>
    </form>
</div>

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        const isHidden = input.type === 'password';

        input.type = isHidden ? 'text' : 'password';
        icon.innerHTML = isHidden
            ? `<path d="M13.875 18.825A10.05 10.05 0 0 1 12 19c-4.5 0-8.3-3-9.6-7a9.95 9.95 0 0 1 2.3-4m3.3-2.4A9.97 9.97 0 0 1 12 5c4.5 0 8.3 3 9.6 7a9.95 9.95 0 0 1-4.4 5.8M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM3 3l18 18" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>`
            : `<path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
               <path d="M2.5 12C4 7 8 4 12 4s8 3 9.5 8c-1.5 5-5.5 8-9.5 8s-8-3-9.5-8z"/>`;
    }
</script>

</body>
</html>
