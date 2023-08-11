<?php

namespace App\Services;

interface ISuscriptionService
{
  public function findAllWithRelations();
  public function createSuscription(int $userId, int $serviceId, string $status, string $date);
}
