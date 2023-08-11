<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ISuscriptionService;
use App\DTOs\SuscriptionDTO;
use App\Enums\Status;

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
        $sDTO = new SuscriptionDTO(
            $request->user_id,
            $request->service_id,
            Status::$ACTIVE,
            $request->date
        );

        $suscription = $this->suscriptionService->createSuscription($sDTO);
        return response()->json($suscription);
    }

    public function cancelSuscription(Request $request) {
        $sDTO = new SuscriptionDTO(
            $request->user_id,
            $request->service_id,
            Status::$CANCELLED,
            $request->date
        );

        $suscription = $this->suscriptionService->cancelSuscription($sDTO);
        return response()->json($suscription);
    }
}
