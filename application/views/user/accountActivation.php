<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Simple styles for email compatibility */
        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        p {
            color: black;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            box-shadow: 0 0 12px 5px #b9b9b9;
            border-radius: 20px;
            overflow: hidden;
        }
        .email-header {
            background-color: #224870;
            padding: 24px;
            text-align: center;
        }
        .email-header img {
            width: 150px;
        }
        hr {
            border: 2px solid #fda43e;
            margin: 0;
        }
        .email-content {
            padding: 54px;
        }
        h2 {
            margin-top: 0;
            margin-bottom: 36px;
            color: #224870;
            font-weight: bold;
        }
        a.button {
            display: inline-block;
            border-radius: 20px;
            border: 2px solid #fda43e;
            background-color: #224870;
            color: #fda43e;
            padding: 10px 18px;
            font-weight: bold;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        a.button:hover {
            background-color: white;
            box-shadow: 0 0 8px 2px #fda43e;
        }
        .email-footer {
            background-color: #224870;
            padding: 18px;
            text-align: center;
        }
        .email-footer p {
            padding: 8px;
            color: #fda43e;
            font-weight: 800;
            margin: 0 8px;
            display: inline-block;
        }
    </style>
</head>
<body style="background-color: #f0f0f0;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="container">
        <div class="email-header">
            <img src="https://i.ibb.co.com/tCzL84B/Logo2.png" alt="Boat Master Logo">
        </div>
        <hr>
        <div class="email-content">
            <h2>Hello <?= htmlspecialchars($custName) ?>,</h2>
            <p style="margin-bottom: 16px;">Welcome to Boat Master!</p>
            <p>To activate your account please click the button below to verify your email address:</p>
            <div style="text-align: center; padding-block: 54px;">
                <a href="http://localhost/boat_master/auth/activateAccount?custToken=<?= urlencode($custToken) ?>" class="button">ACTIVATE NOW!</a>
            </div>
            <p>Or paste this link into your browser :</p>
            <p><a href="http://localhost/boat_master/auth/activateAccount?custToken=<?= urlencode($custToken) ?>">http://localhost/boat_master/auth/activateAccount?custToken=<?= urlencode($custToken) ?></a></p>
        </div>
        <hr>
        <div class="email-footer">
            <p>- - = = [ Thank You! ] = = - -</p>
        </div>
    </div>
</body>
</html>
