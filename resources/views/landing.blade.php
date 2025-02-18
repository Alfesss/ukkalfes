<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neumorphic To-Do</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0a0a0a;
            color: #fff;
            line-height: 1.6;
        }

        .hero-section {
            height: 100vh;
            background-color: #0a0a0a;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 20px;
            border: 2px solid #00ff00;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
        }

        .hero-content {
            max-width: 800px;
            padding: 50px;
            border-radius: 20px;
            background: #0a0a0a;
            border: 2px solid #00ff00;
            box-shadow: 20px 20px 60px rgba(0, 255, 0, 0.1),
                       -20px -20px 60px rgba(0, 255, 0, 0.1),
                       0 0 20px rgba(0, 255, 0, 0.3);
        }

        .hero-title {
            font-size: 3.5rem;
            color: #00ff00;
            margin-bottom: 1rem;
            font-weight: 600;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        .hero-subtitle {
            font-size: 1.5rem;
            color: #00cc00;
            margin-bottom: 2rem;
            font-weight: 300;
            text-shadow: 0 0 8px rgba(0, 204, 0, 0.5);
        }

        .btn {
            padding: 15px 40px;
            border: 2px solid #00ff00;
            border-radius: 50px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #0a0a0a;
            box-shadow: 8px 8px 16px rgba(0, 255, 0, 0.1),
                       -8px -8px 16px rgba(0, 255, 0, 0.1),
                       0 0 15px rgba(0, 255, 0, 0.3);
        }

        .btn:active {
            box-shadow: inset 8px 8px 16px rgba(0, 255, 0, 0.1),
                       inset -8px -8px 16px rgba(0, 255, 0, 0.1);
        }

        .btn-primary {
            color: #00ff00;
        }

        .features-section {
            padding: 80px 20px;
            background-color: #0a0a0a;
            border: 2px solid #00ff00;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 20px;
        }

        .feature-card {
            background: #0a0a0a;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid #00ff00;
            box-shadow: 8px 8px 16px rgba(0, 255, 0, 0.1),
                       -8px -8px 16px rgba(0, 255, 0, 0.1),
                       0 0 15px rgba(0, 255, 0, 0.3);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #00ff00;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 50%;
            display: inline-block;
            background: #0a0a0a;
            border: 2px solid #00ff00;
            box-shadow: inset 5px 5px 10px rgba(0, 255, 0, 0.1),
                       inset -5px -5px 10px rgba(0, 255, 0, 0.1),
                       0 0 15px rgba(0, 255, 0, 0.3);
        }

        .feature-title {
            font-size: 1.5rem;
            color: #00ff00;
            margin-bottom: 15px;
            text-shadow: 0 0 8px rgba(0, 255, 0, 0.5);
        }

        .feature-text {
            color: #00cc00;
            font-size: 1rem;
            text-shadow: 0 0 5px rgba(0, 204, 0, 0.5);
        }

        footer {
            background-color: #0a0a0a;
            color: #00ff00;
            padding: 40px 20px;
            text-align: center;
            border: 2px solid #00ff00;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.3);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 20px;
            background: #0a0a0a;
            border: 2px solid #00ff00;
            box-shadow: 8px 8px 16px rgba(0, 255, 0, 0.1),
                       -8px -8px 16px rgba(0, 255, 0, 0.1),
                       0 0 15px rgba(0, 255, 0, 0.3);
        }

        .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }

        .footer-links a {
            color: #00ff00;
            text-decoration: none;
            transition: color 0.3s ease;
            padding: 10px 20px;
            border-radius: 10px;
            background: #0a0a0a;
            border: 2px solid #00ff00;
            box-shadow: 5px 5px 10px rgba(0, 255, 0, 0.1),
                       -5px -5px 10px rgba(0, 255, 0, 0.1),
                       0 0 10px rgba(0, 255, 0, 0.3);
        }

        .footer-links a:active {
            box-shadow: inset 5px 5px 10px rgba(0, 255, 0, 0.1),
                       inset -5px -5px 10px rgba(0, 255, 0, 0.1);
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Tugas Harian</h1>
            <p class="hero-subtitle">Produktivitas Tanpa Batas. Selesaikan Tugas dengan Cerdas!</p>
            <button class="btn btn-primary"><a href="{{ route('login') }}" style="color: #fff; text-decoration: none;">Login untuk melanjutkan</a></button>
        </div>
    </section>
</body>
</html>
