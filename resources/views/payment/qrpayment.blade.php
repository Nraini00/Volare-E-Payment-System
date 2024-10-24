<div class="modal fade" id="qrpaymentModal" tabindex="-1" role="dialog" aria-labelledby="qrpaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrpaymentModalLabel">QR Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="qrpaymentForm">
                    <div class="form-group">
                        <label for="qr">Scan the QR code to make the payment</label>
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('images/qrpay.png') }}" alt="QR Pay" class="img-fluid">
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount to be paid: RM {{ number_format($debtor->loan_amount, 2) }}</label>
                    </div>
                    <div class="form-group">
                        <label for="amount">Time remaining: <span id="timer">60</span> seconds</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmqrPay">Pay</button>
            </div>
        </div>
    </div>
</div>

<script>
    var timerInterval;
    var countdownTime = 60;

    // Function to start the countdown
    function startTimer() {
        var timerDisplay = document.getElementById('timer');
        var timeLeft = countdownTime;

        timerInterval = setInterval(function () {
            timeLeft--;
            timerDisplay.textContent = timeLeft;

            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                timerDisplay.textContent = "Time's up!";
                // Add any logic here to handle when the timer runs out, such as disabling the pay button
                document.getElementById('confirmqrPay').disabled = true;
            }
        }, 1000);
    }

    // Function to reset the timer
    function resetTimer() {
        clearInterval(timerInterval);
        document.getElementById('timer').textContent = countdownTime;
        document.getElementById('confirmqrPay').disabled = false; // Re-enable the pay button if disabled
    }

    // When the modal is shown, start the timer
    $('#qrpaymentModal').on('shown.bs.modal', function () {
        resetTimer();
        startTimer();
    });

    // When the modal is hidden, stop the timer
    $('#qrpaymentModal').on('hidden.bs.modal', function () {
        resetTimer();
    });
</script>
