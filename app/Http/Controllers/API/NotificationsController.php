<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function show($id)
    {
    	return User::find($id);
    }

    public function notinoleidas()
    {
    	return auth()->user()->unreadNotifications;
    }

    public function notileidas()
    {
    	return auth()->user()->readNotifications;
    }

    public function update($id)
    {
    	DatabaseNotification::find($id)->markAsRead();

        return response()->json(['message' => 'Notificación leida'], 200);
    }

    public function destroy($id)
    {
    	DatabaseNotification::find($id)->delete();

        return response()->json(['message' => 'Notificación eliminada.'], 200);
    }

}
