<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
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
            padding: 25px;
            text-align: center;
        }

        .header h1 {
            color: #c9a227;
            margin: 0;
            font-size: 22px;
        }

        .content {
            padding: 30px;
        }

        .alert-box {
            background: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 25px;
        }

        .alert-box h2 {
            color: #856404;
            margin: 0 0 5px;
            font-size: 16px;
        }

        .alert-box p {
            color: #856404;
            margin: 0;
            font-size: 14px;
        }

        .details {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 25px;
        }

        .detail-row {
            border-bottom: 1px solid #e0e0e0;
            padding: 12px 0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #1a1a2e;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            color: #333;
            margin-top: 5px;
        }

        .message-box {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .message-box h3 {
            color: #1a1a2e;
            margin: 0 0 15px;
            font-size: 16px;
        }

        .message-content {
            color: #555;
            white-space: pre-wrap;
            font-size: 14px;
        }

        .cta-button {
            display: inline-block;
            background: #c9a227;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            margin-top: 20px;
        }

        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>📬 New Contact Form Submission</h1>
        </div>

        <div class="content">
            <div class="alert-box">
                <h2>🔔 New Inquiry Received</h2>
                <p>A visitor has submitted the contact form on your website.</p>
            </div>

            <div class="details">
                <div class="detail-row">
                    <div class="detail-label">Name</div>
                    <div class="detail-value">{{ $contact->name }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">Email</div>
                    <div class="detail-value">
                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                    </div>
                </div>

                @if($contact->phone)
                    <div class="detail-row">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">
                            <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                        </div>
                    </div>
                @endif

                <div class="detail-row">
                    <div class="detail-label">Subject</div>
                    <div class="detail-value">{{ $contact->subject }}</div>
                </div>

                @if($contact->practiceArea)
                    <div class="detail-row">
                        <div class="detail-label">Practice Area</div>
                        <div class="detail-value">{{ $contact->practiceArea->title }}</div>
                    </div>
                @endif

                <div class="detail-row">
                    <div class="detail-label">Submitted At</div>
                    <div class="detail-value">{{ $contact->created_at->format('F d, Y \a\t h:i A') }}</div>
                </div>
            </div>

            <div class="message-box">
                <h3>📝 Message</h3>
                <div class="message-content">{{ $contact->message }}</div>
            </div>

            <center>
                <a href="{{ url('/admin/contacts/' . $contact->id) }}" class="cta-button">
                    View in Admin Panel
                </a>
            </center>
        </div>

        <div class="footer">
            <p>This notification was sent from your website contact form.</p>
        </div>
    </div>
</body>

</html>