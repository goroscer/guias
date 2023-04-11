<?php

namespace App\Http\Controllers;


use App\Category as Category;
use App\ProductList as ProductList;


use Alert;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductlistController extends Controller
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

        $products = DB::table('product_lists')->select(DB::raw(" id, name, price, unit, trs,(SELECT name FROM categories WHERE product_lists.category_id = categories.id) AS cate"))->get();

        return view('products', compact('id', 'type', 'office', 'products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories=Category::all(); 

        $id = session()->get('guiasid');
        $type = session()->get('guiastype');

        return view('products_create', compact('id', 'type', 'categories','product'));

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

            $product= new ProductList;

            $product->name = $request->c1;

            $c2 = str_replace('.', '', $request->c2);
            $c2 = str_replace(',', '.', $c2);
            $product->price = $c2;

            $product->unit = $request->c3;
            $product->trs = $request->c4;            
            $product->category_id = $request->c5;
 
            $product->save();


        }
        catch (\Illuminate\Database\QueryException $e){
            if($e){
                echo $e;
                Alert::error('El producto no ha podido ser creado!.', 'Error!');
                return redirect('/products');
            }
        }


        Alert::success('El producto creado satisfactoriamente!.', 'Éxito!');
        return redirect('/products');
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


        $product=ProductList::find($id);

        $categories=Category::all(); 


        $id = session()->get('guiasid');
        $type = session()->get('guiastype');

        return view('products_edit', compact('id', 'type', 'categories','product'));


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

            $product=ProductList::find($id);

            $product->name = $request->c1;

            $c2 = str_replace('.', '', $request->c2);
            $c2 = str_replace(',', '.', $c2);
            $product->price = $c2;

            $product->unit = $request->c3;
            $product->trs = $request->c4;            
            $product->category_id = $request->c5;
 
            $product->save();



        }
        catch (\Illuminate\Database\QueryException $e){
            if($e){
                echo $e;
                Alert::error('El producto no ha podido ser modificado!.', 'Error!');
                return redirect('/products');
            }
        }


        Alert::success('El producto modificado satisfactoriamente!.', 'Éxito!');
        return redirect('/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $affectedRows  = ProductList::where('id', '=', $id)->delete();

        return $affectedRows;
    }
}
