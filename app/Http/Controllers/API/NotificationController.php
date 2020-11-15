<?php

namespace App\Http\Controllers\API;

use App\User;
use LaravelFCM\Facades\FCM;
use Illuminate\Http\Request;
use App\General\Notification;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use LaravelFCM\Message\OptionsBuilder;
use Illuminate\Support\Facades\Validator;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 500, 'message' => $validator->errors()->messages()], 200);
        }
        $allNotifiactions = Notification::where('user_id', $request->input('user_id'))->get();
        return response()->json(['status' => 200, 'data' => $allNotifiactions]);
    }

    public function seen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 500, 'message' => $validator->errors()->messages()], 200);
        }
        Notification::where('user_id', $request->input('user_id'))->update(['seen' => 1]);
        return response()->json(['status' => 200, 'message' => 'status updated']);
    }

    public function getSeen(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 500, 'message' => $validator->errors()->messages()], 200);
        }

        $notifications = Notification::where('user_id', $request->input('user_id'))
            ->where('seen', $request->input('seen'))->get();
        return response()->json(['status' => 200, 'data' => $notifications]);
    }

    public function test_fire(Request $request)
    {
        $users = \App\User::find(96);
        $token = $request->fcm_token;
        // $notification->users()->attach($users);
        if (isset($token) && !is_null($token)) {
            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60 * 20);
            $notificationBuilder = new PayloadNotificationBuilder('title');
            $notificationBuilder->setBody('body')
                ->setSound('default');
            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData(['a_data' => 'my_data']);
            $option = $optionBuilder->build();
            $fcm_notification = $notificationBuilder->build();
            $data = $dataBuilder->build();
            // foreach ($token as $tok)
            $downstreamResponse = FCM::sendTo($token, $option, $fcm_notification, $data);
            dd($downstreamResponse, $token, $option, $fcm_notification, $data);
            // foreach ($users as $user) {
            //     broadcast(new NewNotificationUser($notification , $user));
            //     $user->notifications()->attach($notification);
            // }
            return true;
        }
        return false;
    }
}
