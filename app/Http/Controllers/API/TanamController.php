<?php

namespace App\Http\Controllers\API;

use App\Tanam;
use App\Http\Controllers\Controller;
use App\Transformers\TanamTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Fractalistic\Fractal;

class TanamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tanamPeriods = Tanam::whereNull('parent')
                            ->with(['subtanam','user'])
                            ->get();

        $data = Fractal::create()
                    ->collection($tanamPeriods)
                    ->transformWith(new TanamTransformer())
                    ->toArray();
        return response()->json(['data'=>$tanamPeriods], 200);
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
//        return response()->json($request->all());
        $tanamInput = new Tanam([

            'name' => $request->get('name'),
            'user_id'=>$request->get('user_id')
            //$debitInput->create_at=Carbon::now()
            ]);
            $tanamInput->save();

            return response()->json($tanamInput, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tanams = Tanam::where('parent', $id)->get();

        $data = Fractal::create()
                    ->collection($tanams)
                    ->transformWith(new TanamTransformer())
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
//        return response()->json($request->all());
        $tanam=Tanam::find($id);
        $tanam->name=$request->name;
        $tanam->user_id=$request->get('user_id');
        $tanam->save();
        return response()->json($tanam,200);
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
        $tanam=Tanam::find($id);
        $tanam->delete();
        return response()->json('success',200);
    }
}
