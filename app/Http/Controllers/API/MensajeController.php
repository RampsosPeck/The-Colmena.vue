<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mensaje;
use App\Notifications\MensajeSent;
use App\User;
use Illuminate\Http\Request;

class MensajeController extends Controller
{

	public function index()
	{
		return User::where('id','!=',auth()->id())->get(['id','fullname']);
	}

	public function store (Request $request)
	{
		$this->validate($request, [
			'mensaje' => 'required',
			'recipient_id' => 'required|exists:users,id'
		]);
		//return $request->all();
		$mensaje = Mensaje::create([
			'sender_id' => auth()->id(),
			'recipient_id' => $request->recipient_id,
			'body' => $request->mensaje
		]);

		$recipient = User::find($request->recipient_id);

		$recipient->notify(new MensajeSent($mensaje));

		return response()->json(['message' => 'Excelente...!'], 200);
	}

}
