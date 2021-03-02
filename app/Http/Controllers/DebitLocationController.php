<?php

namespace App\Http\Controllers;
use Illuminate\Support\Arr;

use App\DebitInput;
use App\DebitLocation;
use App\Transformers\DebitInputTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Fractalistic\Fractal;
use Carbon\Carbon;

class DebitLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $debits = DebitLocation::paginate(10);

        return response()->json($data, 200); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $debitInput = new DebitLocation;
        $debitInput->debit = Input::get(0);
        $debitInput->debit_location_id = Input::get('debit_location_id');
        $debitInput->create_at=Carbon::now();
        $debitInput->save();       
        
        return response()->json("success", 200);
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
        $debits = DebitLocation::where('debit_location_id', $id)->get()->last();

        $data = Fractal::create()
                    ->item($debits)
                    ->transformWith(new DebitInputTransformer())
                    ->toArray();

        return response()->json($data, 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  
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
        //
        $debits=DebitLocation::find($id);
 
        !is_null(Input::get('debit')) ? $debits->debit=Input::get('debit') : $debits->debit;
        
        $debits->save();
        return response()->json("success", 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $debits = DebitLocation::find($id);
        if(is_null($debits)){
            return response()->json("not found", 404);
        }
        $debits->delete();
        return response()->json("success", 200);
    }

}
