<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuaranteedService\GuaranteedServiceResources;
use App\Models\GuaranteedService;
use Illuminate\Http\Request;

class GuaranteedController extends Controller
{
    public function index()
    {
        $guaranteed = GuaranteedService::all();

        return  GuaranteedServiceResources::collection($guaranteed)->all();
    }
}
