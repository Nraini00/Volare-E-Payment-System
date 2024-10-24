<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Debtor;
use App\Models\Payment;
use App\Models\Bank;
use App\Models\Collector; // Import the Collector model
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    // Method to show the payment index page
    public function index()
    {
        // Fetch all collectors from the database
        $collectors = Collector::all(); // Fetch all records from the collector table

        return view('payment.index', compact('collectors')); // Pass collectors to the view
    }

    public function getDebtorList(Request $request)
    {
        $collectorId = $request->input('collector_id');
        $debtors = Debtor::where('collector_id', $collectorId)->get(); // Get debtors for the selected collector
        return response()->json($debtors); // Return debtors as JSON response
    }

    public function process(Request $request)
    {
        // Get debtor_id from the request
        $debtorId = $request->get('debtor_id');

        // Fetch all payment methods from the database
        $paymentMethods = Payment::all();

        // Fetch bank list from the database
        $banks = Bank::all(); // Assuming you have a Bank model and banks table

        $debtor = Debtor::find($debtorId);

        // Return view with payment methods and banks
        return view('payment.paymentProcess', compact('paymentMethods', 'debtorId', 'banks',  'debtor'));
    }

    public function showPaymentForm($debtorId)
    {
        // Fetch payment methods from the database
        $paymentMethods = Payment::all(); // Fetching all payment methods

        // Fetch bank list from the database
        $banks = Bank::all(); // Assuming you have a Bank model and banks table



        // Pass the payment methods to the view
        return view('payment.paymentProcess', compact('paymentMethods', 'debtorId', 'banks'));
    }

    public function processPayment(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'payment_id' => 'required|exists:payments,id', // Validate the payment method ID
            'debtor_id' => 'required|exists:debtors,id', // Ensure debtor ID is valid
            'bank' => 'required_if:payment_id,1|string', // Assuming '1' is bank transfer
            // Add more validation rules as needed for other payment methods
        ]);

        // Get the debtor ID from the request
        $debtorId = $request->input('debtor_id');

        // Find the existing debtor record
        $debtor = Debtor::find($debtorId);

        if (!$debtor) {
            // Handle the case where the debtor doesn't exist
            return back()->withErrors(['message' => 'Debtor not found']);
        }

        // Store the payment ID
        $debtor->payment_id = $request->payment_id; // Store the payment ID

        // Handle different payment methods
        switch ($request->payment_id) {
            case 1: // Bank Transfer
                $bankId = $request->bank; // Get the selected bank ID from the request
                $debtor->payment_id = $this->getBankPaymentId($bankId); // Get the associated payment ID from the bank table
                $debtor->save(); // Save the updated record
                $message = 'Bank transfer method selected successfully!';
                break;

            case 2: // Credit Card
                return $this->processCardPayment($debtorId, $request->input('card_token')); // Assuming you're sending a card token from the front end

            case 3: // Debit Card
                return $this->processCardPayment($debtorId, $request->input('card_token')); // Similar to credit card handling

            case 4: // E-wallet
                // Implement e-wallet payment logic here
                $message = 'E-wallet payment method selected successfully!';
                break;

            case 5: // Google Pay
                // Implement Google Pay logic here
                $message = 'Google Pay payment method selected successfully!';
                break;

            default:
                return back()->withErrors(['message' => 'Invalid payment method selected']);
        }

        // Return the payment process view with a message and the debtor ID
        return view('payment.paymentProcess', [
            'debtorId' => $debtorId,
            'payment_id' => $request->payment_id,
            'banks' => Bank::all(), // If needed for the modal
            'message' => $message, // Pass the success message
            'paymentMethods' => Payment::all(), // Pass payment methods if needed
        ]);
    }


    public function processCardPayment($debtorId, $cardToken)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        try {
            // Assuming you get the amount from your logic; using a fixed amount for demonstration
            $amount = 5000; // Amount in cents

            $charge = Charge::create([
                'amount' => $amount, // Amount in cents
                'currency' => 'usd',
                'source' => $cardToken, // Use the card token from the front end
                'description' => 'Payment for Debtor ID: ' . $debtorId,
            ]);

            // Success
            return redirect()->route('payment.success')->with('message', 'Payment successful');
        } catch (\Exception $e) {
            // Handle error
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    private function getBankPaymentId($bankId)
    {
        // Fetch the bank record to get the associated payment_id
        $bank = Bank::find($bankId);

        if ($bank) {
            return $bank->payment_id; // Return the associated payment ID
        }

        return null; // Return null if no bank found
    }
}
