<?php

namespace App\Repositories;

use App\Models\Suscription;
use Illuminate\Database\Eloquent\Collection;

class SuscriptionRepository
{
  public function findAllWithRelations() : Collection
  {
    return Suscription::with('user')->with('service')->get();
  }
}
