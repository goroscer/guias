<?php

namespace App\Http\Controllers;
use App\User as User;

use App\Form as Form;
use App\Archive as Archive;
use App\Activity as Activity;
use App\Log as Log;
use App\Proof as Proof;
use App\Product as Product;
use App\Location as Location;
use App\LocationSE as LocationSE;
use App\Receptoria as Receptoria;

use Alert;
use PDF;
use ZipArchive;
use Response;
use SoapClient;

use DateTime;
use DateInterval;

use URL;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
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


        $forms = DB::table('forms')->select(DB::raw(" id, rs, tipo, origen_l, final_p, cuit1, cuit2, cuit3, cuit4, r5, receptoria, (SELECT localidad FROM receptorias WHERE forms.receptoria = receptorias.id) AS dptooffice, (SELECT n FROM receptorias WHERE forms.receptoria = receptorias.id) AS domioffice, cuit, created_at, estatus, resolucion, updated_at"))->where('estatus', 'NOT LIKE', '%Vencido%')->orderBy('updated_at')->get();


        foreach($forms as $form){


            $generadaf = date('d-m-Y', strtotime($form->created_at));

            $fecha = new DateTime($generadaf);
            $fecha->add(new DateInterval('P10D'));

            $vencimiento = strtotime($fecha->format('d-m-Y')) ;

            $fechaa = strtotime(date('d-m-Y'));


            if($fechaa > $vencimiento AND ($form->estatus != 'Vencido' OR $form->estatus != 'Pagado - Vencido')){
                $f = Form::find($form->id);
                if($f->estatus == 'Pagado'){

                    $f->timestamps = false;
                    $f->estatus = 'Pagado - Vencido';
                    $f->save();
                }



                if($f->estatus != 'Pagado' AND $f->estatus != 'Pagado - Vencido'){

                    $f->timestamps = false;
                    $f->estatus = 'Vencido';
                    $f->save();
                }

                $log = Log::where('form_id', '=', $form->id)->first();
                    
                if(!empty($log)){
                    $logf = date('d-m-Y', strtotime($log->created_at));
                        
                    $logf = new DateTime($logf);
                    $logf->add(new DateInterval('P1D'));
                            
                    $logfp = strtotime($logf->format('d-m-Y')) ;

                    if($fechaa >$logfp){
                        $f->timestamps = false;
                        if($f->estatus == 'Pagado'){
                            $f->estatus = 'Pagado - Vencido';
                        }else{
                            $f->estatus = 'Vencido';
                        }
                        $f->save();
                    }

                }

            }  
                

        }

        $forms = DB::table('forms')->select(DB::raw(" id, rs, tipo, origen_l, final_p, cuit1, cuit2, cuit3, cuit4, r5, receptoria, (SELECT localidad FROM receptorias WHERE forms.receptoria = receptorias.id) AS dptooffice, (SELECT n FROM receptorias WHERE forms.receptoria = receptorias.id) AS domioffice, cuit, created_at, estatus, payment, resolucion, updated_at"))->orderBy('id', 'desc')->get();

        $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id"))->get();



        if($office == 0){

            $receptoria = 'HomeBanking';

        }else{

            $receptoria = Receptoria::where('id', '=', $office)->first();

            $receptoria = $receptoria->localidad.' - '. $receptoria->n;

        }

        

        if($type == 'Rentas ADM' OR $type == 'WebMaster' OR $type == 'Rentas Común'){

            return view('ver_exen', compact('forms', 'id', 'type', 'office', 'receptoria', 'products'));


        }else{

            return redirect('/forms_i');

        }


    }

    public function index_i()
    {

        $id = session()->get('guiasid');
        $type = session()->get('guiastype');
        $office = session()->get('guiasoffice');


        $forms = DB::table('forms')->select(DB::raw(" id, rs, tipo, origen_l, final_p, cuit1, cuit2, cuit3, cuit4, r5, receptoria,(SELECT localidad FROM receptorias WHERE forms.receptoria = receptorias.id) AS dptooffice, (SELECT n FROM receptorias WHERE forms.receptoria = receptorias.id) AS domioffice, cuit, created_at, estatus, resolucion, updated_at"))->where('receptoria','=',$office)->where('estatus', 'NOT LIKE', '%Vencido%')->orderBy('updated_at')->get();


        foreach($forms as $form){


            $generadaf = date('d-m-Y', strtotime($form->created_at));

            $fecha = new DateTime($generadaf);
            $fecha->add(new DateInterval('P10D'));

            $vencimiento = strtotime($fecha->format('d-m-Y')) ;

            $fechaa = strtotime(date('d-m-Y'));


            if($fechaa > $vencimiento AND ($form->estatus != 'Vencido' OR $form->estatus != 'Pagado - Vencido')){
                $f = Form::find($form->id);
                if($f->estatus == 'Pagado'){


                    $f->timestamps = false;
                    $f->estatus = 'Pagado - Vencido';
                    $f->save();
                }
                if($f->estatus != 'Pagado' AND $f->estatus != 'Pagado - Vencido'){

                    $f->timestamps = false;
                    $f->estatus = 'Vencido';
                    $f->save();
                }

                $log = Log::where('form_id', '=', $form->id)->first();
                    
                if(!empty($log)){
                    $logf = date('d-m-Y', strtotime($log->created_at));
                        
                    $logf = new DateTime($logf);
                    $logf->add(new DateInterval('P1D'));
                            
                    $logfp = strtotime($logf->format('d-m-Y')) ;

                    if($fechaa >$logfp){
                        $f->timestamps = false;
                        if($f->estatus == 'Pagado'){
                            $f->estatus = 'Pagado - Vencido';
                        }else{
                            $f->estatus = 'Vencido';
                        }
                        $f->save();
                    }

                }

            }  
                

        }

        $forms = DB::table('forms')->select(DB::raw(" id, rs, tipo, origen_l, final_p, cuit1, cuit2, cuit3, cuit4, r5, receptoria,(SELECT localidad FROM receptorias WHERE forms.receptoria = receptorias.id) AS dptooffice, (SELECT n FROM receptorias WHERE forms.receptoria = receptorias.id) AS domioffice, cuit, created_at, estatus, payment, resolucion, updated_at"))->where('receptoria','=',$office)->orderBy('id', 'desc')->get();


        $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id"))->get();



        return view('ver_exen_i', compact('forms', 'id', 'type', 'office', 'receptoria', 'products'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cuit)
    {



        $locations = Location::all();

        $locations_se = LocationSE::all();

        if($cuit == 0){

            Alert::error('1 o mas cuits no fueron proporcionado, intente colocarlo y volver a ingresar!.', 'Error!')->persistent("Cerrar");        
            
            return view('blank');


        }


        $datos = $this->QueryCuit($cuit);

        if(strlen($cuit) == 11){
            $cuit = $cuit[0].$cuit[1].'-'.$cuit[2].$cuit[3].$cuit[4].$cuit[5].$cuit[6].$cuit[7].$cuit[8].$cuit[9].'-'.$cuit[10];

        }
        $datos['cuitgion'] = $cuit;


        if(empty($datos['rs'])){

            Alert::error('Cuit no encontrada!.', 'Error!')->persistent("Cerrar");        
            
            return view('blank2');

        }

        $form = Form::orderBy('id', 'desc')->first();

        if(empty($form)){

            $id=0;

        }else{

            $id = $form->id+1;

        }

        $date = date("d / m / Y");


        $fecha = date('Y-m-d');
        $fecha = strtotime ('-12 month', strtotime($fecha));
        $mincomp = date('Y-m-d', $fecha);


        $url = URL::to('/');




        Alert::info('La presente tiene carácter de declaración jurada. La omisión o falsedad de los datos serán pasibles de la aplicación de artículos Nº 34, 109 inc. b y 111 de la Ley Nº 6.792 y sus modificatorias.')->persistent('Aceptar');


        return view('formulario_clientes', compact('id', 'date', 'datos', 'locations', 'locations_se', 'mincomp', 'url'));



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



            
            /*$forms = Form::all()->where('cuit', '=' ,$request->c2)->where('estatus', '=' ,'Pendiente');

            if(count($forms) > 0){

                
                Alert::error('Cuenta con una exención pendiente, intente en una vez esta sea procesada!.', 'Error!')->persistent('Aceptar');
                return view('blank');

            }*/

            $v = 0;

            $cuit = $request->cuit;
            $request->cuit = str_replace("-", "", $request->cuit);
            $request->cuit = $request->cuit[0].$request->cuit[1].'-'.$request->cuit[2].$request->cuit[3].$request->cuit[4].$request->cuit[5].$request->cuit[6].$request->cuit[7].$request->cuit[8].$request->cuit[9].'-'.$request->cuit[10];



            /*if($request->cuit == $c){

                $v++;
            }
            if($request->cuit == $request->cuit2){

                $v++;
            }
            if($request->cuit == $request->cuit3){

                $v++;
            }


            if($v == 0){

                Alert::error('ERROR: La Guía solo puede ser generada por alguna de las partes intervinientes en la operación')->persistent('Aceptar');
                return view('blank');
            }*/


            

            $form = new Form;

            //$form->id = $request->id;

            $form->tipo = $request->tipo;


            $form->cuit = $request->cuit;
            $form->rs = $request->rs;     


            if($request->tipo != 'Remate'){

                $form->cuit1 = $request->cuit1;
        
            }else{

                $form->cuit1 = $request->c;

            }

            $form->rs1 = $request->rs1;
            $form->l1 = $request->l1;
            $form->cp1 = $request->cp1;
            $form->df1 = $request->df1;
    


            $form->intermediario = $request->intermediario;

            $form->cuit2 = $request->cuit2;
            $form->rs2 = $request->rs2;
            $form->l2 = $request->l2;
            $form->cp2 = $request->cp2;
            $form->df2 = $request->df2;

            $comi = str_replace('.', '', $request->comi);
            $comi = str_replace(',', '.', $comi);

            $form->comi = $comi;

            $form->origen_estable = $request->origen_estable;
            $form->origen_domi = $request->origen_domi;
            if($request->origen_l == 'Otros'){

                $form->origen_l = $request->origen_l_text;
                
            }else{

                $form->origen_l = $request->origen_l;   

            }

            
            $form->final_p = $request->final_p;
            $form->final_estable = $request->final_estable;
            $form->final_domi = $request->final_domi;
            $form->final_l = $request->final_l;

            $form->cuit3 = $request->cuit3;
            $form->rs3 = $request->rs3;
            $form->l3 = $request->l3;            
            $form->cp3 = $request->cp3;
            $form->df3 = $request->df3;

            $form->cuit4 = $request->cuit4;
            $form->rs4 = $request->rs4;
            $form->d4 = $request->d4;
            $form->p4 = $request->p4;
            $form->cuitc4 = $request->cuitc4;
            $form->nombre4 = $request->nombre4;

            $form->r1 = $request->total_p;
            $form->r2 = $request->total_c;
            $form->r3 = $request->total_i;
            $form->r4 = $request->totaltrs;
            $form->r5 = $request->total; 


            $form->payment = $request->payment;

            if(!empty($request->receptoria)){

                $form->receptoria = $request->receptoria; 

            }else{

                $form->receptoria = 0;
                //$form->estatus == 'Pagado';

            }


            $form->nrot_trs = $request->nrot_trs;
            $form->nrot_iibb = $request->nrot_iibb;


            $form->save();

            $form_id = $form->id;


        }
        catch (\Illuminate\Database\QueryException $e){
            if($e){

                $cuit = str_replace("-", "", $request->cuit);

                Alert::error('La Guía no ha podido ser guardado!.', 'Error!');
                return redirect('/form'.'/'.$cuit);
            }
        }






              // PROOFS

            for($i = 1; $i <= 100 ; $i++){
                    
                $c1 = 'proof'.$i.'c1';
                $c2 = 'proof'.$i.'c2';
                $c3 = 'proof'.$i.'c3';
                $c4 = 'proof'.$i.'c4';


                if(!empty($request->$c1)){

                    $proof = new Proof;

                    $proof->tipo = $request->$c1;
                    $proof->nro = $request->$c2;
                    $proof->fecha = $request->$c3;

                    if($request->$c1 == 'OTROS'){

                        $proof->name = $request->$c4;
                        $files = $request->file('file');
                        
                        $destinationPath = 'uploads/'.$form_id;
                        $extension = $files[$i]->getClientOriginalExtension();
                        $filename = 'Guia:'.$form_id.'-'.$proof->name.'-'.$i.'.'.$extension;
                        $upload_success = $files[$i]->move($destinationPath, $filename);

                        $proof->file = $destinationPath.'/'.$filename;

                    }


                    $proof->form_id = $form_id;

                    $proof->save();



                }



            }




              // PRODUCTS

            for($i = 1; $i <= 100 ; $i++){
                    
                $c1 = 'pro'.$i.'c1';
                $c2 = 'pro'.$i.'c2';
                $c3 = 'pro'.$i.'c3';
                $c4 = 'pro'.$i.'c4';
                $c5 = 'pro'.$i.'c5';
                $c6 = 'pro'.$i.'c6';
                $c7 = 'pro'.$i.'c7';
                $c8 = 'pro'.$i.'c8';
                $c9 = 'pro'.$i.'c9';
                $c10 = 'pro'.$i.'c10';
                $c11 = 'pro'.$i.'c11';
                $c12 = 'pro'.$i.'c12';


                if(!empty($request->$c1)){

                    $product = new Product;

                    $product->c1 = $request->$c1;
                    $product->c2 = $request->$c2;
                    $product->c3 = $request->$c3;
                    $product->c4 = $request->$c4;

                    $c5 = str_replace('.', '', $request->$c5);
                    $c5 = str_replace(',', '.', $c5);

                    $product->c5 = $c5;
                    $product->c6 = $request->$c6;
                    $product->c7 = $request->$c7;
                    $product->c8 = $request->$c8;
                    $product->c9 = $request->$c9;
                    $product->c10 = $request->$c10;
                    $product->c11 = $request->$c11;
                    $product->c12 = $request->$c12;


                    $product->form_id = $form_id;

                    $product->save();



                }



            }







            $n = $form_id+6000;

            $idencode = base64_encode($form_id.'-print-'.$form_id);

            $url = url('/forms'.'/print'.'/'.$idencode);

            if($form->receptoria == 0){

                $receptoria = 'HomeBanking';
                
            }else{

                $receptoria = Receptoria::where('id', '=' ,$form->receptoria)->first();
                $receptoria = $receptoria->localidad.' - '. $receptoria->n;

            }




            

            if($form->payment == 'Pago En Receptoria'){


                $idencode = base64_encode($form_id.'-acuse-'.$form_id);


                $url = url('/forms'.'/acuse'.'/'.$idencode);

                /*Alert::success('Su guía se confeccionó correctamente!<br> GUÍA ELECTRÓNICA Nº: '.$n.'<br><a href="'.$url.'">Clic Aquí para imprimir su acuse de recibo.</a><br> ESTA GUÍA SOLO ES VÁLIDA SI ESTA ACOMPAÑADO POR LA CONSTANCIA DE PAGO EMITIDA POR LA RECEPTORÍA: '.$receptoria)->html()->persistent('Aceptar');*/

                Alert::success('Su guía se confeccionó correctamente!<br> GUÍA ELECTRÓNICA Nº: '.$n.'<br><a href="'.$url.'">Clic Aquí para imprimir su acuse de recibo.</a><br> ESTA GUÍA SOLO ES VÁLIDA SI ESTA ACOMPAÑADO POR LA CONSTANCIA DE PAGO EMITIDA POR LA RECEPTORÍA: '.$receptoria.'<br><br><a class="btn btn-info btn-lg" href="'.$url.'">Aceptar</a>')->html()->autoclose(9999999);


                $cuit = str_replace("-", "", $request->cuit);

                //return redirect('/contribuyente'.'/'.$cuit);
                return view('blank2');


            }
            if($form->payment == 'Pago Electrónico'){

                Alert::success('Su guía se confeccionó correctamente!<br> GUÍA ELECTRÓNICA Nº: '.$n.'<br><a href="'.$url.'">Clic Aquí para imprimirla.</a><br> ESTA GUÍA SOLO ES VÁLIDA SI ESTA ACOMPAÑADO POR EL COMPROBANTE DE PAGO ELECTRÓNICO EMITIDA  POR LA ENTIDAD BANCARIA.<br><br><a class="btn btn-info btn-lg" href="'.$url.'">Aceptar</a>')->html()->autoclose(9999999);

                //return view('blank');
                return view('blank2');

            }

            Alert::success('Su guía se confeccionó correctamente!<br> GUÍA ELECTRÓNICA Nº: '.$n.'<br><a href="'.$url.'">Clic Aquí para imprimirla.</a><br><br><a class="btn btn-info btn-lg" href="'.$url.'">Aceptar</a>')->html()->autoclose(9999999);

            //return view('blank');
            return view('blank2');

            
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {




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

        $form = Form::find($id);
        Form::destroy($id);

        Alert::success('Formulario eliminado satisfactoriamente!.', 'Éxito!');
        return redirect('/forms');


    }




    public function download($id)
    {


        $id = base64_decode($id);

        $array = explode("-", $id);

        $id = $array[0];


        $form = Form::find($id);
        $proofs = Proof::where('form_id', '=' ,$id)->get();
        $products = Product::where('form_id', '=' ,$id)->get();

        $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12"))->where('form_id', '=' ,$id)->get();

        if($form->receptoria == 0){
            $receptoria = 'HomeBanking';

        }else{
            $receptoria = Receptoria::find($form->receptoria);
        
            $receptoria = $receptoria->localidad.' - '.$receptoria->n;
        }

        $userid = session()->get('guiasid');
        $type = session()->get('guiastype');

        if($type == 'Ruta'){

            $log = new Log;
            $log->user_id = $userid;
            $log->comment = 'No';
            $log->form_id = $id;
            $log->save();

        }


        $date = date('d / m /Y', strtotime($form->created_at));
        $generada = date('d/m/Y', strtotime($form->created_at));
        $generadaf = date('d-m-Y', strtotime($form->created_at));

        $fecha = new DateTime($generadaf);
        $fecha->add(new DateInterval('P10D'));

        $vencimiento = $fecha->format('d/m/Y') ;

        $pdf = PDF::loadView('form_print', compact('form', 'proofs','products', 'date', 'receptoria', 'generada', 'vencimiento'))->setPaper(array(0, 0, 612.00, 1200.00));
        return $pdf->stream('formulario.pdf');


        //->setPaper(array(0, 0, 612.00, 1200.00));
        //->setPaper('a4');
    }


    public function confirmpay($id)
    {
        $id_cod = $id;
        $id = base64_decode($id);
        $array = explode("-", $id);
        $id = $array[0];
        $form = Form::where('id', '=', $id)->where('estatus', 'NOT LIKE', '%Pagado%')->where('estatus', 'NOT LIKE', '%Vencido%')->count();

  
        if($form > 0){

            $form = Form::find($id);

            $form->estatus = 'Pagado';
            $form->save();

            return redirect('/forms/cons'.'/'.$id_cod);

        }else{

            Alert::error('La guía esta vencida o ya fue confirmado anteriormente el pago!.', 'Error!')->persistent("Cerrar");
            return redirect('/forms');

        }

    }



    public function constancia($id)
    {

        $id = base64_decode($id);
        $array = explode("-", $id);
        $id = $array[0];
        $form = Form::find($id);


        $forms = Form::where('estatus', 'LIKE', '%Pagado%')->where('receptoria', '=', $form->receptoria)->orderBy('updated_at')->get();
        $i = 1;
        $nc = 1;

        foreach($forms as $f){

            if($id == $f->id){

                $nc = $i; break;
            }
            $i++;
        }

        $nc = str_pad($nc, 8, "0", STR_PAD_LEFT);

        $rn = 0;
        if($form->receptoria == 0){
            $receptoria = 'HomeBanking';

        }else{
            $receptoria = Receptoria::find($form->receptoria);
            $rn = str_pad($receptoria->n, 4, "0", STR_PAD_LEFT);
            $receptoria = $receptoria->localidad.' - '.$receptoria->n;
        }


        $emision = date('d / m / Y', strtotime($form->created_at));

        $date = date("d / m / Y");

        $venci = $form->created_at;
        $venci->add(new DateInterval('P10D'));
        $venci = date('d / m / Y', strtotime($venci));


        //return view('cons_print', compact('form', 'p1', 'p2', 'date', 'calle', 'nro', 'barrio', 'desde', 'hasta', 'emision' ));

        $pdf = PDF::loadView('cons_print', compact('form',  'date', 'emision', 'venci', 'receptoria', 'nc', 'rn' ));
        return $pdf->stream('Comprobante '.$rn.' - '.$nc.'.pdf');

    }


    public function acuse($id)
    {

        $id = base64_decode($id);
        $array = explode("-", $id);
        $id = $array[0];


        $form = Form::find($id);

        if($form->receptoria == 0){
            $receptoria = 'HomeBanking';

        }else{
            $receptoria = Receptoria::find($form->receptoria);
        
            $receptoria = $receptoria->localidad.' - '.$receptoria->n;
        }


        $emision = date('d / m / Y', strtotime($form->created_at));

        $date = date("d / m / Y");

        $venci = $form->created_at;
        $venci->add(new DateInterval('P10D'));
        $venci = date('d / m / Y', strtotime($venci));

        //return view('cons_print', compact('form', 'p1', 'p2', 'date', 'calle', 'nro', 'barrio', 'desde', 'hasta', 'emision' ));

        $pdf = PDF::loadView('acuse', compact('form',  'date', 'emision', 'receptoria', 'venci' ));
        return $pdf->stream('Acuse.pdf');

    }



    public function export()
    {

        $id = session()->get('guiasid');
        $type = session()->get('guiastype');
        $office = session()->get('guiasoffice');

        $receptorias = Receptoria::all();


        return view('form_export_s', compact('id', 'type', 'office', 'receptorias'));

        
    }

    public function export_l(Request $request)
    {


        $desde = $request->c1;
        $hasta = $request->c2;

        $office = $request->c3;



        $data = array('desde' => $desde, 'hasta' => $hasta);

        if($office == 'TODAS LAS RECEPTORÍAS'){

            $forms = DB::table('forms')->select(DB::raw(" id, rs, tipo, origen_l, final_p, cuit1, cuit2, cuit3, cuit4, r5, receptoria,(SELECT localidad FROM receptorias WHERE forms.receptoria = receptorias.id) AS dptooffice, (SELECT n FROM receptorias WHERE forms.receptoria = receptorias.id) AS domioffice, cuit, created_at, estatus, resolucion, updated_at"))->whereBetween('created_at', [$desde, $hasta])->orderBy('id', 'desc')->get();


        }else{


            $forms = DB::table('forms')->select(DB::raw(" id, rs, tipo, origen_l, final_p, cuit1, cuit2, cuit3, cuit4, r5, receptoria,(SELECT localidad FROM receptorias WHERE forms.receptoria = receptorias.id) AS dptooffice, (SELECT n FROM receptorias WHERE forms.receptoria = receptorias.id) AS domioffice, cuit, created_at, estatus, resolucion, updated_at"))->whereBetween('created_at', [$desde, $hasta])->where('receptoria','=',$office)->orderBy('id', 'desc')->get();


        }




        $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id"))->get();


        $id = session()->get('guiasid');
        $type = session()->get('guiastype');
        $office = session()->get('guiasoffice');

        return view('form_export', compact('forms', 'users', 'id', 'type', 'office', 'data', 'products'));

        
    }





    public function query($cuit)
    {

        $lcuit = strlen($cuit);

        if($lcuit == 11){

            $cuit = $cuit[0].$cuit[1].'-'.$cuit[2].$cuit[3].$cuit[4].$cuit[5].$cuit[6].$cuit[7].$cuit[8].$cuit[9].'-'.$cuit[10];

        }else{

            Alert::error('Cuit no encontrado!.', 'Error!');
            return view('blank');


        }


        
        $forms = DB::table('forms')->select(DB::raw(" id, rs, tipo, origen_l, final_p, cuit1, cuit2, cuit3, cuit4, r5, receptoria, (SELECT localidad FROM receptorias WHERE forms.receptoria = receptorias.id) AS dptooffice, (SELECT n FROM receptorias WHERE forms.receptoria = receptorias.id) AS domioffice, cuit, created_at, estatus, resolucion, updated_at"))->orderBy('updated_at')->where('estatus', 'NOT LIKE', '%Vencido%')->where('cuit', '=', $cuit)->get();

        foreach($forms as $form){


            $generadaf = date('d-m-Y', strtotime($form->created_at));

            $fecha = new DateTime($generadaf);
            $fecha->add(new DateInterval('P10D'));

            $vencimiento = strtotime($fecha->format('d-m-Y')) ;

            $fechaa = strtotime(date('d-m-Y'));


            if($fechaa > $vencimiento AND ($form->estatus != 'Vencido' OR $form->estatus != 'Pagado - Vencido')){
                $f = Form::find($form->id);
                if($f->estatus == 'Pagado'){

                    $f->timestamps = false;
                    $f->estatus = 'Pagado - Vencido';
                    $f->save();
                }



                if($f->estatus != 'Pagado' AND $f->estatus != 'Pagado - Vencido'){

                    $f->timestamps = false;
                    $f->estatus = 'Vencido';
                    $f->save();
                }

                $log = Log::where('form_id', '=', $form->id)->first();
                    
                if(!empty($log)){
                    $logf = date('d-m-Y', strtotime($log->created_at));
                        
                    $logf = new DateTime($logf);
                    $logf->add(new DateInterval('P1D'));
                            
                    $logfp = strtotime($logf->format('d-m-Y')) ;

                    if($fechaa >$logfp){
                        $f->timestamps = false;
                        if($f->estatus == 'Pagado'){
                            $f->estatus = 'Pagado - Vencido';
                        }else{
                            $f->estatus = 'Vencido';
                        }
                        $f->save();
                    }

                }

            }  
                

        }

        $forms = DB::table('forms')->select(DB::raw(" id, rs, tipo, origen_l, final_p, cuit1, cuit2, cuit3, cuit4, r5, receptoria, (SELECT localidad FROM receptorias WHERE forms.receptoria = receptorias.id) AS dptooffice, (SELECT n FROM receptorias WHERE forms.receptoria = receptorias.id) AS domioffice, cuit, created_at, estatus, resolucion, updated_at"))->where('cuit', '=', $cuit)->where('estatus', 'like', 'Pagado%')->orderBy('id', 'desc')->get();

        $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id"))->get();



        return view('query', compact('forms', 'id', 'type', 'office', 'receptoria', 'products'));


    }








    


    public function QueryCuit($cuit){



        $url = 'http://test.dgrsantiago.gob.ar/pruebaws/index.php?cuit='.$cuit;
        //$cont = file_get_contents($url);

        $ch = curl_init();
 
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
     
        $cont = curl_exec($ch);
        curl_close($ch);


        $cuit = rtrim(ltrim($cuit));
        //obtener cuit


        //obtener domicilio 1
        $c = '[domicilioCont] =>';
        $cor = '[n';

        $pos1 = strpos($cont, $c);
        $pos1 = $pos1+18;
        $pos2 = strpos($cont, $cor);
        $pos2 = $pos2;
        $contlen = strlen($cont);
        $co = $contlen-$pos2;
        $co = $co-($co*2);

        $d1 = rtrim(ltrim(substr($cont, $pos1, $co)));
        //obtener domicilio 1

        //obtener domicilio 2
        $c = '[nrocalledomicilio] =>';
        $cor = '[b';

        $pos1 = strpos($cont, $c);
        $pos1 = $pos1+22;
        $pos2 = strpos($cont, $cor);
        $pos2 = $pos2;
        $contlen = strlen($cont);
        $co = $contlen-$pos2;
        $co = $co-($co*2);

        $d2 = ' Nro: '.rtrim(ltrim(substr($cont, $pos1, $co)));
        //obtener domicilio 2

        //obtener domicilio 3
        $c = '[nrocalledomicilio] =>';
        $cor = '[b';

        $pos1 = strpos($cont, $c);
        $pos1 = $pos1+22;
        $pos2 = strpos($cont, $cor);
        $pos2 = $pos2;
        $contlen = strlen($cont);
        $co = $contlen-$pos2;
        $co = $co-($co*2);

        $d3 = ' Barrio: '.rtrim(ltrim(substr($cont, $pos1, $co)));
        //obtener domicilio 3

        //obtener domicilio 4
        $c = '[Provincia] =>';
        $cor = '[L';

        $pos1 = strpos($cont, $c);
        $pos1 = $pos1+14;
        $pos2 = strpos($cont, $cor);
        $pos2 = $pos2;
        $contlen = strlen($cont);
        $co = $contlen-$pos2;
        $co = $co-($co*2);

        $d4 = ' Provincia: '.rtrim(ltrim(substr($cont, $pos1, $co)));
        //obtener domicilio 4

        //obtener domicilio
        $df = $d1.$d2.$d3.$d4;
        //obtener domicilio

        //obtener razon social
        $c = '[denominacion] =>';
        $cor = '[f';

        $pos1 = strpos($cont, $c);
        $pos1 = $pos1+17;
        $pos2 = strpos($cont, $cor);
        $pos2 = $pos2;
        $contlen = strlen($cont);
        $co = $contlen-$pos2;
        $co = $co-($co*2);

        $rs = rtrim(ltrim(substr($cont, $pos1, $co)));
        //obtener razon social

        //obtener localidad
        $c = '[Localidad] =>';
        $cor = '[D';

        $pos1 = strpos($cont, $c);
        $pos1 = $pos1+14;
        $pos2 = strpos($cont, $cor);
        $pos2 = $pos2;
        $contlen = strlen($cont);
        $co = $contlen-$pos2;
        $co = $co-($co*2);

        $l = rtrim(ltrim(substr($cont, $pos1, $co)));
        //obtener localidad

        //obtener codigo postal
        $c = '[codigopostal] =>';
        $cor = '[R';

        $pos1 = strpos($cont, $c);
        $pos1 = $pos1+17;
        $pos2 = strpos($cont, $cor);
        $pos2 = $pos2;
        $contlen = strlen($cont);
        $co = $contlen-$pos2;
        $co = $co-($co*2);

        $cp = rtrim(ltrim(substr($cont, $pos1, $co)));
        //obtener codigo postal


        $datos = array('cuit' => $cuit, 'rs' => $rs, 'localidad' => $l, 'codigopostal' => $cp, 'df' => $df);



        return $datos;


    }






    public function generar_vep($guia, $cuit, $importetrs, $importeiibb){


        //$importetrs = $request->totaltrs;

        $importetrs = number_format($importetrs, 2, '', '');
        
        $importetrs = '000000000000'.$importetrs;
        
        $c = strlen($importetrs);
        
        
        for($x=$c;$x > 12;$x--){
            
            $importetrs = substr($importetrs,1);
            
        }


        //$importeiibb = $request->total_p+$request->total_c;

        $importeiibb = number_format($importeiibb, 2, '', '');
        
        $importeiibb = '000000000000'.$importeiibb;
        
        $c = strlen($importeiibb);
        
        
        for($x=$c;$x > 12;$x--){
            
            $importeiibb = substr($importeiibb,1);
            
        }



        $generadaf = date('d-m-Y');

        $fecha = new DateTime($generadaf);
        $fecha->add(new DateInterval('P10D'));

        $vencimiento = $fecha->format('ymd');

        $periodo = date('my');

        $periodo = '00000'.$periodo;
        
        $pc = strlen($periodo);
        
        
        for($x=$pc;$x > 5;$x--){
            
            $periodo = substr($periodo,1);
            
        }



        $guiam = '0000000'.$guia;

        $c = strlen($guiam);

        for($x=$c;$x > 11;$x--){
            
            $guiam = substr($guiam,1);
            
        }


        $discrecional1 = '80442801'.$guiam;
        $discrecional2 = '80442701'.$guiam;


        for($j=1; $j < 3; $j++){

            if($j == 1){

                $cadena = $discrecional1;

            }else{

                $cadena = $discrecional2;
            }
            

            $largo = strlen($cadena);
            $cadena = substr($cadena, 1, $largo);
            $cadena = str_replace($cadena, ' ', '0');

            $suma = 0;
            $por = 1;

            for($i=$largo;$i >= 1; $i--){

                $suma = $suma + (intval(substr($cadena, $i, 1)) * $por);
                $por = $por+1;

            }

            $x2 = 11-($suma-(intval($suma/11))*11);

            if($x2 == 10 OR $x2 == 11){

                $x2 = 0;

            }
            

            if($j == 1){

                $dv1 = $x2;

            }else{

                $dv2 = $x2;
            }


        }


        $discrecional1 = $discrecional1.'0000'.$dv1.'000000000000000';
        $discrecional2 = $discrecional2.'0000'.$dv2.'000000000000000';


        for($j=1; $j < 3; $j++){

            if($j == 1){

                $cadena = $discrecional1;

            }else{

                $cadena = $discrecional2;
            }
            

            $largo = strlen($cadena);
            $cadena = substr($cadena, 1, $largo);
            $cadena = str_replace($cadena, ' ', '0');

            $suma = 0;
            $por = 1;

            for($i=$largo;$i >= 1; $i--){

                $suma = $suma + (intval(substr($cadena, $i, 1)) * $por);
                $por = $por+1;

            }

            $x2 = 11-($suma-(intval($suma/11))*11);



            if($x2 == 10 OR $x2 == 11){

                $x2 = 0;

            }
            

            if($j == 1){

                $dv1 = $x2;

            }else{

                $dv2 = $x2;
            }


        }



        $discrecional1 = $discrecional1.$dv1;
        $discrecional2 = $discrecional2.$dv2;


        $ws1 = 1;
        $ws2 = 1;



        try{
            //$wsdl="http://dfe.dgrsantiago.gob.ar:8081/webserviceslink/wslinkobj?wsdl"; // Testing
            $wsdl="http://dfe.dgrsantiago.gob.ar:8084/webserviceslinkproduccion/wslinkobj?wsdl"; // Produccion
            $cliente= new SoapClient($wsdl);
        }catch(Throwable $e){
            Alert::error('No se ha podido generar la solicitud de pago (Servicio inactivo), intente nuevamente mas tarde!.', 'Error!')->persistent('Aceptar');
            return view('blank2');
        }


        if($importetrs > 0){

            $parametros=array("idDeuda"=>'0'.$guia,
            "usuario"=> $cuit,
            "concepto"=> '028',
            "discrecional"=> $discrecional1,
            "fechavencimiento"=>$vencimiento,
            "importe"=> $importetrs,
            "requerimiento"=> $guia,
            "periodo"=> $periodo,
            "tipodepago"=>"GUIA ELECTRÓNICA",
            "descripciondeuda"=>"PAGO GUIA ELECTRONICA",
            "user"=>"sistemas",
            "pass"=>"dsa#!#5654(&/(4$"
            );
            $res=$cliente->__soapCall("altadeudalink", array("altadeudalink"=>$parametros ));
        
            /*print $res->return->codigoResultadoAlta;
            print "<br>";
            print $res->return->descripcionResultadoAlta;
            print "<br>";*/


            if($res->return->codigoResultadoAlta == 00){
                $ws1 = 1;

            }else{

                $ws1 = 0;
            }

        }

        if($importeiibb > 0){

            $parametros=array("idDeuda"=>'0'.$guia,
            "usuario"=> $cuit,
            "concepto"=> '027',
            "discrecional"=> $discrecional2,
            "fechavencimiento"=>$vencimiento,
            "importe"=> $importeiibb,
            "requerimiento"=> $guia,
            "periodo"=> $periodo,
            "tipodepago"=>"GUIA ELECTRÓNICA",
            "descripciondeuda"=>"PAGO GUIA ELECTRONICA",
            "user"=>"sistemas",
            "pass"=>"dsa#!#5654(&/(4$"
            );
            $res=$cliente->__soapCall("altadeudalink", array("altadeudalink"=>$parametros ));

        
            /*print $res->return->codigoResultadoAlta;
            print "<br>";
            print $res->return->descripcionResultadoAlta;
            print "<br>";*/


            if($res->return->codigoResultadoAlta == 00){
                $ws2 = 1;

            }else{

                $ws2 = 0;
            }
            


        }




        if($ws1 == 1 AND $ws2 == 1){


            Alert::message('<img src="'.asset('images/logos.png').'" style="margin-top: 0px;"> Se ha generado correctamente la solicitud del pago, ingrese a su cuenta bancaria para pagar el/los importe correspondiente.<br><br> GUÍA ELECTRÓNICA: '.$guia.'<br> CÓDIGO DE PAGO LINK: '.$cuit)->html()->persistent('Aceptar');
            return view('blank2');




        }else{

            Alert::error('No se ha podido generar la solicitud de pago, intente nuevamente mas tarde!.', 'Error!')->persistent('Aceptar');
            return view('blank2');

        }












    }





}
