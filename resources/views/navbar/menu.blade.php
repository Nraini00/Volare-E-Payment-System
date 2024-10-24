<!-- resources/views/navbar/menu.blade.php -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">

    </div>
    <ul class="nav navbar-nav">
      <li style="font-color:black;"><a href="{{ route('welcome') }}">Home</a></li>
      <li><a href="{{ route('payment.index') }}">Payment</a></li>
      <li><a href="{{ route('faq') }}">FaQ</a></li>
    </ul>
  </div>
</nav>


</body>

