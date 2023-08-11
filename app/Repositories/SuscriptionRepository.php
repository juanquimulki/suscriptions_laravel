<?php

namespace App\Repositories;

use App\DTOs\SuscriptionDTO;
use App\Models\Suscription;
use Illuminate\Database\Eloquent\Collection;

class SuscriptionRepository
{
    public function getAllByDate(string $date) : Collection
    {
        return Suscription::where('date', date('Y-m-d', strtotime($date)))->get();
    }

    public function getAllWithRelations() : Collection
    {
        return Suscription::with('user')->with('service')->get();
    }

    public function createSuscription(SuscriptionDTO $sDTO) : Suscription
    {
        $suscription = new Suscription();

        $suscription->user_id = $sDTO->userId;
        $suscription->service_id = $sDTO->serviceId;
        $suscription->status = $sDTO->status;
        $suscription->date = date('Y-m-d', strtotime($sDTO->date));;

        $suscription->save();
        return $suscription;
    }

    public function updateSuscription(SuscriptionDTO $sDTO) : Suscription
    {
        $suscription = Suscription::where('user_id', $sDTO->userId)->where('service_id', $sDTO->serviceId)->first();

        $suscription->status = $sDTO->status;
        $suscription->date = date('Y-m-d', strtotime($sDTO->date));;

        $suscription->save();
        return $suscription;
    }
}
