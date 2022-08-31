<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    function index()
    {
        return view('autocomplete');
    }




    function fetch(Request $request)
    {

     if($request->get('query')) {
      $query = $request->get('query');
     
      $data = DB::table('apps_countries')
                    ->where('country_name', 'LIKE', "%{$query}%")
                    ->get();

      //echo $data;
      //echo count($data);

      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';  

      if (count($data) > 0){
            foreach($data as $row) {
                $output .= '<li><a href="#">'.$row->country_name.'</a></li>';    
            }  
      } else {
                $output .= '<li><a href="#">ไม่มีข้อมูล</a></li>';
      }
   
        $output .= '</ul>';

        echo $output;
        
     } 


    }

}
