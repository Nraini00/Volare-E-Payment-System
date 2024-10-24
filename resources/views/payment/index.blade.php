<title>ePayment System</title>
    <link rel="stylesheet" href="{{ asset('css/app.scss') }}">
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

        <!-- Choose Collector -->
        <p>Choose your collector name/code:</p>
        <form id="collectorForm">
            @csrf
            <div class="form-group">
                <select name="collector_id" id="collectorSelect" class="form-control" required>
                    <option value="">Select a collector</option>
                    @foreach ($collectors as $collector)
                        <option value="{{ $collector->id }}">{{ $collector->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- This will show after selecting a collector -->
            <div id="debtorSelection" style="display: none;">
                <p>Search your name:</p>
                <input type="text" id="debtorSearch" class="form-control mb-2" placeholder="Search your name...">
                <div class="list-group" id="debtorList"></div>

                <!-- Button to go to payment methods -->
                <button type="button" id="goToPaymentBtn" class="btn btn-success mt-3" style="display: none;">
                    Go to Payment Methods
                </button>
            </div>
        </form>
    </div>

    <script>

        // Handle collector selection
        $('#collectorSelect').on('change', function() {
            const collectorId = $(this).val();
            if (collectorId) {
                // Show the debtor selection form
                $('#debtorSelection').show();

                // Fetch the list of debtors for the selected collector
                $.ajax({
                    url: '{{ route("debtor.list") }}',  // The route to get debtor names
                    type: 'GET',
                    data: { collector_id: collectorId },
                    success: function(data) {
                        let debtorList = '';
                        data.forEach(function(debtor) {
                            debtorList += `<button type="button" class="list-group-item list-group-item-action" data-id="${debtor.id}">${debtor.name}</button>`;
                        });
                        $('#debtorList').html(debtorList);
                    }
                });
            } else {
                $('#debtorSelection').hide();
            }
        });

        // Handle debtor selection
        $('#debtorList').on('click', '.list-group-item', function() {
            const debtorId = $(this).data('id');
            $('#goToPaymentBtn').show();

            // Store selected debtor ID (can be used for submitting later)
            $('#goToPaymentBtn').data('debtor-id', debtorId);
        });

        // Handle go to payment button click
        $('#goToPaymentBtn').on('click', function() {
            const debtorId = $(this).data('debtor-id');
            if (debtorId) {
                // Redirect to the payment page with selected debtor ID
                window.location.href = '{{ route("payment.paymentProcess") }}?debtor_id=' + debtorId;
            }
        });

        // Optional: Search filtering
        $('#debtorSearch').on('input', function() {
            const query = $(this).val().toLowerCase();
            $('#debtorList .list-group-item').each(function() {
                const name = $(this).text().toLowerCase();
                $(this).toggle(name.includes(query));
            });
        });

    </script>
