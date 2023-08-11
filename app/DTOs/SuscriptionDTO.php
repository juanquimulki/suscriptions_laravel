<?php

namespace App\DTOs;

class SuscriptionDTO {
    public int $userId;
    public int $serviceId;
    public string $status;
    public string $date;

    public function __construct(
        int $userId,
        int $serviceId,
        string $status,
        string $date
    ) {
        $this->userId = $userId;
        $this->serviceId = $serviceId;
        $this->status = $status;
        $this->date = $date;
    }
}
