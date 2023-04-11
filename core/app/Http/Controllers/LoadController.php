<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Location as Location;
use App\Category as Category;

use App\ProductList as ProductList;

use App\Receptoria as Receptoria;

use App\Token as Token;

class LoadController extends Controller
{
    
    public function location(){


        $locations = Location::all();

        return $locations;
    }

    public function categories(){


        $categories = Category::orderBy('name')->get();

        return $categories;
    }


    public function products_list($category){


        $productlists = ProductList::where('category_id', '=', $category)->orderBy('name')->get();

        return $productlists;
    }


    public function product($id){


        $product = ProductList::where('id', '=', $id)->first();

        return $product;
    }


    public function receptorias(){


        $receptorias = Receptoria::orderBy('localidad')->get();

        return $receptorias;
    }

    public function testws(){



        $token = Token::first();
        dd($token);
    }


}
