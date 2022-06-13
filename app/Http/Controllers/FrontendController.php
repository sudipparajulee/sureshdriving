<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function visits(){
        if(!Session::has('visit')){
            
            $last_date = Visit::latest('visit_date')->first();
            $visit_date = date('Y-m-d');
            if($last_date)
            {
            if($last_date->visit_date != $visit_date)
            {
            $no_of_visits = 1;
            $d = new Visit();
            $d->visit_date = $visit_date;
            $d->no_of_visits = $no_of_visits;
            $d->save();
            }
            else
            {
            $newvisit = $last_date->no_of_visits + 1;
            Visit::where('visit_date',$visit_date)->update(['no_of_visits'=>$newvisit]);
            }
            }
            else
            {
                $no_of_visits = 1;
            $d = new Visit();
            $d->visit_date = $visit_date;
            $d->no_of_visits = $no_of_visits;
            $d->save();
            }
            Session::put('visit','yes');
            Session::save();
        }  
    }

    public function home()
    {
        $this->visits();
        return view('welcome');
    }
}
