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

</style>
<!-- Include the navbar -->
@include('navbar.menu')

<div class="container">
    <div class="welcome-container">
        <img src="{{ asset('images/epayment logo.png') }}" alt="Logo">
        {{-- <h1 class="mb-0">Welcome to the Volare E-Payment</h1> --}}
    </div>
    <h2>Register</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('auth.register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

</div>
