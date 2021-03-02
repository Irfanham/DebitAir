<?php

namespace App\Http\Controllers\API;

use App\DebitLocation;
use App\Http\Controllers\Controller;
use App\Transformers\DebitLocationTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Fractalistic\Fractal;

class DebitLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->id == 1) {
            $debits = DebitLocation::with('user')->get();
        }
        else {
            $debits = DebitLocation::where('user_id',$user->id)->get();
        }

        $data = Fractal::create()
                    ->collection($debits)
                    ->transformWith(new DebitLocationTransformer())
                    ->toArray();

        return response()->json(['data'=>$debits], 200);
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
        //return response()->json($request->all());
        $debitInput = new DebitLocation([
            'name' => $request->get('name'),
            'user_id'=>$request->get('user_id')
            ]);
            $debitInput->save();

            return response()->json($debitInput, 200);
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
        $debitloc=DebitLocation::find($id);
        $debitloc->name=$request->name;
        $debitloc->save();
        return response()->json($debitloc,200);
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
        $debits=DebitLocation::find($id);
        $debits->delete();
        return response()->json('success', 200);
    }
}
