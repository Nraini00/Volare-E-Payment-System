<?php

// DebtorController.php

namespace App\Http\Controllers;

use App\Models\Debtor;// Ensure you have a Debtor model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebtorController extends Controller
{

    public function index()
    {
        // Get the logged-in collector's ID
        $collectorId = Auth::id();

        // Fetch the debtors associated with the logged-in collector
        $debtors = Debtor::where('collector_id', $collectorId)->get();

        // Pass the debtors to the view
        return view('collector.dashboard', compact('debtors'));
    }


    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'no_ic' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15', // Adjust max length as needed
            'loan_type' => 'required|string|max:255',
            'loan_amount' => 'required|numeric',
            'loan_date_start' => 'required|date',
            'loan_date_end' => 'required|date|after_or_equal:loan_date_start',
            'duration' => 'required|integer',
            'total_amount' => 'required|numeric',
            'gender' => 'required|string|max:10', // Assuming gender can be 'Male', 'Female', etc.
            'status' => 'required|string|max:20', // Adjust as needed
            'payment_id' => 'nullable|integer', // If payment_id is optional
        ]);

        // Create a new debtor
        Debtor::create([
            'no_ic' => $request->no_ic,
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'loan_type' => $request->loan_type,
            'loan_amount' => $request->loan_amount,
            'loan_date_start' => $request->loan_date_start,
            'loan_date_end' => $request->loan_date_end,
            'duration' => $request->duration,
            'total_amount' => $request->total_amount,
            'gender' => $request->gender,
            'status' => $request->status,
            'payment_id' => $request->payment_id, // Optional
            'collector_id' => Auth::id(), // Associate debtor with the logged-in collector
        ]);

        return redirect()->back()->with('success', 'Debtor registered successfully!');
    }

    public function edit($id)
{
    $debtor = Debtor::findOrFail($id);
    return response()->json($debtor); // Return the debtor data as JSON for AJAX
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_ic' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'loan_type' => 'required|string|max:255',
            'loan_amount' => 'required|numeric',
            'loan_date_start' => 'required|date',
            'loan_date_end' => 'required|date|after_or_equal:loan_date_start',
            'duration' => 'required|integer',
            'total_amount' => 'required|numeric',
            'gender' => 'required|string|max:10',
            'status' => 'required|string|max:20',
            'payment_id' => 'nullable|integer',
        ]);

        $debtor = Debtor::findOrFail($id);
        $debtor->update($request->all());

        return response()->json(['success' => 'Debtor updated successfully!']);
    }

    public function destroy($id)
    {
        $debtor = Debtor::findOrFail($id);
        $debtor->delete();

        return response()->json(['success' => 'Debtor deleted successfully!']);
    }


}


