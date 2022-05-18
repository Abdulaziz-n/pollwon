<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Http\Resources\FeedbackResource;
use App\Http\Requests\Feedback\FeedbackRequest;

class FeedbackController extends Controller
{
    public function index()
    {
        return FeedbackResource::collection(Feedback::all())->all();
    }

    public function store(FeedbackRequest $request)
    {
        $data = Feedback::create([
           'name' => $request->name,
           'phone' => $request->phone,
           'message' => $request->message
        ]);

        return new FeedbackResource($data);
    }
}
