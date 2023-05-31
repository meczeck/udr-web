<?php

namespace App\Http\Controllers;

use App\Models\Dissertation;
use Illuminate\Http\Request;

class DissertationController extends Controller
{
    //

    public function getData() {
        
        $data = Dissertation::all();

        return response()->json(["data"=>$data], 200);
    }
}
