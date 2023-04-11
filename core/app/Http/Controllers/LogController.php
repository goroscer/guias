<?php

namespace App\Http\Controllers;
use App\Log as Log;
use App\Form as Form;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index($id)
    {
        $encode = $id;
        $id = base64_decode($id);
        $array = explode("-", $id);
        $id = $array[0];

        $form = Form::find($id);

        $logs = DB::table('logs')->select(DB::raw(" id, (SELECT name FROM users WHERE users.id = logs.user_id) AS user, comment, created_at"))->where('form_id','=',$id)->get();

        $id = session()->get('guiasid');
        $type = session()->get('guiastype');

        return view('log', compact('logs', 'type', 'form', 'encode'));

    }

}
