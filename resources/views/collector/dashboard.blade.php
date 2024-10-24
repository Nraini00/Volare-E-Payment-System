<title>ePayment System</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
    <br>
    {{-- <h4>Welcome, {{ Auth::user()->name }}!</h4> Welcome the collector --}}

    <form action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-danger" style="float: right;">Logout</button>
    </form>

    <h2>List of Debtors</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDebtorModal">
        Add New Debtor
    </button>
</div>

<br>
<!-- Bootstrap Table Styling -->
<div class="container my-4">
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No IC</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Loan Type</th>
                <th>Loan Amount</th>
                <th>Loan Date Start</th>
                <th>Loan Date End</th>
                <th>Duration</th>
                <th>Total Amount</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($debtors as $debtor)
                <tr>
                    <td>{{ $debtor->no_ic }}</td>
                    <td>{{ $debtor->name }}</td>
                    <td>{{ $debtor->address }}</td>
                    <td>{{ $debtor->phone_number }}</td>
                    <td>{{ $debtor->loan_type }}</td>
                    <td>RM {{ number_format($debtor->loan_amount, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($debtor->loan_date_start)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($debtor->loan_date_end)->format('d/m/Y') }}</td>
                    <td>{{ $debtor->duration }} days</td>
                    <td>RM {{ number_format($debtor->total_amount, 2) }}</td>
                    <td>{{ ucfirst($debtor->gender) }}</td>
                    <td>
                        @if($debtor->status == 'Paid')
                            <span class="badge badge-success">Paid</span>
                        @else
                            <span class="badge badge-danger">{{ $debtor->status }}</span>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" onclick="editDebtor({{ $debtor->id }})" data-toggle="modal" data-target="#editDebtorModal">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteDebtor({{ $debtor->id }})">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="13" class="text-center">No debtors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Add FontAwesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>


<!-- Modal for Adding New Debtor -->
<div class="modal fade" id="addDebtorModal" tabindex="-1" role="dialog" aria-labelledby="addDebtorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDebtorModalLabel">Register New Debtor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('debtor.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="debtorNoIC">No IC</label>
                        <input type="text" name="no_ic" id="debtorNoIC" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="debtorName">Debtor Name</label>
                        <input type="text" name="name" id="debtorName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="debtorAddress">Address</label>
                        <input type="text" name="address" id="debtorAddress" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="debtorPhoneNumber">Phone Number</label>
                        <input type="text" name="phone_number" id="debtorPhoneNumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="debtorLoanAmount">Loan Amount</label>
                        <input type="number" name="loan_amount" id="debtorLoanAmount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="debtorLoanType">Loan Type</label>
                        <select name="loan_type" id="loan_type" class="form-control" required>
                            <option value="">Select a loan type</option>
                            <option value="Personal Loan">Personal Loan</option>
                            <option value="Home Loan">Home Loan</option>
                            <option value="Solar Plus Loan">Solar Plus Loan</option>
                            <option value="Mortgage Loan">Mortgage Loan</option>
                            <option value="Shop Loan">Shop Loan</option>
                            <option value="Special Housing Loan">Special Housing Loan</option>
                            <option value="Auto Loan">Auto Loan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="loanDateStart">Loan Start Date</label>
                        <input type="date" name="loan_date_start" id="loanDateStart" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="loanDateEnd">Loan End Date</label>
                        <input type="date" name="loan_date_end" id="loanDateEnd" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="debtorDuration">Duration (in days)</label>
                        <input type="number" name="duration" id="debtorDuration" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="debtorTotalAmount">Total Amount</label>
                        <input type="number" name="total_amount" id="debtorTotalAmount" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="debtorGender">Gender</label>
                        <select name="gender" id="debtorGender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="debtorStatus">Status</label>
                        <input type="text" name="status" id="debtorStatus" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register Debtor</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editDebtorModal" tabindex="-1" role="dialog" aria-labelledby="editDebtorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDebtorModalLabel">Edit Debtor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editDebtorForm">
                @csrf
                @method('PUT') <!-- Method Spoofing for PUT -->
                <div class="modal-body">
                    <input type="hidden" id="debtorId">
                    <div class="form-group">
                        <label for="editDebtorNoIC">No IC</label>
                        <input type="text" name="no_ic" id="editDebtorNoIC" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorName">Name</label>
                        <input type="text" name="name" id="editDebtorName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorAddress">Address</label>
                        <input type="text" name="address" id="editDebtorAddress" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorPhoneNumber">Phone Number</label>
                        <input type="text" name="phone_number" id="editDebtorPhoneNumber" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorLoanAmount">Loan Amount</label>
                        <input type="number" name="loan_amount" id="editDebtorLoanAmount" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editdebtorLoanType">Loan Type</label>
                        <select name="loan_type" id="editLoanType" class="form-control" required>
                            <option value="">Select a loan type</option>
                            <option value="Personal Loan">Personal Loan</option>
                            <option value="Home Loan">Home Loan</option>
                            <option value="Solar Plus Loan">Solar Plus Loan</option>
                            <option value="Mortgage Loan">Mortgage Loan</option>
                            <option value="Shop Loan">Shop Loan</option>
                            <option value="Special Housing Loan">Special Housing Loan</option>
                            <option value="Auto Loan">Auto Loan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorloanDateStart">Loan Start Date</label>
                        <input type="date" name="loan_date_start" id="editDebtorloanDateStart" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorloanDateEnd">Loan End Date</label>
                        <input type="date" name="loan_date_end" id="editDebtorloanDateEnd" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorDuration">Duration (in days)</label>
                        <input type="number" name="duration" id="editDebtorDuration" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorTotalAmount">Total Amount</label>
                        <input type="number" name="total_amount" id="editDebtorTotalAmount" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorGender">Gender</label>
                        <select name="gender" id="editDebtorGender" class="form-control" required>
                            <option value="">Select Gender</ option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editDebtorStatus">Status</label>
                        <input type="text" name="status" id="editDebtorStatus" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Debtor</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
// Edit Debtor Function: Populates modal with current debtor info
function editDebtor(debtorId) {
        $.ajax({
            url: `/debtor/${debtorId}/edit`, // Route to fetch debtor details
            type: 'GET',
            success: function(data) {
                // Populate the form fields with the debtor data
                $('#debtorId').val(data.id);
                $('#editDebtorNoIC').val(data.no_ic);
                $('#editDebtorName').val(data.name);
                $('#editDebtorAddress').val(data.address);
                $('#editDebtorPhoneNumber').val(data.phone_number);
                $('#editdebtorLoanType').val(data.loan_type);
                $('#editDebtorLoanAmount').val(data.loan_amount);
                $('#editDebtorloanDateStart').val(data.loan_date_start);
                $('#editDebtorloanDateEnd').val(data.loan_date_end);
                $('#editDebtorDuration').val(data.duration);
                $('#editDebtorTotalAmount').val(data.total_amount);
                $('#editDebtorGender').val(data.gender);
                $('#editDebtorStatus').val(data.status);
                // Show the modal
                $('#editDebtorModal').modal('show');
            },
            error: function(err) {
                console.log('Error fetching debtor data:', err);
            }
        });
    }

    // AJAX request to update debtor information
    $('#editDebtorForm').submit(function(e) {
        e.preventDefault();

        var debtorId = $('#debtorId').val(); // Get debtor ID from hidden field
        var formData = $(this).serialize(); // Serialize the form data

        $.ajax({
            url: `/debtor/${debtorId}`, // Route to update debtor
            type: 'PUT',
            data: formData,
            success: function(response) {
                // Hide the modal after successful update
                $('#editDebtorModal').modal('hide');

                // Optionally, refresh the page or update the debtor row on the table
                location.reload(); // Reload the page to see updated data

                // Or update the table row manually
            },
            error: function(err) {
                console.log('Error updating debtor:', err);
            }
        });
    });

    function deleteDebtor(id) {
    if (confirm('Are you sure you want to delete this debtor?')) {
        $.ajax({
            type: 'DELETE',
            url: '/debtor/' + id,
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                alert(response.success);
                location.reload(); // Reload the page after a successful delete
            },
            error: function (error) {
                console.log(error);
                alert('Error deleting debtor.');
            }
        });
    }
}

document.getElementById('loanDateStart').addEventListener('change', calculateDuration);
    document.getElementById('loanDateEnd').addEventListener('change', calculateDuration);

    function calculateDuration() {
        let startDate = document.getElementById('loanDateStart').value;
        let endDate = document.getElementById('loanDateEnd').value;

        if (startDate && endDate) {
            // Convert input dates to JavaScript Date objects
            const start = new Date(startDate);
            const end = new Date(endDate);

            // Calculate the time difference between the two dates in milliseconds
            const timeDiff = end - start;

            // Convert time difference from milliseconds to days
            const duration = timeDiff / (1000 * 60 * 60 * 24);

            // Set the calculated duration in the duration field (in days)
            document.getElementById('debtorDuration').value = duration >= 0 ? duration : 0;
        }
    }

     // Event listeners for the date inputs in the edit modal

document.getElementById('editDebtorloanDateStart').addEventListener('change', calculateDuration1);
document.getElementById('editDebtorloanDateEnd').addEventListener('change', calculateDuration1);

function calculateDuration1() {
    const startDate = document.getElementById('editDebtorloanDateStart').value;
    const endDate = document.getElementById('editDebtorloanDateEnd').value;

    if (startDate && endDate) {
        // Convert input dates to JavaScript Date objects
        const start = new Date(startDate);
        const end = new Date(endDate);

        // Calculate the time difference between the two dates in milliseconds
        const timeDiff = end - start;

        // Convert time difference from milliseconds to days
        const durationInDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24)); // Convert to days

        // Set the calculated duration in the duration field (in days)
        document.getElementById('editDebtorDuration').value = durationInDays >= 0 ? durationInDays : 0;
    } else {
        document.getElementById('editDebtorDuration').value = ''; // Clear if dates are invalid
    }
}


// Function to calculate the total amount based on the loan type and loan amount
function calculateTotalAmount() {
    const loanAmount = parseFloat(document.getElementById('debtorLoanAmount').value);
    const loanType = document.getElementById('loan_type').value;

    let totalAmount = 0;

    // Define the multiplier based on loan type
    switch (loanType) {
        case 'Personal Loan':
            totalAmount = loanAmount * 1.1; // 10% interest
            break;
        case 'Home Loan':
            totalAmount = loanAmount * 1.05; // 5% interest
            break;
        case 'Solar Plus Loan':
            totalAmount = loanAmount * 1.08; // 8% interest
            break;
        case 'Mortgage Loan':
            totalAmount = loanAmount * 1.06; // 6% interest
            break;
        case 'Shop Loan':
            totalAmount = loanAmount * 1.07; // 7% interest
            break;
        case 'Special Housing Loan':
            totalAmount = loanAmount * 1.04; // 4% interest
            break;
        case 'Auto Loan':
            totalAmount = loanAmount * 1.09; // 9% interest
            break;
        default:
            totalAmount = loanAmount; // No interest if no valid loan type selected
            break;
    }

    // Set the calculated total amount in the total amount field
    document.getElementById('debtorTotalAmount').value = totalAmount.toFixed(2);
}

// Event listeners for loan type and loan amount
document.getElementById('loan_type').addEventListener('change', calculateTotalAmount);
document.getElementById('debtorLoanAmount').addEventListener('input', calculateTotalAmount);

// new line

 // Event listeners for loan type and loan amount in edit modal
    function calculateTotalAmount1() {
        const loanAmount = parseFloat(document.getElementById('editDebtorLoanAmount').value);
        const loanType = document.getElementById('editLoanType').value;

        let totalAmount = 0;

        // Define the multiplier based on loan type
        switch (loanType) {
            case 'Personal Loan':
                totalAmount = loanAmount * 1.1; // 10% interest
                break;
            case 'Home Loan':
                totalAmount = loanAmount * 1.05; // 5% interest
                break;
            case 'Solar Plus Loan':
                totalAmount = loanAmount * 1.08; // 8% interest
                break;
            case 'Mortgage Loan':
                totalAmount = loanAmount * 1.06; // 6% interest
                break;
            case 'Shop Loan':
                totalAmount = loanAmount * 1.07; // 7% interest
                break;
            case 'Special Housing Loan':
                totalAmount = loanAmount * 1.04; // 4% interest
                break;
            case 'Auto Loan':
                totalAmount = loanAmount * 1.09; // 9% interest
                break;
            default:
                totalAmount = loanAmount; // No interest if no valid loan type selected
                break;
        }

        // Set the calculated total amount in the total amount field
        document.getElementById('editDebtorTotalAmount').value = totalAmount.toFixed(2);
    }

    document.getElementById('editLoanType').addEventListener('change', calculateTotalAmount1);
    document.getElementById('editDebtorLoanAmount').addEventListener('input', calculateTotalAmount1);
</script>
<style>
    .container {
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
    }

    .table {
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        max-width: 100%;
    }

    .thead-dark th {
        background-color: #343a40;
        color: white;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-danger {
        background-color: #dc3545;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
