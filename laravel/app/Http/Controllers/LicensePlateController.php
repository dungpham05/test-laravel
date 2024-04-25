<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\LicensePlateRepositoryInterface;

class LicensePlateController extends Controller
{
    private $licensePlateRepo;

    /**
     * Contruct function
     *
     * @param LicensePlateRepositoryInterface $licensePlateRepo licensePlateRepositoryInterface
     */
    public function __construct(
        LicensePlateRepositoryInterface $licensePlateRepo,
    ) {
        $this->licensePlateRepo = $licensePlateRepo;
    }

    /**
     * Show the index license plate.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('license_plate');
    }

    /**
     * Show the search license plate.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $data = $this->licensePlateRepo->findByField(['number_search' => $search]);

        return view('license_plate', ['data' => $data->first()]);
    }
}
