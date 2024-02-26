<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class WhattsapController extends Controller
{
    function intro() : string {
        session::put("base_url",url()->current());
        return view('welcome');
    }
    function login() : string {
        return view('userLogin');
    }
    function register() : string {
        return view('userCreate');
    }
    function ChatPage() : string {
        return view('chatPage');
    }
    function loginConfirm(Request $request) {
        $usuarioGet = $request->input('usuario');
        $contrasennaGet = $request->input('password');
        $user = DB::select("SELECT * FROM usuarios");
        for ($i=0; $i < count($user); $i++) { 
            if ($user[$i]->usuario == $usuarioGet) {
                if ($user[$i]->contraseña == $contrasennaGet) {
                    Session::put("user_id",$user[$i]->id);
                    return (Redirect::to('/ChatPage'));
                }else{
                    Session::flash('mensaje', 'La contraseña no es correcta!');
                    return (Redirect::to('/login'));
                }
                
            }
        }
        Session::flash('mensaje', 'Inicio de sesión fallido!');
        return (Redirect::to('/login'));
    }
    function registerConfirm(Request $request) {
        $usuarioGet = $request->input('usuario');
        $contrasennaGet = $request->input('password');
        $contrasenna2Get = $request->input('passwordConfirm');
        $user = DB::select("SELECT * FROM usuarios");
        for ($i=0; $i < count($user); $i++) { 
            if ($user[$i]->usuario == $usuarioGet) {
                if ($user[$i]->contraseña == $contrasennaGet) {
                    Session::flash('mensaje', 'El usuario ya existe!');
                     return (Redirect::to('/create'));
                } 
            }
        }
        if ($contrasennaGet == $contrasenna2Get) {
            Session::flash('mensaje', 'Inicio de sesión fallido!');
             $userSave = new User();
             $userSave->usuario = $usuarioGet;
             $userSave->contraseña = $contrasennaGet;
             $userSave->save();
             Session::flash('mensaje', 'El usuario creado!');
                    return (Redirect::to('/'));
        }
        Session::flash('mensaje', 'Las contraseñas no coinciden!');
                    return (Redirect::to('/create'));
        
        
    }
}
