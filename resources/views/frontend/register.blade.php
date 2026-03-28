<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1,
        h2 {
            color: #007bff;
            font-weight: 600;
        }

        .custom-table th {
            background-color: #e9ecef;
            font-weight: bold;
            font-size: 16px;
            padding: 12px;
            text-align: left; /* Align text to the left in table headers */
        }

        .custom-table td {
            background-color: #ffffff;
            font-size: 14px;
            padding: 12px;
            text-align: left; /* Align text to the left in table cells */
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #dee2e6;
        }

        .img-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .img-container img {
    width: 100%; /* Full width */
    height: auto; /* Maintain aspect ratio */
    max-height: 70px; /* Set a maximum height */
    border-radius: 10px;
    display: block;
    margin: 0 auto;
}


        .table-info {
            background-color: #f1f8ff;
            font-weight: bold;
            padding: 8px;
        }

        .table-info td {
            background-color: #ffffff;
        }

        .footer-text {
            font-size: 14px;
            text-align: center;
            color: #6c757d;
            margin-top: 30px;
        }

        /* Media Queries for smaller devices */
        @media (max-width: 767px) {
            .custom-table th,
            .custom-table td {
                font-size: 12px;
                padding: 8px;
            }

            .img-container img {
                max-width: 200px;
            }
        }
    </style>
</head>

<body>
    <div class="container"> <div class="row">
        <div class="col-12">
            <div class="img-container">
                <img src="{{ $message->embed(public_path('nbri/Screenshot (22) (1).png')) }}" alt="Your Image Alt Text">
            </div>
            <h1 class="text-center mb-3">Booking Request Successfully Registered</h1>
            <p class="text-center">Hello! Your booking request has been successfully registered. We will get back to you with
                further updates.</p>

            <div class="table-responsive">
                <h2>Application Details</h2>
                <table class="table table-bordered custom-table">
                    <thead>
                        <tr>
                            <th>Application Status</th>
                            <th>Application ID</th>
                            <th>Applicant's name</th>
                            <th>Organization Type</th>
                            <th>Organization Name</th>
                            <th>Designation</th>
                            <th>Employee ID</th>
                            <th>Contact No</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-info">
                            <td>Pending</td>
                            <td>{{ $application->application_id }}</td>
                            <td>{{ $application->application_name }}</td>
                            <td>{{ $application->organization_type }}</td>
                            <td>
                                @if ($application->organization_type == 'CSIR')
                                    {{ $organization?->organization ?? 'N/A' }} {{-- Use optional chaining and null coalescing --}}
                                @else
                                    {{ $application->manual_organization ?? 'N/A' }}
                                @endif
                            </td>
                            <td>{{ $application->designation }}</td>
                            <td>{{ $application->employee_id }}</td>
                            <td>{{ $application->contact_no }}</td>
                            <td>{{ $application->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <h2>Guest Details</h2>
                @if ($guests->isEmpty())
                    <p class="text-muted mt-3">No guests associated with this application.</p>
                @else
                    <table class="table table-bordered custom-table">
                        <thead>
                            <tr class="table-secondary">
                                <th>Guest Name</th>
                                <th>Organization</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guests as $guest)
                                <tr>
                                    <td>{{ $guest->guest_name }}</td>
                                    <td>{{ $guest->organization }}</td>
                                    <td>{{ $guest->age }}</td>
                                    <td>{{ $guest->gender }}</td>
                                    <td>{{ $guest->contact }}</td>
                                    <td>{{ $guest->category }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="footer-text">
                <p>Thank you for your submission. If you have any questions, feel free to contact us.</p>
            </div>
        </div>
    </div> </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>