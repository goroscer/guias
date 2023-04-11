<?php

namespace App\Http\Controllers;

use App\Receptoria as Receptoria;


use Alert;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReceptoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session()->get('guiasid');
        $type = session()->get('guiastype');
        $office = session()->get('guiasoffice');

        $receptorias = Receptoria::orderBy('localidad')->get();

        return view('receptorias', compact('id', 'type', 'office', 'receptorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = session()->get('guiasid');
        $type = session()->get('guiastype');
        $office = session()->get('guiasoffice');

        return view('receptorias_create', compact('id', 'type', 'office' ));
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

            $receptoria= new Receptoria;

            $receptoria->localidad = $request->c1;
            $receptoria->n = $request->c2;

            $receptoria->save();


        }
        catch (\Illuminate\Database\QueryException $e){
            if($e){
                echo $e;
                Alert::error('La receptoría no ha podido ser creada!.', 'Error!');
                return redirect('/receptorias');
            }
        }


        Alert::success('La receptoría se ha creado satisfactoriamente!.', 'Éxito!');
        return redirect('/receptorias');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $receptoria = Receptoria::find($id);

        $id = session()->get('guiasid');
        $type = session()->get('guiastype');
        $office = session()->get('guiasoffice');


        return view('receptorias_edit', compact('id', 'type', 'office', 'receptoria'));
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

            $receptoria = Receptoria::find($id);

            $receptoria->localidad = $request->c1;
            $receptoria->n = $request->c2;

            $receptoria->save();


        }
        catch (\Illuminate\Database\QueryException $e){
            if($e){
                echo $e;
                Alert::error('La receptoría no ha podido ser modificada!.', 'Error!');
                return redirect('/receptorias');
            }
        }


        Alert::success('La receptoría se ha modificado satisfactoriamente!.', 'Éxito!');
        return redirect('/receptorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affectedRows  = Receptoria::where('id', '=', $id)->delete();

        return $affectedRows;
    }
}
