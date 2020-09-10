<?php

namespace App\Http\Controllers\API;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['fetchMessages','sendMessage' ]]);
    }

    public function fetchMessages()
    {
    	return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
    	$message = auth()->user()->messages()->create([
    		'message' => $request->message
    	]);

    	broadcast(new MessageSent($message->load('user')))->toOthers();

    	return ['status'=>'success'];
    }

	public function userMessage()
	{
		$user = auth()->user();
		return new UserResource($user);
	}


}
