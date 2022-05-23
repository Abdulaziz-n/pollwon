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
        return FeedbackResource::collection(Feedback::orderByDesc('created_at')->get())->all();
    }

    public function store(FeedbackRequest $request)
    {
        $data = Feedback::create([
           'name' => $request->name,
           'phone' => $request->phone,
           'message' => $request->message
        ]);
        $token = "5362655748:AAEUPYhiTrHBjZf8ZfKOUYtipHg4CDLkJJg";
        $chat_id = "-760287807";
        $text = '';
        $arr = array(
            'Имя' => $data->name,
            'Телефон' => $data->phone,
            'Комментарий' => $data->message ?? 'не заполнено'
        );
        foreach ($arr as $key => $value){
          $text .= "<b>". $key ."</b>: " .$value. "%0A";
        };

        $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$text}", "r");

        return new FeedbackResource($data);
    }
}
