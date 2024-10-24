<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- First Modal: Bank Selection -->
<div class="modal fade" id="bankModal" tabindex="-1" role="dialog" aria-labelledby="bankModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bankModalLabel" style="text-align:center;">Bank Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="bank_select">Choose Bank:</label>
                    <select class="form-control" name="bank" id="bank_select" required>
                        <option value="" disabled selected>Select a Bank</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmBankTransfer">Next</button>
            </div>
        </div>
    </div>
</div>

<!-- Second Modal: Payment Process -->
<div class="modal fade" id="paymentProcessModal" tabindex="-1" role="dialog" aria-labelledby="paymentProcessModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentProcessModalLabel">Payment Process</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="selectedBankInfo"></p>
                <div class="form-group">
                    <label for="amount">Amount to Transfer: {{ number_format($debtor->loan_amount, 2) }}</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                </div>
                <div class="form-group">
                    <label for="proof_of_payment">Upload Proof of Payment:</label>
                    <input type="file" class="form-control" id="proof_of_payment" name="proof_of_payment" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="submitPayment">Submit Payment</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle "Next" button click in the first modal (bankModal)
        $('#confirmBankTransfer').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get the selected bank from the dropdown
            var selectedBank = $('#bank_select').val();
            var selectedBankText = $('#bank_select option:selected').text();

            if (selectedBank) {
                // Hide the first modal (bank selection)
                $('#bankModal').modal('hide');

                // Show the second modal (payment process) with bank details
                $('#selectedBankInfo').text('You have selected ' + selectedBankText + '. Please proceed with the payment.');
                $('#paymentProcessModal').modal('show');
            } else {
                alert('Please select a bank to proceed.');
            }
        });

        // Handle "Submit Payment" button click in the second modal (paymentProcessModal)
        $('#submitPayment').on('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            var amount = $('#amount').val();
            var proofOfPayment = $('#proof_of_payment').val();

            if (!amount || !proofOfPayment) {
                alert('Please enter the amount and upload proof of payment to proceed.');
                return;
            }

            // Perform payment submission logic here
            // For demonstration purposes, just show an alert
            alert('Payment submitted successfully!');
        });

        // Debugging: Log modal events
        $('#bankModal').on('shown.bs.modal', function () {
            console.log('Bank modal is shown');
        }).on('hidden.bs.modal', function () {
            console.log('Bank modal is hidden');
        });

        $('#paymentProcessModal').on('shown.bs.modal', function () {
            console.log('Payment process modal is shown');
        }).on('hidden.bs.modal', function () {
            console.log('Payment process modal is hidden');
        });
    });
</script>
