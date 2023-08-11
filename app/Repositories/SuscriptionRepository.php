<?php

namespace App\Repositories;

use App\Models\Suscription;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Date;

class SuscriptionRepository
{
  public function findAllWithRelations() : Collection
  {
    return Suscription::with('user')->with('service')->get();
  }

  public function createSuscription(int $userId, int $serviceId, string $status, string $date) : Suscription
  {
      $suscription = new Suscription();

      $suscription->user_id = $userId;
      $suscription->service_id = $serviceId;
      $suscription->status = $status;
      $suscription->date = date('Y-m-d', strtotime($date));;

      $suscription->save();
      return $suscription;
  }
}
