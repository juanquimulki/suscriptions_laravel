<?php

namespace App\Services;

use App\DTOs\SuscriptionDTO;

interface ISuscriptionService
{
  public function findAllWithRelations();
  public function createSuscription(SuscriptionDTO $sDTO);
}
