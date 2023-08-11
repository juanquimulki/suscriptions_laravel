<?php

namespace App\Http\Controllers;

use App\Models\Suscription;
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
}
