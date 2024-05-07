<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('payment');
    }

    
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            Charge::create([
                'amount' => 10000, 
                'currency' => 'xof',
                'source' => $request->stripeToken,
                'description' => 'Test de paiement Stripe',
            ]);

            
            $request->session()->flash('success', 'Paiement éeffectué avec succès !');

            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            
            $request->session()->flash('error', $e->getMessage());

            return redirect()->route('payment.failure');
        }
    }
}
