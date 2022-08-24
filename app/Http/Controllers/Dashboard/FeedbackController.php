<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedback\FeedbackUpdateRequest;
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
           'message' => $request->message,
            'type' => $request->type,
            'status' => $request->status ?? 'new'
        ]);

        if ($data->type == 'catalog')
        {
            $data->type = 'Загрузка каталога';
        }
        if ($data->type == 'call')
        {
            $data->type = 'Заказать звонок';
        }
        if ($data->type == 'feedback')
        {
            $data->type = 'Заявка';
        }
        if ($data->type == 'service')
        {
            $data->type = 'Сервис центры';
        }

        $token = "5362655748:AAEUPYhiTrHBjZf8ZfKOUYtipHg4CDLkJJg";
        $chat_id = "-1001780912884";
        $text = '';
        $arr = array(
            'Имя' => $data->name,
            'Телефон' => $data->phone,
            'Тип заявки' => $data->type,
            'Комментарий' => $data->message ?? 'не заполнено'
        );
        foreach ($arr as $key => $value){
          $text .= "<b>". $key ."</b>: " .$value. "%0A";
        };
        $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$text}", "r");

        return new FeedbackResource($data);
    }

    public function update(Feedback $feedback,FeedbackUpdateRequest $request)
    {
        if ($request->isMethod('get'))
        {
            return $feedback;
        }

        $feedback->update([
           'status' => $request->status
        ]);

        return  new FeedbackResource($feedback);
    }
}
