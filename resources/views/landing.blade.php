<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFEFD5;
            color: #000000;
            line-height: 1.6;
        }

        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: relative;
        }

        .hero-content {
            max-width: 600px;
            padding: 50px;
            position: relative;
            margin-left: 50px;
        }

        .hero-header {
            position: relative;
            margin-bottom: 2rem;
            display: flex;
            justify-content: flex-start;
        }

        .hero-title {
            font-size: 2.5rem;
            color: #000000;
            font-weight: 500;
            text-align: left;
            width: 100%;
            z-index: 1;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #000000;
            margin-bottom: 2rem;
            font-weight: 300;
            text-align: left;
        }

        .hero-image {
            width: 150px;
            height: auto;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .pemanah-image {
            width: 300px;
            height: auto;
            margin-right: 50px;
            transform: scaleX(-1);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: scaleX(-1) translateY(0px);
            }
            50% {
                transform: scaleX(-1) translateY(-10px);
            }
            100% {
                transform: scaleX(-1) translateY(0px);
            }
        }

        .btn {
            padding: 12px 30px;
            border: 2px solid #000000;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #FFEFD5;
        }

        .btn:hover {
            background: #000000;
            color: #FFEFD5;
        }

        .btn-primary {
            color: #000000;
        }

        .features-section {
            padding: 60px 20px;
            background-color: #FFEFD5;
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
            background: #FFEFD5;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2rem;
            color: #000000;
            margin-bottom: 20px;
            padding: 15px;
            display: inline-block;
        }

        .feature-title {
            font-size: 1.2rem;
            color: #000000;
            margin-bottom: 15px;
        }

        .feature-text {
            color: #000000;
            font-size: 0.9rem;
        }

        footer {
            background-color: #FFEFD5;
            color: #000000;
            padding: 30px 20px;
            text-align: center;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .footer-links {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .footer-links a {
            color: #000000;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 8px 15px;
            border-radius: 6px;
        }

        .footer-links a:hover {
            background: #000000;
            color: #FFEFD5;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }

            .hero-image {
                width: 120px;
            }
            
            .pemanah-image {
                width: 200px;
                margin-right: 20px;
            }

            .hero-content {
                margin-left: 20px;
            }
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-header">
                <h1 class="hero-title">Todolist App</h1>
                <img src="{{ asset('asset/todolist.png') }}" alt="Notes Icon" class="hero-image">
            </div>
            <p class="hero-subtitle">Bidik Target dan Raih Produktivitas!. Selesaikan Tugas dengan Cerdas!</p>
            <a href="{{ route('login') }}" style="color: #000000; text-decoration: none;"><button class="btn btn-primary">Login untuk melanjutkan</button></a>
        </div>
        <img src="{{ asset('asset/pemanah.png') }}" alt="Pemanah Icon" class="pemanah-image">
    </section>
</body>
</html>
