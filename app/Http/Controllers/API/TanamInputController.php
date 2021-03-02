<?php

namespace App\Http\Controllers\API;
use App\DebitInput;
use Illuminate\Support\Arr;
use Carbon\Carbon;

use App\Tanam;
use App\TanamInput;
use App\Http\Controllers\Controller;
use App\Transformers\TanamInputTransformer;
use App\Transformers\TanamInputPeriodTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Fractalistic\Fractal;

class TanamInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
        $tanam=TanamInput::whereRaw($query)
            ->with(['tanam'])
            ->get();
//        foreach ($tanam as &$tanam){
//            $debit->user = $debit->debit_location->user;
//        }
        return response()->json(['data'=>$tanam], 200);
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
        $tanamInput = new TanamInput([

            'tanam_id' => $request->get('tanam_id'),
            'tanam_period'=>$request->get('tanam_period'),
            'value'=>$request->get('value')
            //$debitInput->create_at=Carbon::now()
            ]);
            $tanamInput->save();

            return response()->json($tanamInput, 200);
    }

    /**
     * Store a daily created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily()
    {
        $dailyInputs = array();
        $tanams = Tanam::whereNotNull('parent')->get();
        foreach ($tanams as $tanam) {

            // $debitInput = TanamInput::where('tanam_period_id',$debitlocation->id)
            //                     ->whereDate('created_at', Carbon::today())
            //                     ->first();
            //
            // // If $debitInput is exist
            // if ($debitInput) {
            //     $dailyInputs = Arr::prepend($dailyInputs, $debitInput);
            //     continue;
            // }

            $today = Carbon::now();
            $tanam_period_time = '';
            if ($today->format('d') < 16 && $today->format('d') > 0) {
                $tanam_period_time = $today->monthName.' A';
            } else {
                $tanam_period_time = $today->monthName.' B';
            }

            $dailyInputs = Arr::prepend($dailyInputs, TanamInput::firstOrCreate([
                'tanam_id' => $tanam->id,
                'tanam_period' => 1,
                'tanam_period_time' => $tanam_period_time,
                'value' => 0,
                'created_at' => Carbon::today(),
            ]));
            $dailyInputs = Arr::prepend($dailyInputs, TanamInput::firstOrCreate([
                'tanam_id' => $tanam->id,
                'tanam_period' => 2,
                'tanam_period_time' => $tanam_period_time,
                'value' => 0,
                'created_at' => Carbon::today(),
            ]));
            $dailyInputs = Arr::prepend($dailyInputs, TanamInput::firstOrCreate([
                'tanam_id' => $tanam->id,
                'tanam_period' => 3,
                'tanam_period_time' => $tanam_period_time,
                'value' => 0,
                'created_at' => Carbon::today(),
            ]));
        }

        $data = Fractal::create()
                    ->collection($dailyInputs)
                    ->transformWith(new TanamInputTransformer())
                    ->toArray();

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $tanam = [];
        if($request->has('tanam_period_time') &&
                !empty($request->tanam_period_time)) {
            $tanams = [
                TanamInput::where('tanam_id', $id)->where('tanam_period', 1)
                        ->where('tanam_period_time', $request->tanam_period_time)
                        ->get()->last(),
                TanamInput::where('tanam_id', $id)->where('tanam_period', 2)
                        ->where('tanam_period_time', $request->tanam_period_time)
                        ->get()->last(),
                TanamInput::where('tanam_id', $id)->where('tanam_period', 3)
                        ->where('tanam_period_time', $request->tanam_period_time)
                        ->get()->last(),
            ];
        } else {
            $tanams = [
                TanamInput::where('tanam_id', $id)->where('tanam_period', 1)
                        ->get()->last(),
                TanamInput::where('tanam_id', $id)->where('tanam_period', 2)
                        ->get()->last(),
                TanamInput::where('tanam_id', $id)->where('tanam_period', 3)
                        ->get()->last(),
            ];
        }

        $data = Fractal::create()
                    ->collection($tanams)
                    ->transformWith(new TanamInputTransformer())
                    ->toArray();

        return response()->json($data, 200);
    }

    public function tanamPeriodTimes()
    {
        $tanamPeriodTimes = TanamInput::select('tanam_period_time')
                                ->distinct()->get();

        $data = Fractal::create()
                    ->collection($tanamPeriodTimes)
                    ->transformWith(new TanamInputPeriodTransformer())
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
        //return response()->json($request->all());
        $tanamInput = TanamInput::where('tanam_id', $id)
                        ->where('tanam_period', $request->tanam_period)
                        ->where('tanam_period_time', $request->tanam_period_time)
                        ->latest()
                        ->first();
        $tanamInput->value = $request->value;
        $tanamInput->save();


        $data = Fractal::create()
                    ->item($tanamInput)
                    ->transformWith(new TanamInputTransformer())
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

        $tanamin=TanamInput::find($id);
        $tanamin->delete();
        return response()->json('success',200);
    }
}
