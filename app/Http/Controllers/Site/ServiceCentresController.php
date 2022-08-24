<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceCentre\ServiceCentreResource;
use App\Models\ServiceCentre;
use Illuminate\Http\Request;

class ServiceCentresController extends Controller
{
    public function index()
    {
        return ServiceCentreResource::collection(ServiceCentre::all())->all();
    }

}
