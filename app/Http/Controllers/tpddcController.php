<?php


namespace App\Http\Controllers;


use App\tpddc;

class tpddcController extends Controller
{
    public function compose(View $view)
    {

    }
    function index()
    {
        return view('trangchu.demosearch');
    }

    function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = tpddc::where('ddc', '<=', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
       <li><a href="#">'.$row->name.'</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

}
