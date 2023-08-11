<?php

namespace App\Services;

use App\DTOs\SuscriptionDTO;

interface ISuscriptionService
{
    public function getAllWithRelations();
    public function createSuscription(SuscriptionDTO $sDTO);
    public function cancelSuscription(SuscriptionDTO $sDTO);
}
