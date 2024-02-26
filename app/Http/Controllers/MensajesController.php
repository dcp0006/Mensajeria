<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChatModel;
use Faker\Extension\CountryExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class MensajesController extends Controller
{
    public function obtenerMensajes(Request $request)  {
        $recibido = $request->input("enviado");
        if($recibido != "")
        {
            $new = new ChatModel();
            $new->id_user = Session::get("user_id");
            $new->mensaje = $recibido;
            $new->save();
        }
       
        $mensajes = DB::select("SELECT * FROM grupo");
        echo json_encode($mensajes);
    }
}
