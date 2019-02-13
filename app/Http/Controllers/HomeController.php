<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function home()
    {
        return view('homepages.homepage');
    }

    public function course()
    {
        return view('homepages.course');
    }

    public function discussion()
    {
        return view('homepages.discussion');
    }
    public function getSearchc(Request $request)
    {
        $key=$request->key;
        $key=$request->get('key');
        $key = \DB::table('courses')->where('name','like',"%".$key."%")->take(50)->paginate(5);
        
                         // return view('homepages.search');
                       return view('homepages.search',compact('key'));
    }

    public function getSearch(Request $request)
    {
        $key=$request->key;
        $key= \DB::table('programs')
            ->where('name', 'LIKE', "%{$key}%")
            ->get();
        return view('search',compact('key'));
    }
     
        function getSearchAjax(Request $request)
    {
        if($request->get('key'))
        {
            $key = $request->get('key');
            $data = DB::table('programs')
            ->where('name', 'LIKE', "%{$key}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="data/'. $row->id .'">'.$row->name_product.'</a></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
       return view('search');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
