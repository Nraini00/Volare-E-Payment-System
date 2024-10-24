<title>ePayment System</title>
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

<div class="container mt-4">
    <div class="welcome-container">
        <img src="{{ asset('images/epayment logo.png') }}" alt="Logo">
        <h1 class="mb-0">Volare E-Payment</h1>
    </div>
    <br><br>

    <!--Section: FAQ-->
<section>
    <h3 class="text-center mb-4 pb-2 text-primary fw-bold">FAQ</h3>
    <p class="text-center mb-5">
      Find the answers for the most frequently asked questions below
    </p>
<br>
    <div class="row">
      <div class="col-md-6 col-lg-4 mb-4">
        <h5 class="mb-3 text-primary"><i class="far fa-paper-plane text-primary pe-2"></i>
            What purpose this system is build ? Volare E-Payment?</h5>
        <p>
            Development and integration of new payment technologies or methods that make it
            easier for debtors to repay their debts.
        </p>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <h5 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i>
            Is there any ewallet payment i can use ? </h5>
        <p>
          <strong><u>Yes, </u></strong> you can use popular e-wallets like Apple Pay and Google Pay.
        </p>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <h5 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i>
            Can i pay using QR payment method ?
        </h5>
        <p>
          Yes. You can pay using QR. we do offer that payment method.
        </p>
      </div>

      {{-- <div class="col-md-6 col-lg-4 mb-4">
        <h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i> A simple
          question?
        </h6>
        <p>
          Yes. Go to the billing section of your dashboard and update your payment information.
        </p>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i> A simple
          question?
        </h6>
        <p><strong><u>Unfortunately no</u>.</strong> We do not issue full or partial refunds for any
          reason.</p>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i> Another
          question that is longer than usual</h6>
        <p>
          Of course! We’re happy to offer a free plan to anyone who wants to try our service.
        </p>
      </div> --}}
    </div>
  </section>
  <!--Section: FAQ-->
</div>


