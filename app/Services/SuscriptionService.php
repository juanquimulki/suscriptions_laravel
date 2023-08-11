<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\SuscriptionRepository;

class SuscriptionService implements ISuscriptionService
{
  private SuscriptionRepository $suscriptionRepository;

  public function __construct(SuscriptionRepository $suscriptionRepository)
  {
    $this->suscriptionRepository = $suscriptionRepository;
  }

  public function findAllWithRelations() : Collection
  {
    return $this->suscriptionRepository->findAllWithRelations();
  }
}
