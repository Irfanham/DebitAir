<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use App\DebitInput;
use App\DebitLocation;
use App\Http\Controllers\Controller;
use App\Transformers\DebitInputTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Fractalistic\Fractal;

class DebitInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       // $loc = new DebitLocation();
        $bulan=$request->input('bulan');
        $tahun=$request->input('tahun');
        $b = explode(' ',$bulan);

        if($b[1] == 'A'){
            $x = strtotime("01 $b[0] $tahun");
            $y = strtotime("16 $b[0] $tahun");
        }else{
            $x = strtotime("01 $b[0] $tahun");
            $y = strtotime("+1 month", $x);
            $x = strtotime("+15 days", $x);
        }
        $x = date('Y-m-d H:i:s', $x);
        $y = date('Y-m-d H:i:s', $y);
        $query = "(created_at BETWEEN '$x' AND '$y')";
        $debits=DebitInput::whereRaw($query)
           ->with(['debit_location'])
            ->get();

        foreach ($debits as &$debit){
            $debit->user = $debit->debit_location->user;
        }
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
        //return response()->json($request->all());
        $debitInput = new DebitInput([
        'debit' => $request->get('debit'),
        'debit_location_id' => $request->get('debit_location_id')
        //$debitInput->create_at=Carbon::now()
        ]);
        $debitInput->save();

        return response()->json($debitInput, 200);
    }

    /**
     * Store a daily created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily()
    {
        $dailyInputs = array();
        $debitLocations = DebitLocation::all();
        foreach ($debitLocations as $debitlocation) {

            $debitInput = DebitInput::where('debit_location_id',$debitlocation->id)
                                ->whereDate('created_at', Carbon::today())
                                ->first();

            // If $debitInput is exist
            if ($debitInput) {
                $dailyInputs = Arr::prepend($dailyInputs, $debitInput);
                continue;
            }

            $dailyInputs = Arr::prepend($dailyInputs, DebitInput::firstOrCreate([
                'debit_location_id' => $debitlocation->id,
                'debit' => 0,
                'created_at' => Carbon::now(),
            ]));
        }

        $data = Fractal::create()
                    ->collection($dailyInputs)
                    ->transformWith(new DebitInputTransformer())
                    ->toArray();

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $debits = DebitInput::where('debit_location_id', $id)->get()->last();

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
        $debitInput = DebitInput::find($id);
        $debitInput->debit_location_id = $request->debit_location_id;
        $debitInput->debit = $request->debit;
        $debitInput->save();


        $data = Fractal::create()
                    ->item($debitInput)
                    ->transformWith(new DebitInputTransformer())
                    ->toArray();

        return response()->json($data, 200);
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

        $debits=DebitInput::find($id);
        $debits->delete();
        return response()->json('success', 200);

    }
}
