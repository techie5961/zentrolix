<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zentrolix - Under Maintenance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #0d1f1d;
            color: #e0e0e0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            max-width: 700px;
            width: 100%;
            background-color: #132a28;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid #1e3f3c;
        }
        
        .logo {
            margin-bottom: 30px;
        }
        
        .logo h1 {
            font-size: 2.5rem;
            color: #10b981;
            margin-bottom: 10px;
        }
        
        .logo p {
            color: #a0a0a0;
            font-size: 1.1rem;
        }
        
        .main-image {
            width: 100%;
            max-width: 400px;
            margin: 0 auto 30px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        
        
        .message {
            background-color: rgba(16, 185, 129, 0.1);
            border-left: 4px solid #10b981;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 30px;
            text-align: left;
        }
        
        .message h2 {
            color: #10b981;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        
        .message p {
            line-height: 1.6;
            margin-bottom: 10px;
        }
        
        .status {
            display: inline-block;
            background-color: #10b981;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }
        
        .contact {
            margin-top: 30px;
        }
        
        .contact p {
            margin-bottom: 15px;
            color: #a0a0a0;
        }
        
        .email {
            color: #10b981;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .social {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .social a {
            color: #e0e0e0;
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        
        .social a:hover {
            color: #10b981;
        }
        
        .footer {
            margin-top: 40px;
            color: #a0a0a0;
            font-size: 0.9rem;
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 30px 20px;
            }
            
            .logo h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">

            
        <img src="{{ asset('logo.png?v=1.1') }}" width="50%" class="w-100" alt="">
        
        <div class="main-image">
            
        </div>
        
        <div class="status">Platform Under Development</div>
        
        <div class="message">
            <h2>Important Notice</h2>
            <p>We encountered an issue with our payment gateway leading to a temporary downtime.</p>
            <p>Our team is working diligently to resolve the problem and restore full functionality.</p>
            <p>We apologize for any inconvenience and appreciate your patience.</p>
        </div>
        
        <div class="contact">
            <p>For urgent inquiries, please contact us at:</p>
            <p class="email">support@zentrolix-site.int.ng</p>
            
            <div class="social">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-telegram"></i></a>
            </div>
        </div>
        
        <div class="footer">
            <p>&copy; 2025 Zentrolix. All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>