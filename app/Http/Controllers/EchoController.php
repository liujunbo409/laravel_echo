<?php

namespace App\Http\Controllers;

use App\Events\OrderRemind;
use App\Events\TriggerAlarm;
use App\Models\Order;
use Illuminate\Http\Request;


class EchoController
{

    public function index(Request $request)
    {
        $new_message['message'] = 'new';
//        $new_message['infos']='aaa';
        event(new TriggerAlarm($new_message));
        return \Illuminate\Support\Facades\Response::make('Trigger Alarm!');
    }

    public function processOrder(Request $request)
    {
        $data = $request->all();
        $order = new Order();
        $order->money = $data['money'];
        $order->save();
        $message=array();
        $message['order']=$order;
        $message['channel']=$data['channel'];
        event(new OrderRemind($message));
        return \Illuminate\Support\Facades\Response::make('提交完成');
    }

    public function look(Request $request)
    {
        $data = $request->all();
        $order_id = '1';
        return view('look', ['order_id' => $order_id]);
    }
}
