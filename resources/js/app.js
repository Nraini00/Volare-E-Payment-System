require('./bootstrap');


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
                window.location.href = '{{ route("payment.payment") }}?debtor_id=' + debtorId;
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
