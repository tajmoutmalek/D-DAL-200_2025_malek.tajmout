<?php

namespace App\Http\Controllers;

use App\Models\FastEvent;
use Illuminate\Http\Request;

class FastEventController extends Controller
{

    public function destroy(Request $request)
    {
    	FastEvent::where('id',$request->id)->delete();

    	return respone()->json(true);
    }

}
