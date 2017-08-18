<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

use Mookofe\Tail\Facades\Tail;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function send(Request $request)
    {
        $request = $request->all();

        $data = [];
        $data['phone_number'] = $request['phone_number'];

        Tail::add('send-sms', json_encode($data));

        return response()
            ->json($data);
    }
}
