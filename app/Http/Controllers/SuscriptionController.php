<?php

namespace App\Http\Controllers;

use App\Models\Suscription;

class SuscriptionController extends Controller
{
    public function getSuscriptions() {
        $suscriptions =  Suscription::with('user')->with('service')->get();
        return response()->json($suscriptions);
    }
}
