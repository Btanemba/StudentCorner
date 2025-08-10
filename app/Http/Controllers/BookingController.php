<?php

namespace App\Http\Controllers;

use App\Models\BookingTable;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmation;
use App\Mail\AmbassadorNotification;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    function BookingIndex(){
        return view('index');
    }

  public function DataInsert(Request $request)
{
    $ambassadors = [
        'Benedict Anemba' => 'anembaben@gmail.com',
    ];

    $validatedData = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'ambassador' => [
            'required',
            'string',
            'max:255',
            function ($attribute, $value, $fail) use ($ambassadors) {
                if (!array_key_exists($value, $ambassadors)) {
                    $fail('The selected ambassador is invalid.');
                }
            },
        ],
    ]);

    $booking = BookingTable::create([
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'country' => $validatedData['country'],
        'city' => $validatedData['city'],
        'ambassador' => $validatedData['ambassador'],
    ]);

    if ($booking) {
        $errors = [];

        // Send client email
        try {
            Mail::to($validatedData['email'])->send(new BookingConfirmation($validatedData));
            \Log::info("Client email sent to: {$validatedData['email']}");
        } catch (\Exception $e) {
            \Log::error("Client email failed: {$e->getMessage()}");
            $errors[] = 'Client email could not be sent';
        }

        // Send ambassador email
        $ambassadorEmail = $this->getAmbassadorEmail($validatedData['ambassador']);
        if ($ambassadorEmail) {
            try {
                Mail::to($ambassadorEmail)->send(new AmbassadorNotification($validatedData));
                \Log::info("Ambassador email sent to: {$ambassadorEmail}");
            } catch (\Exception $e) {
                \Log::error("Ambassador email failed: {$e->getMessage()}");
                $errors[] = 'Ambassador notification could not be sent';
            }
        } else {
            \Log::warning("No email found for ambassador: {$validatedData['ambassador']}");
            $errors[] = 'Ambassador notification could not be sent (invalid ambassador)';
        }

        if (empty($errors)) {
            return redirect()->back()->with('success', 'Appointment booked successfully! A confirmation email has been sent.');
        } else {
            return redirect()->back()->with('success', 'Appointment booked successfully! (' . implode(', ', $errors) . ')');
        }
    } else {
        return redirect()->back()->with('error', 'Failed to book appointment. Please try again.');
    }
}

    /**
     * Get ambassador email based on name
     */
private function getAmbassadorEmail($ambassadorName)
{
    $ambassadors = [
        'Benedict Anemba' => 'anembaben@gmail.com',
        'Daniel Sesan' =>'',
        'Samuel Okonkwo'=>'',
        'Mary Farma'=>'',
        'Malachi Gblee'=>'',
        'Peter Ohwoka'=>'ohwokaedesiri@hotmail.com',
        'Akinola Olusegun'=>'',
        'Hyeladzira James'=>'',
        'Estherine Lisinge'=>'',
        'Nnenna Okey'=>'',
        'Lawrence Emmanuel'=>'',


    ];

    \Log::info("Looking up ambassador: {$ambassadorName}");
    return $ambassadors[$ambassadorName] ?? null;
}

}
