<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ePayment System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .welcome-container {
    display: flex;
    align-items: center;
}
.welcome-container img {
    height: 100px;
    margin-right: 20px; /* Space between logo and text */
}
body {
        background-color: #fff3cf;
    }

    </style>
</head>
<body background="#fff3cf">
    <!-- Include the navbar -->
    @include('navbar.menu')

    <br>
    <div class="container">
        <div class="welcome-container">
            <img src="{{ asset('images/epayment logo.png') }}" alt="Logo">
            <h1 class="mb-0">Welcome to the Volare E-Payment</h1>
        </div>
        <br>


        <div class="row">
            <!-- Admin (Collector) Login Form -->
            <div class="col-md-6">
                <h3>Admin (Collector) Login</h3>
                 <!-- Include the navbar -->
                    @include('auth.login')
            </div>


            <!-- Button for Debtors -->
            <div class="col-md-6">
                <h3>Debtor Payment</h3>
                <p>If you're a debtor, please click the button below to proceed to the payment page.</p>
                <a href="{{ route('payment.index') }}" class="btn btn-success">Go to Payment Page</a>
            </div>
        </div>

    </div>
</body>
</html>
