<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SaleInn;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function stripe(Request $request, Trip $trip)
    {

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'MXN',
                        'product_data' => [
                            'name' => $trip->name,
                        ],
                        'unit_amount' => $request->price * 100,
                    ],
                    'quantity' => $request->quantity,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success', ['trip' => $trip->id]).'?session_id={CHECKOUT_SESSION_ID}',
        ]);

        if (isset($response->id) && $response->id != '') {
            session()->put('date_start', $request->date_start);
            session()->put('name', $trip->name);
            session()->put('quantity', $request->quantity);
            session()->put('price', $request->price);
            session()->put('total', $request->total);
            session()->put('total_real', $request->total_real);

            return redirect($response->url);
        } else {
            // return redirect()->route('payment.cancel');
        }
    }

    public function success(Request $request, $trip_id)
    {
        $trip = Trip::findOrFail($trip_id);

        $uuid = Str::uuid();
        $uppercaseUuid = strtoupper(str_replace('-', '', substr($uuid, -8)));


        if (isset($request->session_id)) {
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            $payment = new SaleInn();
            $payment->uuid = 'FAC-'.$uppercaseUuid;
            $payment->payment_id = $response->id;
            $payment->trip_name = session()->get('name');
            $payment->quantity = session()->get('quantity');
            $payment->price = session()->get('price');
            $payment->price_real = $trip->price_real;
            $payment->datestart = session()->get('date_start');
            $payment->type_trips = $trip->type_trips;
            $payment->currency = $response->currency;
            $payment->customer_name = $response->customer_details->name;
            $payment->customer_email = $response->customer_details->email;
            $payment->payment_method = 'Stripe';
            $payment->payment_status = $response->status;
            $payment->total =  session()->get('total');
            $payment->total_real =  session()->get('total_real');
            $payment->save();

            return redirect()->route('comprafinalizada');


            session()->forget('date_start');
            session()->forget('name');
            session()->forget('quantity');
            session()->forget('price');
            session()->forget('total');
            session()->forget('total_real');
        } else {

            return redirect()->route('inicio');
        }
    }
}
