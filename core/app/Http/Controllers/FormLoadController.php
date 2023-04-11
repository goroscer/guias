<?php

namespace App\Http\Controllers;

use App\User as User;
use App\UserType as UserType;

use App\Number as Number;


use App\Form as Form;
use App\Archive as Archive;
use App\Receptoria as Receptoria;
use App\Log as Log;

use App\Office as Office;
use App\Proof as Proof;




use Alert;
use PDF;
use ZipArchive;
use Response;
use SoapClient;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormLoadController extends Controller
{

    public function formsrecords(Request $request)
    {

        $id = session()->get('guiasid');
        $type = session()->get('guiastype');
        $office = session()->get('guiasoffice');
        $rarray = array();
        $plarray = array();
        $idarray = array();
        $columns = array( 
                            0 =>'id',
                            1 =>'created_at',
                            2 =>'tipo',
                            3 =>'origen_l',
                            4 =>'final_p',
                            5 =>'cuit',
                            6 =>'rs',
                            7 =>'cuit1',
                            8 =>'cuit2',
                            9 =>'cuit3',
                            10 =>'cuit4',
                            11 =>'r5',
                            12 =>'r5',
                            13 =>'r5',
                            14 =>'r5',
                            15 =>'estatus',
                            15 =>'estatus',
                            15 =>'estatus',
                            16 =>'updated_at',
                            17 =>'estatus',
                            18 =>'receptoria',
                            19 =>'estatus',


                        );


        $totalData = Form::count();
        $totalFiltered = $totalData; 

        if($request->input('length') == -1){

            $limit = $totalData;
        }else{

            $limit = $request->input('length');

        }
        
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value'))){


             $forms = Form::offset($start)
                     ->limit($limit)
                     ->orderBy($order,$dir) 
                     -> get();
    
    
                    $totalFiltered = Form::count();



        }else{

            $search = $request->input('search.value'); 


            $receps = Receptoria::where('localidad','LIKE',"%{$search}%")->get();
            foreach($receps as $r){
                $rarray[] = $r->id;
            }

            $products = DB::table('products')->select(DB::raw("c2, (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS name,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id "))->leftJoin('product_lists', 'products.c2', '=', 'product_lists.id')->where('name','LIKE',"%{$search}%")->get();


            foreach($products as $p){

                $plarray[] = $p->form_id;
            }

            $ids = Form::orWhereIn('id', $plarray)->get();
            foreach($ids as $id){
                $idarray[] = $id->id;
            }


                    $forms = Form::orWhereRaw("id+6000 LIKE ?", "%{$search}%")
                            ->orWhere('created_at', 'LIKE',"%{$search}%")
                            ->orWhere('tipo', 'LIKE',"%{$search}%")
                            ->orWhere('origen_l', 'LIKE',"%{$search}%")
                            ->orWhere('final_p', 'LIKE',"%{$search}%")
                            ->orWhere('cuit', 'LIKE',"%{$search}%")
                            ->orWhere('rs', 'LIKE',"%{$search}%")
                            ->orWhere('cuit1', 'LIKE',"%{$search}%")
                            ->orWhere('cuit2', 'LIKE',"%{$search}%")
                            ->orWhere('cuit3', 'LIKE',"%{$search}%")
                            ->orWhere('cuit4', 'LIKE',"%{$search}%")
                            ->orWhere('r5', 'LIKE',"%{$search}%")
                            ->orWhere('receptoria', 'LIKE',"%{$search}%")
                            ->orWhere('estatus', 'LIKE',"%{$search}%")
                            ->orWhere('updated_at', 'LIKE',"%{$search}%")
                            ->orWhereIn('receptoria', $rarray)
                            ->orWhereIn('id', $idarray)
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();



                    $totalFiltered = Form::orWhereRaw("id+6000 LIKE ?", "%{$search}%")
                                        ->orWhere('created_at', 'LIKE',"%{$search}%")
                                        ->orWhere('tipo', 'LIKE',"%{$search}%")
                                        ->orWhere('origen_l', 'LIKE',"%{$search}%")
                                        ->orWhere('final_p', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit', 'LIKE',"%{$search}%")
                                        ->orWhere('rs', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit1', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit2', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit3', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit4', 'LIKE',"%{$search}%")
                                        ->orWhere('r5', 'LIKE',"%{$search}%")
                                        ->orWhere('receptoria', 'LIKE',"%{$search}%")
                                        ->orWhere('estatus', 'LIKE',"%{$search}%")
                                        ->orWhere('updated_at', 'LIKE',"%{$search}%")
                                        ->orWhereIn('receptoria', $rarray)
                                        ->orWhereIn('id', $idarray)
                                        ->count();


            }



        $data = array();

        if(!empty($forms)){

            foreach ($forms as $form){

                if($form->receptoria == 0){

                    if($form->estatus != 'Estado Automatico'){
                    
                        $f = Form::find($form->id);
                        $f->timestamps = false;
                        $f->estatus = 'Estado Automatico';
                        $f->save();

                    }
                }

            }


            foreach ($forms as $form){

                $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id "))->where('form_id','=', $form->id)->get();
              
                $proofs = Proof::where('form_id', '=' , $form->id)->get();

				$log = url('log').'/'.base64_encode($form->id.'-log-'.$form->id);
                $cons = url('forms/cons').'/'.base64_encode($form->id.'-cons-'.$form->id);
                $print = url('forms/print').'/'.base64_encode($form->id.'-print-'.$form->id);
                $zip =  url('forms/zip').'/'. base64_encode($form->id.'-zip-'.$form->id);


                $proof = Proof::whereNotNull('file')->where('form_id', '=' , $form->id)->count();


                if( $form->created_at == $form->updated_at){

                    $mod = '';

                }else{

                    $mod = $form->updated_at;
                }


                if($form->receptoria == 0){

                    if($form->estatus != 'Estado Automatico'){
                    
                        $f = Form::find($form->id);
                        $f->timestamps = false;
                        $f->estatus = 'Estado Automatico';
                        $f->save();

                    }


                    $r = 'RENTAS';
                }else{

                    $recep = Receptoria::where('id', '=' , $form->receptoria)->first();

                    $r = $recep->localidad.' - '.$recep->n;

                }


                $nestedData['id'] = $form->id+6000;
                $nestedData['created_at'] = date('d/m/Y h:i a',strtotime($form->created_at));

                $nestedData['tipo'] = $form->tipo;
                $nestedData['origen_l'] = $form->origen_l;
                $nestedData['final_p'] = $form->final_p;

                $nestedData['cuit'] = $form->cuit;
                $nestedData['rs'] = $form->rs;

                $nestedData['cuit1'] = $form->cuit1;
                if($form->intermediario != 'No'){ 
                    $nestedData['cuit2'] = $form->cuit2;
                 }else{ $nestedData['cuit2'] = 'SIN DATOS'; };
                
                $nestedData['cuit3'] = $form->cuit3;
                $nestedData['cuit4'] = $form->cuit4;

                $t_cant = '';
                $t_unid = '';
                $t_prod = '';
                foreach($products as $product){ 

                    $t_cant .= $product->c6.'<br>'; 
                    $t_unid .= $product->c3.'<br>';
                    $t_prod .= $product->c2.'<br>';
                
                };

                $nestedData['t_cant'] = $t_cant;
                $nestedData['t_unid'] = $t_unid;
                $nestedData['t_prod'] = $t_prod;

                if($form->r5 >0){ 
                    $nestedData['r5'] = number_format($form->r5, 2, '.', '');
                 }else{ $nestedData['r5'] = '0.00'; };
                

                
                $p_tipo = '';
                $p_numb = '';
                if($proofs){

                    foreach($proofs as $p){ 

                        $p_tipo .= $p->tipo.'<br>'; 
                        $p_numb .= $p->nro.'<br>';
                    
                    };
                }
                $nestedData['p_tipo'] = $p_tipo;
                $nestedData['p_numb'] = $p_numb;


                
                $nestedData['estatus'] = "<code style='color: #2196F3;'>".$form->estatus.'</code>';
                
                $nestedData['updated_at'] = '';
                if($form->estatus == 'Pagado' ){ 
                    $nestedData['updated_at'] .= date('d/m/Y h:i a',strtotime($form->updated_at));
                } 

                

                $nestedData['links'] = '';
                
                if((substr($type, 0, 4) == 'Rece' OR $type == 'Rentas ADM' OR $type == 'WebMaster' OR substr($type, 0, 8) == 'Rentas C') OR $form->payment == 'Pago Electronico'){
                    
                    $nestedData['links'] .= '<button type="button" onclick="window.open(&#39;'.$print.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Descargar PDF" ><i class="ti-file" aria-hidden="true"></i></button>';

                }else{
                    $nestedData['links'] .= 'x ';
                }
                

                if($form->estatus == 'Pagado' OR $form->estatus == 'Pagado - Vencido' AND $form->payment != 'Pago Electronico'){
                    

                    $nestedData['links'] .= ' - <button type="button" onclick="window.open(&#39;'.$cons.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Comprobante de Pago" ><i class="ti-file" aria-hidden="true"></i></button>';

                    
                }else{
                    $nestedData['links'] .= ' - x';
                }
                
                
                if($proof > 0){
                    
                    $nestedData['links'] .= ' - <button type="button" onclick="window.open(&#39;'.$zip.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="DOCUMENTACIÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œN FISCAL PARA CIRCULAR"><i class="ti-zip" aria-hidden="true"></i></button>';
            
                }

                
                $nestedData['receptoria'] = $r;

                $nestedData['actions'] = '';

            	$nestedData['actions'] .= '<button type="button" onclick="window.open(&#39;'.$log.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Log" ><i class="ti-file" aria-hidden="true"></i></button>';

                if(($form->estatus != 'Pagado' AND $form->estatus != 'Pagado - Vencido' AND $form->estatus != 'Vencido') AND $office == $form->receptoria AND substr($type, 0, 4) == 'Rece'){

                    $co = base64_encode($form->id.'-cons-'.$form->id);
                    $importe = $nestedData['r5'];
                    $nguia = $form->id+6000;
                    $nestedData['actions'] .= "&emsp;<a onclick='confirmPay(&#39;$co&#39;,&#39;$importe&#39;,&#39;$nguia&#39;)' title='Pagado' ><span class='ti-credit-card'></span></a>";
                }

                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered),
                    "rarray"            => $rarray,
                    "data"            => $data,
                    
                    );
            
            //dd($json_data);

        //return json_encode($json_data, JSON_UNESCAPED_UNICODE);

                

        return Response::json($json_data);


    }






























































//Registros de expedientes con oficina predeterminada
public function formsrecords_o(Request $request)
{

    $id = session()->get('guiasid');
    $type = session()->get('guiastype');
    $office = session()->get('guiasoffice');
    $plarray = array();
    $idarray = array();
    $columns = array( 
                            0 =>'id',
                            1 =>'created_at',
                            2 =>'tipo',
                            3 =>'origen_l',
                            4 =>'final_p',
                            5 =>'cuit',
                            6 =>'rs',
                            7 =>'cuit1',
                            8 =>'cuit2',
                            9 =>'cuit3',
                            10 =>'cuit4',
                            11 =>'r5',
                            12 =>'r5',
                            13 =>'r5',
                            14 =>'r5',
                            15 =>'estatus',
                            15 =>'estatus',
                            15 =>'estatus',
                            16 =>'updated_at',
                            17 =>'estatus',
                            18 =>'receptoria',
                            19 =>'estatus',


                        );


    $totalData = Form::count();
    $totalFiltered = $totalData; 

    if($request->input('length') == -1){

        $limit = $totalData;
    }else{

        $limit = $request->input('length');

    }
    
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
        
    if(empty($request->input('search.value'))){


         $forms = Form::where('receptoria', '=', $office)
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir) 
                    ->get();


                $totalFiltered = Form::where('receptoria', '=', $office)
                                    ->count();



    }else{

        $search = $request->input('search.value'); 

        $products = DB::table('products')->select(DB::raw("c2, (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS name,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id "))->leftJoin('product_lists', 'products.c2', '=', 'product_lists.id')->where('name','LIKE',"%{$search}%")->get();

        foreach($products as $p){

            $plarray[] = $p->form_id;
        }

        $ids = Form::orWhereIn('id', $plarray)->get();
        foreach($ids as $id){
            $idarray[] = $id->id;
        }


                $forms = Form::where('receptoria', '=', $office)
                                ->where(function ($query) use ($search, $idarray){
                                $query->orWhereRaw("id+6000 LIKE ?", "%{$search}%")
                                ->orWhere('created_at', 'LIKE',"%{$search}%")
                                ->orWhere('tipo', 'LIKE',"%{$search}%")
                                ->orWhere('origen_l', 'LIKE',"%{$search}%")
                                ->orWhere('final_p', 'LIKE',"%{$search}%")
                                ->orWhere('cuit', 'LIKE',"%{$search}%")
                                ->orWhere('rs', 'LIKE',"%{$search}%")
                                ->orWhere('cuit1', 'LIKE',"%{$search}%")
                                ->orWhere('cuit2', 'LIKE',"%{$search}%")
                                ->orWhere('cuit3', 'LIKE',"%{$search}%")
                                ->orWhere('cuit4', 'LIKE',"%{$search}%")
                                ->orWhere('r5', 'LIKE',"%{$search}%")
                                ->orWhere('estatus', 'LIKE',"%{$search}%")
                                ->orWhere('updated_at', 'LIKE',"%{$search}%")
                                ->orWhereIn('id', $idarray);
                                })
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();



                $totalFiltered = Form::where('receptoria', '=', $office)
                                    ->where(function ($query) use ($search, $idarray){
                                        $query->orWhereRaw("id+6000 LIKE ?", "%{$search}%")
                                        ->orWhere('created_at', 'LIKE',"%{$search}%")
                                        ->orWhere('tipo', 'LIKE',"%{$search}%")
                                        ->orWhere('origen_l', 'LIKE',"%{$search}%")
                                        ->orWhere('final_p', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit', 'LIKE',"%{$search}%")
                                        ->orWhere('rs', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit1', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit2', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit3', 'LIKE',"%{$search}%")
                                        ->orWhere('cuit4', 'LIKE',"%{$search}%")
                                        ->orWhere('r5', 'LIKE',"%{$search}%")
                                        ->orWhere('estatus', 'LIKE',"%{$search}%")
                                        ->orWhere('updated_at', 'LIKE',"%{$search}%")
                                        ->orWhereIn('id', $idarray);
                                        })
                                    ->count();


        }



    $data = array();

    if(!empty($forms)){

        foreach ($forms as $form){
            if($form->receptoria == 0){
                if($form->estatus != 'Estado Automatico'){
                
                    $f = Form::find($form->id);
                    $f->timestamps = false;
                    $f->estatus = 'Estado Automatico';
                    $f->save();

                }
            }

        }


        foreach ($forms as $form){

            $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id "))->where('form_id','=', $form->id)->get();
          
            $proofs = Proof::where('form_id', '=' , $form->id)->get();

        	$log = url('log').'/'.base64_encode($form->id.'-log-'.$form->id);
            $cons = url('forms/cons').'/'.base64_encode($form->id.'-cons-'.$form->id);
            $print = url('forms/print').'/'.base64_encode($form->id.'-print-'.$form->id);
            $zip =  url('forms/zip').'/'. base64_encode($form->id.'-zip-'.$form->id);


            $proof = Proof::where('tipo', '=' , 'OTROS')->where('form_id', '=' , $form->id)->count();


            if( $form->created_at == $form->updated_at){

                $mod = '';

            }else{

                $mod = $form->updated_at;
            }


            if($form->receptoria == 0){

                if($form->estatus != 'Estado Automatico'){
                
                    $f = Form::find($form->id);
                    $f->timestamps = false;
                    $f->estatus = 'Estado Automatico';
                    $f->save();

                }


                $r = 'RENTAS';
            }else{

                $recep = Receptoria::where('id', '=' , $form->receptoria)->first();

                $r = $recep->localidad.' - '.$recep->n;

            }


            $nestedData['id'] = $form->id+6000;
            $nestedData['created_at'] = date('d/m/Y h:i a',strtotime($form->created_at));

            $nestedData['tipo'] = $form->tipo;
            $nestedData['origen_l'] = $form->origen_l;
            $nestedData['final_p'] = $form->final_p;

            $nestedData['cuit'] = $form->cuit;
            $nestedData['rs'] = $form->rs;

            $nestedData['cuit1'] = $form->cuit1;
            if($form->intermediario != 'No'){ 
                $nestedData['cuit2'] = $form->cuit2;
             }else{ $nestedData['cuit2'] = 'SIN DATOS'; };
            
            $nestedData['cuit3'] = $form->cuit3;
            $nestedData['cuit4'] = $form->cuit4;

            $t_cant = '';
            $t_unid = '';
            $t_prod = '';
            foreach($products as $product){ 

                $t_cant .= $product->c6.'<br>'; 
                $t_unid .= $product->c3.'<br>';
                $t_prod .= $product->c2.'<br>';
            
            };

            $nestedData['t_cant'] = $t_cant;
            $nestedData['t_unid'] = $t_unid;
            $nestedData['t_prod'] = $t_prod;

            if($form->r5 >0){ 
                $nestedData['r5'] = number_format($form->r5, 2, '.', '');
             }else{ $nestedData['r5'] = '0.00'; };
            

            
            $p_tipo = '';
            $p_numb = '';
            foreach($proofs as $p){ 

                $p_tipo .= $p->tipo.'<br>'; 
                $p_numb .= $p->nro.'<br>';
            
            };
            $nestedData['p_tipo'] = $p_tipo;
            $nestedData['p_numb'] = $p_numb;


            
            $nestedData['estatus'] = "<code style='color: #2196F3;'>".$form->estatus.'</code>';
            
            $nestedData['updated_at'] = '';
            if($form->estatus == 'Pagado' ){ 
                $nestedData['updated_at'] .= date('d/m/Y h:i a',strtotime($form->updated_at));
            } 

            

            $nestedData['links'] = '';
            
            if((substr($type, 0, 4) == 'Rece' OR $type == 'Rentas ADM' OR $type == 'WebMaster' OR substr($type, 0, 8) == 'Rentas C') OR $form->payment == 'Pago Electronico'){
                
                $nestedData['links'] .= '<button type="button" onclick="window.open(&#39;'.$print.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Descargar PDF" ><i class="ti-file" aria-hidden="true"></i></button>';

            }
            

            if($form->estatus == 'Pagado' OR $form->estatus == 'Pagado - Vencido' AND $form->payment != 'Pago Electronico'){
                

                $nestedData['links'] .= ' - <button type="button" onclick="window.open(&#39;'.$cons.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Comprobante de Pago" ><i class="ti-file" aria-hidden="true"></i></button>';

                
            }
            
            
            if($proof > 0){
                
                $nestedData['links'] .= ' - <button type="button" onclick="window.open(&#39;'.$zip.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="DOCUMENTACIÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œN FISCAL PARA CIRCULAR"><i class="ti-zip" aria-hidden="true"></i></button>';
        
            }

            
            $nestedData['receptoria'] = $r;

            $nestedData['actions'] = '';
            
            $nestedData['actions'] .= '<button type="button" onclick="window.open(&#39;'.$log.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Log" ><i class="ti-file" aria-hidden="true"></i></button>';

            if(($form->estatus != 'Pagado' AND $form->estatus != 'Pagado - Vencido' AND $form->estatus != 'Vencido') AND $office == $form->receptoria AND substr($type, 0, 4) == 'Rece'){

                $co = base64_encode($form->id.'-cons-'.$form->id);
                $importe = $nestedData['r5'];
                $nguia = $form->id+6000;
                $nestedData['actions'] .= "&emsp;<a onclick='confirmPay(&#39;$co&#39;,&#39;$importe&#39;,&#39;$nguia&#39;)' title='Pagado' ><span class='ti-credit-card'></span></a>";
            }

            $data[] = $nestedData;

        }
    }
      
    $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered), 
                "data"            => $data   
                );
        
        //dd($json_data);

    //return json_encode($json_data, JSON_UNESCAPED_UNICODE);

            

    return Response::json($json_data);


}






























































//export
public function formsrecords_e(Request $request)
{

    $id = session()->get('guiasid');
    $type = session()->get('guiastype');
    $office = session()->get('guiasoffice');
    $rarray = array();
    $columns = array( 
                            0 =>'id',
                            1 =>'created_at',
                            2 =>'tipo',
                            3 =>'origen_l',
                            4 =>'final_p',
                            5 =>'cuit',
                            6 =>'rs',
                            7 =>'cuit1',
                            8 =>'cuit2',
                            9 =>'cuit3',
                            10 =>'cuit4',
                            11 =>'r5',
                            12 =>'r5',
                            13 =>'r5',
                            14 =>'r5',
                            15 =>'estatus',
                            15 =>'estatus',
                            15 =>'estatus',
                            16 =>'updated_at',
                            17 =>'estatus',
                            18 =>'receptoria',
                            19 =>'estatus',


                        );


    $totalData = Form::count();
    $totalFiltered = $totalData; 

    if($request->input('length') == -1){

        $limit = $totalData;
    }else{

        $limit = $request->input('length');

    }
    
    $desde = $request->input('desde');
    $hasta = $request->input('hasta');
    $recep = $request->input('recep');
    $status = $request->input('status');

    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
        

    if($recep == 'TODAS LAS RECEPTORIAS'){

        if($status == 'Todos'){

            $forms = Form::whereBetween('created_at', [$desde, $hasta])
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir) 
                    ->get();



            $totalFiltered = Form::whereBetween('created_at', [$desde, $hasta])->count();

        }else{

            $forms = Form::whereBetween('created_at', [$desde, $hasta])
                    ->where('estatus', 'LIKE',"%{$status}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir) 
                    ->get();

            $totalFiltered = Form::whereBetween('created_at', [$desde, $hasta])
                                    ->where('estatus', 'LIKE',"%{$status}%")
                                    ->count();


        }

    }else{


        if($status == 'Todos'){

            $forms = Form::whereBetween('created_at', [$desde, $hasta])
                        ->where('receptoria','=',$recep)
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir) 
                        ->get();


            $totalFiltered = Form::whereBetween('created_at', [$desde, $hasta])
                                ->where('receptoria','=',$recep)
                                ->count();

        }else{

            $forms = Form::whereBetween('created_at', [$desde, $hasta])
                        ->where('estatus', 'LIKE',"%{$status}%")
                        ->where('receptoria','=',$recep)
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir) 
                        ->get();


            $totalFiltered = Form::whereBetween('created_at', [$desde, $hasta])
                                ->where('estatus', 'LIKE',"%{$status}%")
                                ->where('receptoria','=',$recep)
                                ->count();


        }



    }



    $data = array();

    if(!empty($forms)){

        foreach ($forms as $form){
            if($form->receptoria == 0){
                if($form->estatus != 'Estado Automatico'){
                
                    $f = Form::find($form->id);
                    $f->timestamps = false;
                    $f->estatus = 'Estado Automatico';
                    $f->save();

                }
            }

        }

        foreach ($forms as $form){

            $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id "))->where('form_id','=', $form->id)->get();
          
            $proofs = Proof::where('form_id', '=' , $form->id)->get();


            $cons = url('forms/cons').'/'.base64_encode($form->id.'-cons-'.$form->id);
            $print = url('forms/print').'/'.base64_encode($form->id.'-print-'.$form->id);
            $zip =  url('forms/zip').'/'. base64_encode($form->id.'-zip-'.$form->id);


            $proof = Proof::where('tipo', '=' , 'OTROS')->where('form_id', '=' , $form->id)->count();


            if( $form->created_at == $form->updated_at){

                $mod = '';

            }else{

                $mod = $form->updated_at;
            }


            if($form->receptoria == 0){

                if($form->estatus != 'Estado Automatico'){
                
                    $f = Form::find($form->id);
                    $f->timestamps = false;
                    $f->estatus = 'Estado Automatico';
                    $f->save();

                }


                $r = 'RENTAS';
            }else{

                $recep = Receptoria::where('id', '=' , $form->receptoria)->first();

                $r = $recep->localidad.' - '.$recep->n;

            }


            $nestedData['id'] = $form->id+6000;
            $nestedData['created_at'] = date('d/m/Y h:i a',strtotime($form->created_at));

            $nestedData['tipo'] = $form->tipo;
            $nestedData['origen_l'] = $form->origen_l;
            $nestedData['final_p'] = $form->final_p;

            $nestedData['cuit'] = $form->cuit;
            $nestedData['rs'] = $form->rs;

            $nestedData['cuit1'] = $form->cuit1;
            if($form->intermediario != 'No'){ 
                $nestedData['cuit2'] = $form->cuit2;
             }else{ $nestedData['cuit2'] = 'SIN DATOS'; };
            
            $nestedData['cuit3'] = $form->cuit3;
            $nestedData['cuit4'] = $form->cuit4;

            $t_cant = '';
            $t_unid = '';
            $t_prod = '';
            foreach($products as $product){ 

                $t_cant .= $product->c6.'<br>'; 
                $t_unid .= $product->c3.'<br>';
                $t_prod .= $product->c2.'<br>';
            
            };

            $nestedData['t_cant'] = $t_cant;
            $nestedData['t_unid'] = $t_unid;
            $nestedData['t_prod'] = $t_prod;

            if($form->r5 >0){ 
                $nestedData['r5'] = number_format($form->r5, 2, '.', '');
             }else{ $nestedData['r5'] = '0.00'; };
            

            
            $p_tipo = '';
            $p_numb = '';
            foreach($proofs as $p){ 

                $p_tipo .= $p->tipo.'<br>'; 
                $p_numb .= $p->nro.'<br>';
            
            };
            $nestedData['p_tipo'] = $p_tipo;
            $nestedData['p_numb'] = $p_numb;


            
            $nestedData['estatus'] = "<code style='color: #2196F3;'>".$form->estatus.'</code>';
            
            $nestedData['updated_at'] = '';
            if($form->estatus == 'Pagado' ){ 
                $nestedData['updated_at'] .= date('d/m/Y h:i a',strtotime($form->updated_at));
            } 

            

            $nestedData['links'] = '';
            
            if((substr($type, 0, 4) == 'Rece' OR $type == 'Rentas ADM' OR $type == 'WebMaster' OR substr($type, 0, 8) == 'Rentas C') OR $form->payment == 'Pago Electronico'){
                
                $nestedData['links'] .= '<button type="button" onclick="window.open(&#39;'.$print.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Descargar PDF" ><i class="ti-file" aria-hidden="true"></i></button>';

            }
            

            if($form->estatus == 'Pagado' OR $form->estatus == 'Pagado - Vencido' AND $form->payment != 'Pago Electronico'){
                

                $nestedData['links'] .= ' - <button type="button" onclick="window.open(&#39;'.$cons.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Comprobante de Pago" ><i class="ti-file" aria-hidden="true"></i></button>';

                
            }
            
            
            if($proof > 0){
                
                $nestedData['links'] .= ' - <button type="button" onclick="window.open(&#39;'.$zip.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="DOCUMENTACIÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œN FISCAL PARA CIRCULAR"><i class="ti-zip" aria-hidden="true"></i></button>';
        
            }

            
            $nestedData['receptoria'] = $r;

            $nestedData['actions'] = '';
            

            if(($form->estatus != 'Pagado' AND $form->estatus != 'Pagado - Vencido' AND $form->estatus != 'Vencido') AND $office == $form->receptoria AND substr($type, 0, 4) == 'Rece'){

                $co = base64_encode($form->id.'-cons-'.$form->id);
                $importe = $nestedData['r5'];
                $nguia = $form->id+6000;
                $nestedData['actions'] .= "&emsp;<a onclick='confirmPay(&#39;$co&#39;,&#39;$importe&#39;,&#39;$nguia&#39;)' title='Pagado' ><span class='ti-credit-card'></span></a>";
            }

            $data[] = $nestedData;

        }
    }
      
    $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered),
                "rarray"            => $rarray,
                "data"            => $data,
                
                );
        
        //dd($json_data);

    //return json_encode($json_data, JSON_UNESCAPED_UNICODE);

            

    return Response::json($json_data);


}












































//query
public function formsrecords_q(Request $request)
{

    $id = session()->get('guiasid');
    $type = session()->get('guiastype');
    $office = session()->get('guiasoffice');
    $rarray = array();
    $columns = array( 
        0 =>'id',
        1 =>'id',
        2 =>'created_at',
        3 =>'r5',
        4 =>'estatus',
        5 =>'tipo',
        6 =>'origen_l',
        7 =>'final_p',
        8 =>'cuit',
        9 =>'rs',
        10 =>'cuit1',
        11 =>'cuit2',
        12 =>'cuit3',
        13 =>'cuit4',
        14 =>'r5',
        15 =>'estatus',
        16 =>'updated_at',
        17 =>'receptoria',

    );


             
    
    $cuit = $request->input('cuit');
    $totalData = Form::where('cuit', '=', $cuit)->count();
    $totalFiltered = $totalData; 

    if($request->input('length') == -1){

        $limit = $totalData;
    }else{

        $limit = $request->input('length');
    }


    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');
        


        $forms = Form::where('cuit', '=', $cuit)->offset($start)
                 ->limit($limit)
                 ->orderBy($order,$dir) 
                 ->get();

        $totalFiltered = Form::where('cuit', '=', $cuit)->count();




    $data = array();

    if(!empty($forms)){

        foreach ($forms as $form){
            if($form->receptoria == 0){
                if($form->estatus != 'Estado Automatico'){
                
                    $f = Form::find($form->id);
                    $f->timestamps = false;
                    $f->estatus = 'Estado Automatico';
                    $f->save();

                }
            }

        }


        foreach ($forms as $form){

            $products = DB::table('products')->select(DB::raw(" (SELECT name FROM categories WHERE products.c1 = categories.id) AS c1, (SELECT name FROM product_lists WHERE products.c2 = product_lists.id) AS c2,  c3, c4, c5, c6, c7, c8, c9, c10, c11, c12, form_id "))->where('form_id','=', $form->id)->get();
          

            $cons = url('forms/cons').'/'.base64_encode($form->id.'-cons-'.$form->id);
            $print = url('forms/print').'/'.base64_encode($form->id.'-print-'.$form->id);
            $zip =  url('forms/zip').'/'. base64_encode($form->id.'-zip-'.$form->id);


            $proofs = Proof::where('tipo', '=' , 'OTROS')->where('form_id', '=' , $form->id)->count();


            if( $form->created_at == $form->updated_at){

                $mod = '';

            }else{

                $mod = $form->updated_at;
            }


            if($form->receptoria == 0){

                $r = 'RENTAS';
            }else{

                $recep = Receptoria::where('id', '=' , $form->receptoria)->first();

                $r = $recep->localidad.' - '.$recep->n;

            }


            $nestedData['id'] = $form->id+6000;
            $nestedData['created_at'] = date('d/m/Y h:i a',strtotime($form->created_at));

            $nestedData['tipo'] = $form->tipo;
            $nestedData['origen_l'] = $form->origen_l;
            $nestedData['final_p'] = $form->final_p;

            $nestedData['cuit'] = $form->cuit;
            $nestedData['rs'] = $form->rs;

            $nestedData['cuit1'] = $form->cuit1;
            if($form->intermediario != 'No'){ 
                $nestedData['cuit2'] = $form->cuit2;
             }else{ $nestedData['cuit2'] = 'SIN DATOS'; };
            
            $nestedData['cuit3'] = $form->cuit3;
            $nestedData['cuit4'] = $form->cuit4;

            $d_trans = '';
            foreach($products as $product){ $d_trans .= $product->c6.'  '.$product->c3.' - '.$product->c2.'<br>'; };

            $nestedData['d_trans'] = $d_trans;

            if($form->r5 >0){ 
                $nestedData['r5'] = number_format($form->r5, 2, ',', '.');
             }else{ $nestedData['r5'] = '0,00'; };
            
             $nestedData['estatus'] = '<code style="color: #2196F3;">'.$form->estatus.'</code>';
                
             $nestedData['updated_at'] = '';
             if($form->estatus == 'Pagado' ){ 
                 $nestedData['updated_at'] .= date('d/m/Y h:i a',strtotime($form->updated_at));
             } 

            $nestedData['links'] = '';

            $nestedData['pay'] = '';

            $trs = $form->r4;
            $iibb = $form->r1+$form->r3;
            $guia = $form->id+6000;
            $tokennro = $request->input('tokennro');
            $add = '/'.$guia.'/'.$tokennro.'/'.$trs.'/'.$iibb;
            $url = url('payment_form').$add;

            if($form->payment == 'Pago Electronico' AND ($form->r1+$form->r3 > 0 OR $form->r4 > 0 ) AND (empty($form->nrot_trs) AND empty($form->nrot_iibb)) AND $form->status != 'Vencido'){
                $nestedData['pay'] .= '<button type="button"  onclick="window.location.href=&#39;'.$url.'&#39;" class="btn btn-success" title="Confirmar" ><i aria-hidden="true">Confirmar</i></button>';
            }
/*             
            if($form->payment == 'Pago Electronico' AND (!empty($form->nrot_trs) OR !empty($form->nrot_iibb))){
                $nestedData['pay'] .= '<button type="button" onclick="window.location.href=&#39;'.$url.'&#39;" class="btn btn-success" style="background-color: #f44336 !important;" title="Rectificar" ><i aria-hidden="true">Rectificar</i></button>';
            }
 */

            if(($form->payment == NULL AND $form->r5 == 0.00) OR ($form->estatus == 'Pagado' OR $form->estatus == 'Pagado - Vencido') OR ($form->payment == 'Pago Electronico' AND (!empty($form->nrot_trs) OR !empty($form->nrot_iibb))) ){
                
                $nestedData['links'] .= '<button type="button" onclick="window.open(&#39;'.$print.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Descargar PDF" ><i class="ti-file" aria-hidden="true"></i></button>';

            }

            if($form->estatus == 'Pagado' OR $form->estatus == 'Pagado - Vencido' AND $form->payment != 'Pago Electronico'){
                

                $nestedData['links'] .= ' - <button type="button" onclick="window.open(&#39;'.$cons.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="Comprobante de Pago" ><i class="ti-file" aria-hidden="true"></i></button>';

                
            }
            
            if($proofs > 0){
                
                $nestedData['links'] .= ' - <button type="button" onclick="window.open(&#39;'.$zip.'&#39;)" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" title="DOCUMENTACIÃƒÆ’Ã†â€™Ãƒâ€ Ã¢â‚¬â„¢ÃƒÆ’Ã¢â‚¬Â ÃƒÂ¢Ã¢â€šÂ¬Ã¢â€žÂ¢ÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â¢ÃƒÆ’Ã‚Â¢ÃƒÂ¢Ã¢â€šÂ¬Ã…Â¡Ãƒâ€šÃ‚Â¬ÃƒÆ’Ã¢â‚¬Â¦ÃƒÂ¢Ã¢â€šÂ¬Ã…â€œN FISCAL PARA CIRCULAR"><i class="ti-zip" aria-hidden="true"></i></button>';
        
            }

            
            $nestedData['receptoria'] = $r;



            $data[] = $nestedData;

        }
    }
      
    $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered),
                "rarray"            => $rarray,
                "data"            => $data,
                
                );
        
        //dd($json_data);

    //return json_encode($json_data, JSON_UNESCAPED_UNICODE);

            

    return Response::json($json_data);


}








}
