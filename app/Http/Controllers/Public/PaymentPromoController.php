<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SalePromo;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentPromoController extends Controller
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
                        'unit_amount' => $request->total * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success-promo', ['trip' => $trip->id]).'?session_id={CHECKOUT_SESSION_ID}',
        ]);

        if (isset($response->id) && $response->id != '') {
            session()->put('quantity_child', $request->child);
            session()->put('quantity_adult', $request->adult);
            session()->put('date_start', $request->date_start);
            session()->put('total', $request->total);
            session()->put('total_real', $request->total_real);

            return redirect($response->url);
        } else {
            return redirect()->route('inicio');
        }
    }

    public function success(Request $request, $trip_id)
    {
        $trip = Trip::findOrFail($trip_id);
        $promoInn = $trip->promoinns->first();

        $uuid = Str::uuid();
        $uppercaseUuid = strtoupper(str_replace('-', '', substr($uuid, -8)));


        if (isset($request->session_id)) {
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            $payment = new SalePromo();
            $payment->uuid = 'FAC-'.$uppercaseUuid;
            $payment->payment_id = $response->id;
            $payment->quantity_child = session()->get('quantity_child');
            $payment->quantity_adult = session()->get('quantity_adult');
            $payment->datestart = session()->get('date_start');
            $payment->type_trips = $trip->type_trips;
            $payment->currency = $response->currency;
            $payment->customer_name = $response->customer_details->name;
            $payment->customer_email = $response->customer_details->email;
            $payment->payment_method = 'Stripe';
            $payment->payment_status = $response->status;
            $payment->total =  session()->get('total');
            $payment->total_real =  session()->get('total_real');
            $payment->trip_id = $trip->id;
            $payment->promo_in_id = $promoInn->id;
            $payment->adult_price_client = $promoInn->adult_price_client;
            $payment->child_price_client = $promoInn->child_price_client;
            $payment->adult_price_provider = $promoInn->adult_price_provider;
            $payment->child_price_provider = $promoInn->child_price_provider;
            $payment->save();

            return redirect()->route('comprafinalizada');


            session()->forget('quantity_child');
            session()->forget('quantity_adult');
            session()->forget('date_start');
            session()->forget('total');
            session()->forget('total_real');
        } else {

            return redirect()->route('inicio');
        }
    }
}
