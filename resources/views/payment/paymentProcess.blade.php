
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>ePayment System</title>
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
        <h1 class="mb-0">Volare E-Payment</h1>
    </div>

<br>
    <ul class="list-group">
        @if ($debtor)
            <li class="list-group-item"><strong>Name:</strong> {{ $debtor->name }}</li>
        @else
            <li class="list-group-item">Debtor not found</li>
        @endif
        <li class="list-group-item"><strong>Phone Number:</strong> {{ $debtor->phone_number }}</li>
        <li class="list-group-item"><strong>Loan Amount:</strong> RM {{ number_format($debtor->loan_amount, 2) }}</li>
        <li class="list-group-item"><strong>Loan Start Date:</strong> {{ \Carbon\Carbon::parse($debtor->loan_date_start)->format('d-m-Y') }}</li>
        <li class="list-group-item"><strong>Loan End Date:</strong> {{ \Carbon\Carbon::parse($debtor->loan_date_end)->format('d-m-Y') }}</li>
        <li class="list-group-item"><strong>Duration (days):</strong> {{ $debtor->duration }}</li>
        <li class="list-group-item"><strong>Total Amount:</strong> RM {{ number_format($debtor->total_amount, 2) }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $debtor->status }}</li>
    </ul>
    <br>
    <h2>Select Your Payment Method</h2>

    <form id="paymentForm">
        @csrf
        <input type="hidden" name="debtor_id" value="{{ $debtorId }}">

        <div class="form-group">
            <label for="payment_method">Choose Payment Method:</label>
            <select class="form-control" name="payment_id" id="payment_method" required>
                <option value="" disabled selected>Select a Payment Method</option>
                @foreach ($paymentMethods as $method)
                <option value="{{ $method->id }}" data-type="{{ strtolower($method->name) }}">{{ $method->name }}</option>
                @endforeach
            </select>
        </div>

        <br>
        <button type="button" id="proceedButton" class="btn btn-primary">Proceed to Payment</button>
    </form>

    <button type="button" id="back" class="btn"><a href="{{ route('payment.index') }}">Back to List</a></button>
</div>

<!-- Modal for Bank Transfer -->
@include('payment.BankTransfer')

<!-- Modal for Bank Transfer -->
@include('payment.internetBanking')

<!-- Example for Credit Card Modal -->
@include('payment.credit_debitCard')

<!-- Example for Ewallet Modal -->
@include('payment.ewallet')

<!-- Example for Google Pay Modal -->
@include('payment.googlepay')

<!-- Example for Google Pay Modal -->
@include('payment.applepay')

<!-- Example for Google Pay Modal -->
@include('payment.qrpayment')

<script>
    $(document).ready(function() {
        $('#proceedButton').on('click', function() {
            const paymentMethodSelect = $('#payment_method');
            const selectedOption = paymentMethodSelect.find(':selected');

            if (selectedOption.length) {
                const paymentType = selectedOption.data('type');

                if (paymentType) {

                    // Handle the modal display based on the payment type
                    if (paymentType === 'bank transfer') {
                        $('#bankModal').modal('show');
                    } else if (paymentType === 'credit&debit card') {
                        $('#creditCardModal').modal('show');
                    } else if (paymentType === 'internet banking') {
                        $('#internetbankModal').modal('show');
                    } else if (paymentType === 'ewallet') {
                        $('#ewalletModal').modal('show');
                    } else if (paymentType === 'google pay') {
                        $('#googlePayModal').modal('show');
                    } else if (paymentType === 'apple pay') {
                        $('#applePayModal').modal('show');
                    } else if (paymentType === 'qr payment') {
                        $('#qrpaymentModal').modal('show');
                    }
                } else {
                    alert('Please select a payment method.');
                }
            } else {
                alert('Please select a payment method.');
            }
        });


        // Handle credit card confirmation
        $('#confirmCreditCard').on('click', function() {
            const creditCardForm = $('#creditCardForm');
            // Validate and submit the form as needed
            creditCardForm.submit(); // or AJAX request
        });

        // Handle other payment confirmations similarly...
    });
</script>
