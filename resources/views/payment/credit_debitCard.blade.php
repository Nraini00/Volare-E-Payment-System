<div class="modal fade" id="creditCardModal" tabindex="-1" role="dialog" aria-labelledby="creditCardModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-black">
                <h5 class="modal-title" id="creditCardModalLabel" style="text-align:center;">Credit & Debit Card Payment</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <img src="{{ asset('images/creditcard.png') }}" height="50px;" alt="creditcard">
                <br>
                <form id="creditCardForm">
                    <!-- Card Number -->
                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" class="form-control" name="card_number" id="card_number" placeholder="1234 5678 9012 3456" required>
                    </div>
                    <!-- Cardholder Name -->
                    <div class="form-group">
                        <label for="card_name">Cardholder Name</label>
                        <input type="text" class="form-control" name="card_name" id="card_name" placeholder="John Doe" required>
                    </div>
                    <!-- Expiry Date and CVV in one row -->
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
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="confirmCreditCard">Pay</button>
            </div>
        </div>
    </div>
</div>

<!-- CSS to enhance appearance -->
<style>

    .modal-title {
        font-weight: bold;
    }
    .form-control {
        border-radius: 0.25rem;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
    .btn-success {
        background-color: #28a745;
        border: none;
    }
</style>
