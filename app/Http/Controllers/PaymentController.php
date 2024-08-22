<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    //
    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Charge::create([
            'amount' => 999, // Amount in cents
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Product Purchase',
        ]);
        return redirect()->route('confirmation');
    }
}
