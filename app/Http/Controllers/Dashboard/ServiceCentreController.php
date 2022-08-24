<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceCentre\ServiceCentreRequest;
use App\Http\Resources\ServiceCentre\ServiceCentreResource;
use App\Models\ServiceCentre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceCentreController extends Controller
{
    public function index()
    {
        return ServiceCentreResource::collection(ServiceCentre::all())->all();
    }

    public function store(ServiceCentreRequest $request)
    {
        $data = ServiceCentre::create([
            'city' => $request->city,
            'address' => $request->address,
            'description' => $request->description,
        ]);

        return (new ServiceCentreResource($data))->response()->setStatusCode(201);
    }

    public function update(ServiceCentre $serviceCentre, ServiceCentreRequest $request)
    {
        if ($request->isMethod('get')) {
            return response()->json(new ServiceCentreResource($serviceCentre));
        }

        $serviceCentre->update([
            'title' => $request->title,
            'address' => $request->address,
            'description' => $request->description,
        ]);

        return (new ServiceCentreResource($serviceCentre))->response()->setStatusCode(201);
    }

    public function destroy(ServiceCentre $serviceCentre)
    {
        $serviceCentre->delete();

        return response()->json(['result' => 'Deleted successfully !'], 204);
    }
}
