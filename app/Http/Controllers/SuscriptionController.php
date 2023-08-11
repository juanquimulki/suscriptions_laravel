<?php

namespace App\Http\Controllers;

use App\Models\Suscription;

class SuscriptionController extends Controller
{
    public function getSuscriptions() {
        $suscriptions =  Suscription::all();
        return response()->json($suscriptions);
    }
}
