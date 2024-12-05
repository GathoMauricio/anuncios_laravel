<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function analizarTexto($texto)
    {
        $texto = $texto;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://commentanalyzer.googleapis.com/v1alpha1/comments:analyze?key=' . env('ANALIZE_KEY'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{comment: {text: \"" . $texto . "\"},\nlanguages: [\"es\"],\nrequestedAttributes: {TOXICITY:{},SEVERE_TOXICITY:{},IDENTITY_ATTACK:{},INSULT:{},PROFANITY:{},THREAT:{} } }");

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        return $result;
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }
}
