<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\People;
use App\Models\People_film;
use App\Models\Film;

class MainController extends Controller
{
    public function peopleInfo(Request $request)
    {
        $p_num = str_replace('http://swapi.dev/api/people/','',$request->input('p_peoplenumber'));
        $p_num = str_replace('/','',$p_num);

        $peo = People::where(array('p_peoplenumber'=>$p_num))->count();

        if($peo == 0)
        {

            $peoples = new People;

            $peoples->p_name = $request->input('p_name');
            $peoples->p_skincolor = $request->input('p_skincolor');
            $peoples->p_mass = $request->input('p_mass');
            $peoples->p_gender = $request->input('p_gender');
            $peoples->p_haircolor = $request->input('p_haircolor');
            $peoples->p_height = $request->input('p_height');
            $peoples->p_eyecolor = $request->input('p_eyecolor');
            $peoples->p_dob = $request->input('p_dob');
            $peoples->p_no_of_films = $request->input('p_no_of_films');
            $peoples->p_peoplenumber = $p_num;
    
            $peoples->save();

            $films_list = $request->input('p_films_list');
            $films_list = explode(',',$films_list);

            if(count($films_list)>0)
            {
                foreach($films_list as $a)
                {
                    $a = str_replace('http://swapi.dev/api/films/','',$a);
                    $a = str_replace('/','',$a);

                    $pf = new People_film;

                    $pf->pf_pid = $peoples->id;
                    $pf->pf_fid = $a;

                    $pf->save();
                }
            }

            $response_value = ['message'=>'Record inserted successfully','status'=>true];
        }else{
            $response_value = ['message'=>'Record already inserted.','status'=>false];
        }


        return response()->json($response_value,200);
    }


    public function allPeoples(Request $request)
    {
        $peoples = People::orderBy('p_id','desc')->get();
        $films = Film::orderBy('f_id','desc')->get();

        return response()->json(['status'=>true,'peopleInfo'=>$peoples,'filmInfo'=>$films],200);
    }

    public function filmInfo(Request $request)
    {
        $f_num = str_replace('http://swapi.dev/api/films/','',$request->input('f_no'));
        $f_num = str_replace('/','',$f_num);


        $check = Film::where(array('f_no'=>$f_num))->count();

        if($check == 0)
        {
            $fil = new Film;

            $fil->f_title = $request->input('f_title');
            $fil->f_episodeid = $request->input('f_episodeid');
            $fil->f_openingcrawl = $request->input('f_openingcrawl');
            $fil->f_director = $request->input('f_director');
            $fil->f_producer = $request->input('f_producer');
            $fil->f_releasedate = $request->input('f_releasedate');
            $fil->f_noofcharacters = $request->input('f_noofcharacters');
            $fil->f_no = $f_num;
    
            $fil->save();
            $Response_value = ['message'=>'Film Value inserted successfully','status'=>true];
        }else{
            $Response_value = ['message'=>'Film already been inserted','status'=>false];
        }

        return response()->json($Response_value,200);
    }
}
