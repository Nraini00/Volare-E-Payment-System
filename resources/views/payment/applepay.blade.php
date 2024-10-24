<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="modal fade" id="applePayModal" tabindex="-1" role="dialog" aria-labelledby="applePayModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset('images/applepay.png') }}" alt="Apple Pay" class="img-fluid" width="100">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <h5><strong>Existing Card</strong></h5>
                    <input type="radio" name="card" id="card" value="card" required>
                        <label for="card">
                            <img src="{{ asset('images/card.png') }}" alt="card" class="img-fluid" width="100">
                        </label>
                </div>
                <br>

                <p>Add new Card</p>
                <form id="applePayForm">
                    <div class="form-group">
                        <label for="email"> <i class="fas fa-user"></i> &nbsp;&nbsp;{{ $debtor->name }}</label>
                        <input type="text" class="form-control" name="email" value="{{ $debtor->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" class="form-control" placeholder="card number" name="card_number" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <!-- Expiry Date -->
                            <div class="col-md-6 col-sm-6">
                                <label for="expiry_date">Expiry Date (MM/YY)</label>
                                <input type="text" class="form-control" name="expiry_date" id="expiry_date" placeholder="MM/YY" required>
                            </div>
                            <!-- CVV -->
                            <div class="col-md-6 col-sm-6">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" name="cvv" id="cvv" placeholder="123" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="card_name">Cardholder Name</label>
                        <input type="text" class="form-control" placeholder="cardholder name" name="card_name" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount to be paid: RM {{ number_format($debtor->loan_amount, 2) }}</label>
                        <input type="text" class="form-control" placeholder="amount you want to pay" name="amount" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmapplePay">Pay</button>
            </div>
        </div>
    </div>
</div>

{{-- <script>
    // Add an event listener to the radio button
    const cardRadio = document.getElementById('card');

    // Track the checked status
    cardRadio.addEventListener('click', function () {
        if (this.checked) {
            // If the radio button is already checked, uncheck it
            this.checked = false;
        }
    });
</script> --}}
