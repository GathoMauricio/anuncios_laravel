<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Anuncio;
use App\Models\Sepomex;
use App\Models\FotoAnuncio;

class AnuncioController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->rol_id == 2) {
            $anuncios = Anuncio::orderBy('id', 'DESC')->paginate(10);
            if ($request->folio) {
                $anuncios = Anuncio::where('id', $request->folio)->paginate(10);
            }
            return view('anuncio.index', compact('anuncios'));
        } else {
            return abort(403);
        }
    }

    public function create()
    {
        $categorias = Categoria::all();
        $estados = Estado::all();
        return view('anuncio.create', compact('categorias', 'estados'));
    }

    public function store(Request $request): RedirectResponse
    {
        //Se crea el anuncio pero se guarda con estatus pendiente hasta saber q sucede con el pago
        $anuncio = Anuncio::create([
            'user_id' => Auth::user()->id,
            'estatus_id' => 1, //estatus 1 es pendiente de pago
            'categoria_id' => $request->categoria_id,
            'subcategoria_id' => $request->subcategoria_id,
            'estado_id' => $request->estado_id,
            'municipio_id' => $request->municipio_id,
            'colonia_id' => $request->colonia_id,
            'cp' => $request->cp,
            'calle_numero' => $request->calle_numero,
            'titulo' => $request->titulo,
            'descripcion' => $request->deescripcion,
            'precio' => $request->precio,
            'divisa' => $request->divisa,
            'negociable' => ($request->negociable && $request->negociable == 'on') ? true : false,
            'metodo_pago' => 'no disponible',
            'referencia_pago' => 'no disponible',
            'borrador' => ($request->borrador && $request->borrador == 'on') ? 'SI' : 'NO',
            'recamaras' => $request->recamaras,
            'banos' => $request->banos,
            'estacionamiento' => $request->estacionamiento,
            'antiguedad' => $request->antiguedad,
            'niveles' => $request->niveles,
        ]);
        //se obtienen las imagenes
        if ($request->file('archivo_imagen')) {
            //se guardan y se crean cada registro
            for ($i = 0; $i < count($request->file('archivo_imagen')); $i++) {
                $archivo = $request->file('archivo_imagen')[$i];
                $ruta = $archivo->store('public/fotos_anuncios');
                $nombre = explode('/', $ruta)[2];
                echo $nombre . "<br>";
                //crear registro #TODO
                FotoAnuncio::create([
                    'anuncio_id' => $anuncio->id,
                    'ruta' => $nombre,
                    'descripcion' => $request->descripcion_imagen[$i] ? $request->descripcion_imagen[$i] : '',
                ]);
            }
        }
        //Enviar email al usuario
        Mail::send('email.crear_anuncio', ['anuncio' => $anuncio], function ($mail) use ($anuncio) {
            $mail->subject('Categoría Inmuebles - Nuevo anuncio');
            $mail->from('contacto@catinmo.com', 'Categoría Inmuebles');
            $mail->to([$anuncio->cliente->email]);
            $mail->cc(['ventas@arm21.mx', 'mauricio2769@gmail.com']);
        });

        if ($request->premium && $request->premium == 'on') {


            //Se setea la clave secreta de stripe
            Stripe::setApiKey(env('STRIPE_SECRET'));
            //Se crea la sesión de pago
            $session = Session::create([
                'client_reference_id' => $anuncio->cliente->id, //se envia el id del cliente
                'customer_email' => $anuncio->cliente->email,  //se envia el email del cliente
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'mxn', //la moneda se calcula en pesos mexicanos
                            'product_data' => [
                                'name' => $anuncio->titulo, //se envia el titulo del anuncio
                                'description' => $anuncio->descripcion, //se envia la descripción del anuncio
                            ],
                            'unit_amount'  => 39900, //el monto q se cobrará va a variar según las reglas del sistema
                        ],
                        'quantity'   => 1,
                    ],
                ],
                'mode'        => 'payment',
                //Si la tarjeta pasa redirige a la ruta succes donde actualizamos el estatus del anuncio pasando como parametro el id
                'success_url' => route('pago_exitoso', $anuncio->id),
                //Si se cancela la compra o no pasa se redirige a los detalles del anuncio q debe estar pendiente de pago
                'cancel_url'  => route('ver_anuncio', $anuncio->id),
            ]);
            //Se ejecuta el pago en la plataforma de stripe
            return redirect()->away($session->url);
        } else {
            return redirect()->route('ver_anuncio', $anuncio->id);
        }
    }

    public function update(Request $request, $id)
    {
        //Obtener anuncio y actualizar campos
        $anuncio = Anuncio::find($id);
        $anuncio->update([
            'categoria_id' => $request->categoria_id,
            'subcategoria_id' => $request->subcategoria_id,
            'estado_id' => $request->estado_id,
            'municipio_id' => $request->municipio_id,
            'colonia_id' => $request->colonia_id,
            'cp' => $request->cp,
            'calle_numero' => $request->calle_numero,
            'titulo' => $request->titulo,
            'descripcion' => $request->deescripcion,
            'precio' => $request->precio,
            'negociable' => ($request->negociable && $request->negociable == 'on') ? true : false,
            'metodo_pago' => 'no disponible',
            'referencia_pago' => 'no disponible',
            'borrador' => ($request->borrador && $request->borrador == 'on') ? 'SI' : 'NO',
            'recamaras' => $request->recamaras,
            'banos' => $request->banos,
            'estacionamiento' => $request->estacionamiento,
            'antiguedad' => $request->antiguedad,
            'niveles' => $request->niveles,
        ]);
        //se obtienen las imagenes
        if ($request->file('archivo_imagen')) {
            //se guardan y se crean cada registro
            for ($i = 0; $i < count($request->file('archivo_imagen')); $i++) {
                $archivo = $request->file('archivo_imagen')[$i];
                $ruta = $archivo->store('public/fotos_anuncios');
                $nombre = explode('/', $ruta)[2];
                echo $nombre . "<br>";
                //crear registro #TODO
                FotoAnuncio::create([
                    'anuncio_id' => $anuncio->id,
                    'ruta' => $nombre,
                    'descripcion' => $request->descripcion_imagen[$i] ? $request->descripcion_imagen[$i] : '',
                ]);
            }
        }
        return redirect()->route('mis_anuncios')->with('message', 'El registro ha sido actualizados correctamente.');
    }

    public function updateEstatus(Request $request)
    {
        //Obtener anuncio
        $anuncio = Anuncio::find($request->anuncio_id);
        //Se actualiza el anuncio
        if ($anuncio->update($request->all())) {
            if ($request->estatus_id == 2) {
                Mail::send('email.actualizacion_estatus', ['anuncio' => $anuncio], function ($mail) use ($anuncio) {
                    $mail->subject('Categoría Inmuebles - Actualización de estatus');
                    $mail->from('contacto@catinmo.com', 'Categoría Inmuebles');
                    $mail->to([$anuncio->cliente->email]);
                    $mail->cc(['ventas@arm21.mx', 'mauricio2769@gmail.com']);
                });
            }
            return redirect()->back()->with('message', 'El estatus ha sido actualizado correctamente.');
        }
    }

    public function hacerPremium($id): RedirectResponse
    {
        //Se buscar el anuncio
        $anuncio = Anuncio::find($id);
        //Se setea la clave secreta de stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));
        //Se crea la sesión de pago
        $session = Session::create([
            'client_reference_id' => $anuncio->cliente->id, //se envia el id del cliente
            'customer_email' => $anuncio->cliente->email,  //se envia el email del cliente
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'mxn', //la moneda se calcula en pesos mexicanos
                        'product_data' => [
                            'name' => $anuncio->titulo, //se envia el titulo del anuncio
                            'description' => $anuncio->descripcion, //se envia la descripción del anuncio
                        ],
                        'unit_amount'  => 39900, //el monto q se cobrará va a variar según las reglas del sistema
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            //Si la tarjeta pasa redirige a la ruta succes donde actualizamos el estatus del anuncio pasando como parametro el id
            'success_url' => route('pago_exitoso', $anuncio->id),
            //Si se cancela la compra o no pasa se redirige a los detalles del anuncio q debe estar pendiente de pago
            'cancel_url'  => route('ver_anuncio', $anuncio->id),
        ]);
        //Se ejecuta el pago en la plataforma de stripe
        return redirect()->away($session->url);
    }

    public function pagoExitoso($id)
    {
        //Se actualiza el estatus del anuncio
        $anuncio = Anuncio::find($id);
        $anuncio->estatus_id = 2;
        $anuncio->save();
        //Se redirige hacia los detalles del anuncio
        return redirect()->route('ver_anuncio', $anuncio->id);
    }

    public function show($id)
    {
        $anuncio = Anuncio::find($id);
        return view('anuncio.show', compact('anuncio'));
    }

    public function buscar(Request $request)
    {
        $anuncios = new Anuncio;
        if ($request->categoria_id) {
            $anuncios = $anuncios->where('categoria_id', $request->categoria_id);
        }
        if ($request->estado_id) {
            $anuncios = $anuncios->where('estado_id', $request->estado_id);
        }
        if ($request->municipio_id) {
            $anuncios = $anuncios->where('municipio_id', $request->municipio_id);
        }
        $anuncios = $anuncios->where('borrador', 'NO')->orderBy('estatus_id', 'DESC')->orderBy('id', 'DESC')->paginate(12);
        return view('anuncio.buscar', compact('anuncios'));
    }

    public function todo(Request $request)
    {
        $anuncios = Anuncio::where('borrador', 'NO')->orderBy('estatus_id', 'DESC')->orderBy('id', 'DESC')->paginate(12);
        return view('anuncio.todo', compact('anuncios'));
    }

    public function misAnuncios()
    {
        $anuncios = Anuncio::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(9);
        return view('anuncio.mis_anuncios', compact('anuncios'));
    }

    public function editarAnuncio(Request $request, $id)
    {
        $anuncio = Anuncio::findOrFail($id);
        $categorias = Categoria::all();
        $estados = Estado::all();
        if ($anuncio->user_id == Auth::user()->id || \Auth::user()->rol_id == 2) {
            return view('anuncio.editar_anuncio', compact('anuncio', 'categorias', 'estados'));
        } else {
            return abort(403);
        }
    }

    public function destroy(Request $request, $id)
    {
        $anuncio = Anuncio::findOrFail($id);
        if ($anuncio->delete()) {
            return redirect()->back()->with('message', 'El anuncio ha sido eliminado correctamente.');
        }
    }
}
