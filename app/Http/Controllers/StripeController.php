<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Http\RedirectResponse;

class StripeController extends Controller
{
    public function checkout(Request $request): RedirectResponse
    {
        //Se crea el anuncio pero se guarda con estatus pendiente hasta saber q sucede con el pago
        return dd($request);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::create([
            'client_reference_id' => "id unico del cliente",
            'customer_email' => "patito@mail.com",
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'mxn',
                        'product_data' => [
                            'name' => 'Perro Maltes', //se agrega el titulo del anuncio
                            'description' => 'lorem ipsum', //se agrega la descripción del anuncio
                        ],
                        'unit_amount'  => 1000, //el monto q se cobrará va a variar según las reglas del sistema
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            //si la tarjeta pasa redirige a la ruta succes donde actualizamos el estatus del anuncio pasando como parametro el id
            'success_url' => route('stripe_success', 0),
            //si se cancela la compra o no pasa se redirige a los detalles del anuncio q debe estar pendiente de pago
            'cancel_url'  => route('/'),
        ]);
        return redirect()->away($session->url);
    }

    public function success($id)
    {
        //actualizar el anuncio
    }
}
