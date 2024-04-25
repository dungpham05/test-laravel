<?php

namespace App\Repositories;

use App\Models\LicensePlate;
use App\Repositories\Repository;
use App\Repositories\Interfaces\LicensePlateRepositoryInterface;

class LicensePlateRepository extends Repository implements LicensePlateRepositoryInterface
{
    /**
     * GetModel function
     *
     * @return void
     */
    public function getModel()
    {
        return LicensePlate::class;
    }
}
