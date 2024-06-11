<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Mail\SaleDelivery\CompraRealizada;
use App\Mail\SaleDelivery\CorreoAdmin;
use App\Mail\SaleDelivery\Proveedor;
use App\Models\Mail as ModelsMail;
use App\Models\SaleDelivery;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class PaymentPackageController extends Controller
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
            'success_url' => route('success-package', ['trip' => $trip->id]).'?session_id={CHECKOUT_SESSION_ID}',
        ]);

        if (isset($response->id) && $response->id != '') {
            session()->put('quantity_simple', $request->quantity_simple);
            session()->put('quantity_double', $request->quantity_double);
            session()->put('quantity_triple', $request->quantity_triple);
            session()->put('quantity_quadruple', $request->quantity_quadruple);
            session()->put('quantity_children_under_10', $request->quantity_children_under_10);

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
        $packageDelivery = $trip->packageDeliveries->first();

        $uuid = Str::uuid();
        $uppercaseUuid = strtoupper(str_replace('-', '', substr($uuid, -8)));


        if (isset($request->session_id)) {
            $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);

            $payment = new SaleDelivery();
            $payment->uuid = 'FAC-'.$uppercaseUuid;
            $payment->payment_id = $response->id;
            $payment->trip_name = $trip->name;
            $payment->hotel_name = $packageDelivery->hotel_name;
            $payment->quantity_simple = session()->get('quantity_simple');
            $payment->quantity_double = session()->get('quantity_double');
            $payment->quantity_triple = session()->get('quantity_triple');
            $payment->quantity_quadruple = session()->get('quantity_quadruple');
            $payment->quantity_children_under_10 = session()->get('quantity_children_under_10');
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
            $payment->package_delivery_id = $packageDelivery->id;

            $payment->provider_simple = $packageDelivery->provider_simple;
            $payment->provider_double = $packageDelivery->provider_double;
            $payment->provider_triple = $packageDelivery->provider_triple;
            $payment->provider_quadruple = $packageDelivery->provider_quadruple;
            $payment->provider_children_under_10 = $packageDelivery->provider_children_under_10;
            $payment->client_simple = $packageDelivery->client_simple;
            $payment->client_double = $packageDelivery->client_double;
            $payment->client_triple = $packageDelivery->client_triple;
            $payment->client_quadruple = $packageDelivery->client_quadruple;
            $payment->client_children_under_10 = $packageDelivery->client_children_under_10;
            $payment->save();

            $emails = [];
            if ($trip->first_email !== null) {
                $emails[] = $trip->first_email;
            }
            if ($trip->second_email !== null) {
                $emails[] = $trip->second_email;
            }

            $email1 = New CompraRealizada($payment);
            Mail::to($response->customer_details->email)->send($email1);
            
            if (!empty($emails)) {
                Mail::to($emails)->send(new Proveedor($payment));
            }

            $correos = ModelsMail::pluck('email')->toArray();
            foreach ($correos as $correoDestino) {
                Mail::to($correoDestino)->send(new CorreoAdmin($payment));
            }

            return redirect()->route('comprafinalizada');

            session()->forget('quantity_simple');
            session()->forget('quantity_double');
            session()->forget('quantity_triple');
            session()->forget('quantity_quadruple');
            session()->forget('quantity_children_under_10');
            session()->forget('date_start');
            session()->forget('total');
            session()->forget('total_real');
        } else {

            return redirect()->route('inicio');
        }
    }
}
