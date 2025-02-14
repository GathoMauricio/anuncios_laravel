<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function descargarAndroidApp(Request $request)
    {
        return response()->download(storage_path('app/public/android_app/catinmo.apk'));
    }
}
