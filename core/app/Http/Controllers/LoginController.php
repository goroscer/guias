<?php

namespace App\Http\Controllers;
use Alert;

use App\User as User;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LoginController extends Controller
{


    public function login(Request $request)
    {
        $users = User::where('username', '=',$request->input('username'))->get();
        $users = $users->toArray();

        if(count($users) < 1){

            Alert::error('Usuario no existe!.', 'Error!');

            return redirect()->back();

        }

        if(!empty($users)){
        foreach($users as $user){



            if($request->input('pass') == $user['password']){

                if($user['estatus'] == 'Desactivado'){

                    Alert::error('Usuario Desactivado!.', 'Error!');

                    return redirect('/admin');

                }
                session(['guiasid' => $user['id']]);
                session(['guiastype' => $user['type']]);
                session(['guiasoffice' => $user['office']]);

                $type = session()->get('guiastype');
                


                if(substr($type, 0, 4) != 'Rece'){

                    return redirect('/forms');

                }else{

                    return redirect('/forms_i');

                }


            }else{

                Alert::error('Clave incorrecta o usuario no existe!.', 'Error!');

                return redirect('/admin');

            }
        }

        }else{

            Alert::error('Datos no coinciden.', 'Error!');

            return redirect('/');

        }





    }

    public function close()
    {
        session()->forget('guiasid');
        session()->forget('guiastype');
        session()->forget('guiasoffice');

        return redirect('/admin');

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario_registro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->iva = $request->iva;
        $user->phone = $request->phone;
        $user->type = 'Client';

        try{

            $user->save();

            Alert::success('Usuario guardado satisfactoriamente!.', 'Ã‰xito!');
            return redirect('/');

        }
        catch (\Illuminate\Database\QueryException $e){

            if($e){
                Alert::error('Correo duplicado!.', 'Error!');
                return redirect('/');
            }
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ids = session()->get('wifisafeid');
        if($id == $ids){

            $users = User::find($id);


            return view('data')->with('id',$id)->with('users',$users);

        }else{

            session()->forget('wifisafeid');
            session()->forget('wifisafeemail');
            session()->forget('wifisafename');
            session()->forget('wifisafetype');

            Alert::error('AcciÃ³n no permitida!.', 'Error!');
            return redirect('/');

        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->iva = $request->iva;
        $user->phone = $request->phone;

        try{

            $user->save();

            session()->forget('wifisafeid');
            session()->forget('wifisafeemail');
            session()->forget('wifisafename');
            session()->forget('wifisafetype');

            Alert::success('Usuario modificado satisfactoriamente!.', 'Ã‰xito!');
            return redirect('/');

        }
        catch (\Illuminate\Database\QueryException $e){
            if($e){

                Alert::error('Usuario no ha podido ser modificado!.', 'Error!');
                return redirect('/forms');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function recover()
    {

        return view('recover');

    }


    public function recoveremail(Request $request)
    {

        $user = User::where('email', '=',$request->email)->first();


        $email = $user->email;
        $name = $user->name;

        if(empty($user)){

            Alert::success('Correo no registrado.', 'Error!');
            return redirect('/');

        }else{

            Mail::send('mail_recover', ['user' => $user], function($message) use ($user)
            {
                $message->to($user->email, $user->name)->subject('Clave de acceso!');
            });

            Alert::success('Clave enviada!.', 'Ã‰xito!');
            return redirect('/');


        }




    }



}


