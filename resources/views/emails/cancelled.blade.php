<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guest House Booking Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            overflow-x: hidden; /* Prevent horizontal scrolling */
            background: #fff5f5;
            font-family: 'Poppins', sans-serif;
            width: 100%;
            height: 100%;
        }

        /* Main Wrapper to contain everything */
        .main-wrapper {
            max-width: 900px;
            margin: auto;
            overflow: hidden; /* Ensures no extra scrollbars */
            padding-bottom: 20px;
        }

        .header {
            background-color: #ff4c52;
            color: white;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            padding: 20px;
            width: 100%;
        }

        .header-img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            display: block;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .card {
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
            background: #e9ecef;
            font-size: 1.2rem;
            padding: 20px;
            border-left: 5px solid #ff4c52;
        }

        .booking-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: left;
            border-left: 5px solid #ff4c52;
        }

        .data-value {
            font-size: 1.3rem;
            font-weight: bold;
            color: #2c3e50;
        }

        .footer-text {
            text-align: center;
            font-weight: bold;
            color: #2c3e50;
            margin-top: 15px;
        }

        .note {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .highlight {
            color: #ffc107;
            font-weight: bold;
        }

    </style>
</head>

<body>

    <div class="main-wrapper"> <!-- Wrapped Everything Inside This -->
        
        <!-- Full-width header -->
        <div class="header">
            CSIR-National Botanical Research Institute: Guest House Confirmation
        </div>

        <!-- Full-width header image -->
        <img src="{{ $message->embed(public_path('nbriemail.jpg')) }}" alt="CSIR-NBRI Logo" class="header-img">

        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h4>Hi <strong class="data-value">{{ $application->application_name }}</strong>,</h4>
                    <h3>
                          Reference No. : {{ $application->application_id }}
                      </h3>
                    <p>We Regret to inform you due to prior occupancy of rooms!!!
                     


                    </p>
                    <h4>your booking has been denied</h4>
                    <p>Hope to serve your better next time.</p>
                    <div>

                    
  

                    
                    <p class="note">This is an automated email. Please do not reply.</p>
                    
                    <hr>
                    <p class="footer-text">Kind regards,</p>
                    <p class="footer-text">CSIR-National Botanical Research Institute</p>
                </div>
            </div>
        </div>

    </div> <!-- End of Main Wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
