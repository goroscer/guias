<?php

namespace App\Http\Controllers;
use App\User as User;
use App\Receptoria as Receptoria;

use Alert;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $users = DB::table('users')->select(DB::raw(" id, name, username, email, office, (SELECT localidad FROM receptorias WHERE users.office = receptorias.id) AS name, (SELECT n FROM receptorias WHERE users.office = receptorias.id) AS n, dni, phone, type, estatus, created_at, updated_at"))->get();


        $id = session()->get('guiasid');
        $type = session()->get('guiastype');

        return view('usuarios')->with('users', $users)->with('id', $id)->with('type', $type);
    }

    /**
     * Show the user for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = session()->get('guiasid');
        $type = session()->get('guiastype');

        $receptorias = Receptoria::orderBy('localidad')->get();


        return view('usuarios_create')->with('id', $id)->with('type', $type)->with('receptorias', $receptorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{

            $user = new User;

            $user->name = $request->c1;
            $user->dni = $request->c2;
            $user->phone = $request->c3;
            $user->office = $request->c4;            
            $user->type = $request->c5;
            $user->email = $request->c6;
            $user->username = $request->c7;
            $user->password = $request->c8;
    
    
            $user->save();
    
            Alert::success('Usuario guardado satisfactoriamente!.', 'Éxito!');
            return redirect('/users');


        }
        catch (\Illuminate\Database\QueryException $e){
            if($e){
                Alert::error('Usuario no ha podido ser guardado!.', 'Error!');
                return redirect('/users');
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
        //
    }

    /**
     * Show the user for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $user=User::find($id);

        $id = session()->get('guiasid');
        $type = session()->get('guiastype');

        $receptorias = Receptoria::orderBy('localidad')->get();

        return view('usuarios_edit')->with('user', $user)->with('id', $id)->with('type', $type)->with('receptorias', $receptorias);
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

        try{

            $user = User::find($id);

            
            if(!empty($request->c1)){

                $user->name = $request->c1;
            }

            $user->dni = $request->c2;
                
            if(!empty($request->c3)){

                $user->phone = $request->c3;
            }

            if(!empty($request->c4)){

                $user->office = $request->c4;
            }
            if(!empty($request->c5)){

                $user->type = $request->c5;
            }

            $user->email = $request->c6;
            
            if(!empty($request->c7)){

                $user->username = $request->c7;
            }

            $user->password = $request->c8;
            if(!empty($request->c9)){

                $user->estatus = $request->c9;  
            }

    
            $user->save();



        }
        catch (\Illuminate\Database\QueryException $e){
            if($e){
                
                Alert::error('Usuario no ha podido ser modificado (Usuario o Correo en uso)!.', 'Error!');

                if($request->type=='profile'){
                    return redirect('/forms_i');

                }else{

                    return redirect('/users');
                }

            }
        }


        Alert::success('Usuario modificado satisfactoriamente!.', 'Éxito!');
        if($request->type=='profile'){
            return redirect('/forms_i');

        }else{

            return redirect('/users');
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


    public function delete($id)
    {

        $user = User::find($id);
        User::destroy($id);

        Alert::success('Usuario eliminado satisfactoriamente!.', 'Éxito!');
        return redirect('/users');

    }


    public function userm()
    {
        $id = session()->get('guiasid');
        $type = session()->get('guiastype');

        $user=User::find($id);

        $receptorias = Receptoria::all();

        return view('usuario_edit')->with('user', $user)->with('id', $id)->with('type', $type)->with('receptorias', $receptorias);
    }


}
