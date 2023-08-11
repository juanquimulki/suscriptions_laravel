<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ISuscriptionService;

class SuscriptionController extends Controller
{
    private ISuscriptionService $suscriptionService;

    public function __construct(ISuscriptionService $suscriptionService)
    {
        $this->suscriptionService = $suscriptionService;
    }

    public function getSuscriptions() {
        $suscriptions =  $this->suscriptionService->findAllWithRelations();
        return response()->json($suscriptions);
    }

    public function createSuscription(Request $request) {
        $suscription = $this->suscriptionService->createSuscription($request->user_id, $request->service_id, $request->status, $request->date);
        return response()->json($suscription);
    }
}
