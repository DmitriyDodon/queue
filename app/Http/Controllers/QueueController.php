<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function makeQueue(Request $request)
    {
        \App\Models\UserData::all()->each(function ($item){
            dispatch(new \App\Jobs\ParserJob($item->only('user_ip' , 'user_agent')))->onQueue('parsing');
            $item->delete();
        });
        $request->session()->put([
            'message' => 'Queue with fake data was made.',
        ]);
        return new RedirectResponse('/');
    }
}
