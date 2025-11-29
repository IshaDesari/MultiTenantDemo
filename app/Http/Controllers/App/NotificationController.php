<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
    function __construct()
    {
        date_default_timezone_set("Asia/Kolkata");
    }

    public function showNotification()
    {
        $notifications = auth()->user()->unreadNotifications;

        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api')) {
            $notificationList = [];
            foreach($notifications as $notify) {
                $tmp = $notify->data;
                $tmp['nid'] = $notify->id;
                $notificationList[] = $tmp;
            }
            return response()->json(['success' => true, 'data' => $notificationList]);
        }
        else
            return view('app.showNotification', compact('notifications'));
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        if (request()->wantsJson() || Str::startsWith(request()->path(), 'api'))
            return response()->json(['success' => true, 'count' => count(auth()->user()->unreadNotifications)]);
        else
            return response()->json(count(auth()->user()->unreadNotifications));
    }
}