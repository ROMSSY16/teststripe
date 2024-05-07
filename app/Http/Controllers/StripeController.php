<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function createStripeCustomer(Request $request)
    {
        
        Stripe::setApiKey(config('services.stripe.secret'));

        // Collecte des informations utilisateur à partir de la demande
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        
        try {
            // Créer un nouveau client dans Stripe
            $customer = Customer::create([
                'email' => $email,
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                
            ]);

            $stripeCustomerId = $customer->id;

            // Retourner une réponse de succès
            return response()->json(['message' => 'Client enregistré avec succès !', 'customer_id' => $stripeCustomerId]);
        } catch (\Exception $e) {
        
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function createPaymentIntent(Request $request)
    {
        
        Stripe::setApiKey(config('services.stripe.secret'));

        $amount = $request->amount;
        $currency = $request->currency;
        $customerId = $request->customer_id; 

        try {
            
            $payment = PaymentIntent::create([
                'amount' => $amount,
                'currency' => $currency,
                'customer' => $customerId, 
            ]);

            return response()->json(['message' => 'Paiement crée avec succès !', 'payment_intent' => $payment]);
        } catch (\Exception $e) {
            
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
