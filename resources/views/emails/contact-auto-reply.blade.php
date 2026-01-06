<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Us</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
        }

        .header {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            color: #c9a227;
            margin: 0;
            font-size: 28px;
        }

        .header p {
            color: rgba(255, 255, 255, 0.7);
            margin: 5px 0 0;
            font-size: 14px;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 20px;
            color: #1a1a2e;
            margin-bottom: 20px;
        }

        .message {
            color: #555;
            margin-bottom: 25px;
        }

        .highlight-box {
            background: #f8f9fa;
            border-left: 4px solid #c9a227;
            padding: 20px;
            margin: 25px 0;
        }

        .highlight-box h3 {
            color: #1a1a2e;
            margin: 0 0 10px;
            font-size: 16px;
        }

        .highlight-box p {
            color: #666;
            margin: 0;
            font-size: 14px;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #c9a227, #a88420);
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 6px;
            font-weight: 600;
            margin: 20px 0;
        }

        .footer {
            background: #1a1a2e;
            color: rgba(255, 255, 255, 0.7);
            padding: 30px;
            text-align: center;
            font-size: 13px;
        }

        .footer a {
            color: #c9a227;
            text-decoration: none;
        }

        .social-links {
            margin: 15px 0;
        }

        .social-links a {
            display: inline-block;
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin: 0 5px;
            line-height: 35px;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>⚖️ {{ $siteName }}</h1>
            <p>Attorney at Law</p>
        </div>

        <div class="content">
            <p class="greeting">Dear {{ $contactName }},</p>

            <p class="message">
                Thank you for reaching out to us. We have successfully received your message regarding
                <strong>"{{ $contactSubject }}"</strong> and appreciate you taking the time to contact our law office.
            </p>

            <div class="highlight-box">
                <h3>📋 What Happens Next?</h3>
                <p>
                    One of our experienced attorneys will review your inquiry and get back to you within
                    <strong>24-48 business hours</strong>. If your matter is urgent, please don't hesitate to call us
                    directly.
                </p>
            </div>

            <p class="message">
                At {{ $siteName }}, we are committed to providing exceptional legal services with
                integrity and personalized attention to every client's needs. We look forward to
                the opportunity to assist you.
            </p>

            <center>
                <a href="{{ url('/contact') }}" class="cta-button">Visit Our Website</a>
            </center>

            <p class="message" style="margin-top: 30px;">
                Best regards,<br><br>
                <strong>The {{ $siteName }} Team</strong><br>
                <span style="color: #999; font-size: 14px;">Professional Legal Services</span>
            </p>
        </div>

        <div class="footer">
            <p><strong>{{ $siteName }}</strong></p>
            <p>123 Legal Street, Law District, City, State 12345</p>
            <p>📞 +1 (234) 567-890 | 📧 info@lawoffice.com</p>
            <p style="margin-top: 20px; font-size: 12px; color: rgba(255,255,255,0.5);">
                This is an automated response. Please do not reply directly to this email.
            </p>
        </div>
    </div>
</body>

</html>