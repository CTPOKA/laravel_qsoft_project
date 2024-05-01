<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\SalonsRepositoryContract;
use App\DTO\ApiSalonModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SalonsController extends Controller
{
    public function __construct(public readonly SalonsRepositoryContract $repository)
    {
    }

    public function index(): View
    {
        $salons = $this->repository->findAll();
        return view('pages.salons', ['salons' => $salons]);
    }
}
