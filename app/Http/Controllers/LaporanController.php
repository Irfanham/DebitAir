<?php

namespace App\Http\Controllers;

use App\DebitInput;
use App\DebitLocation;
use App\User;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Excel;
use PDF;
use App\TanamInput;
use App\Tanam;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Psr7\str;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $users = DB::table('users')
            ->select(DB::raw("name as 'user'"))
            ->groupBy('user')
            ->get();
        $years = DB::table('tanam_inputs')
            ->select(DB::raw("YEAR(created_at) as 'tahun'"))
            ->groupBy('tahun')
            ->get();
        $user = $request->input('user');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        if($user && !is_numeric($user)) $user=User::where('name',$user)->first()->id;
        if(!$user) $user= User::get()->last()->id;
        if(!$bulan) $bulan= 'December A';
        if(!$tahun) $tahun= date('Y');
        $b = explode(' ', $bulan);

        if ($b[1] == 'A') {
            $x = strtotime("01 $b[0] $tahun");
            $y = strtotime("16 $b[0] $tahun");
        } else {
            $x = strtotime("01 $b[0] $tahun");
            $y = strtotime("+1 month", $x);
            $x = strtotime("+15 days", $x);
        }
        $x = date('Y-m-d H:i:s', $x);
        $y = date('Y-m-d H:i:s', $y);
        $query = "(created_at BETWEEN '$x' AND '$y')";
//        $tanam = TanamInput::whereRaw($query)
//            ->where('user_id', $user)
//            ->get();

        $tanams = Tanam::where('user_id', $user)->get();
        $tanamData = [];
        foreach ($tanams as $tanam) {
            $temp = TanamInput::whereRaw($query)
                ->where('tanam_id', $tanam->id)->get();
            if (count($temp))
//                array_merge($tanamData, $ten)
                $tanamData[] = $temp;
        }
        return view('admin.laporan')->with([
            'tanamData' => $tanamData,
            'users' => $users,
            'years' => $years,

        ]);

    }

    public function index8(Request $request)
    {
        //

        $users = DB::table('users')
            ->select(DB::raw("name as 'user'"))
            ->groupBy('user')
            ->get();
        $years = DB::table('tanam_inputs')
            ->select(DB::raw("YEAR(created_at) as 'tahun'"))
            ->groupBy('tahun')
            ->get();
        $user = $request->input('user');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        if($user && !is_numeric($user)) $user=User::where('name',$user)->first()->id;
        if(!$user) $user= User::get()->last()->id;
        if(!$bulan) $bulan= 'December';
        if(!$tahun) $tahun= date('Y');
        $x=strtotime("01 $bulan $tahun");
        $y = strtotime("+1 month", $x);

        $x = date('Y-m-d H:i:s', $x);
        $y = date('Y-m-d H:i:s', $y);
        $query = "(created_at BETWEEN '$x' AND '$y')";
//        $tanam = TanamInput::whereRaw($query)
//            ->where('user_id', $user)
//            ->get();

        $debits = DebitLocation::where('user_id', $user)->get();
        $debitData = [];
        foreach ($debits as $debit) {
            $temp = DebitInput::whereRaw($query)
                ->where('debit_location_id', $debit->id)->get();
            if (count($temp))
                $debitData[] = $temp;
        }
        return view('admin.laporan8')->with([
            'debitData' => $debitData,
            'users' => $users,
            'years' => $years,

        ]);

    }


    public function data(Request $request)
    {

        $user = $request->input('user');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $b = explode(' ', $bulan);

        if ($b[1] == 'A') {
            $x = strtotime("01 $b[0] $tahun");
            $y = strtotime("16 $b[0] $tahun");
        } else {
            $x = strtotime("01 $b[0] $tahun");
            $y = strtotime("+1 month", $x);
            $x = strtotime("+15 days", $x);
        }
        $x = date('Y-m-d H:i:s', $x);
        $y = date('Y-m-d H:i:s', $y);
        $query = "(created_at BETWEEN '$x' AND '$y')";
//        $tanam = TanamInput::whereRaw($query)
//            ->where('user_id', $user)
//            ->get();

        $tanams = Tanam::where('user_id', $user)->get();
        $tanamData = [];
        foreach ($tanams as $tanam) {
            $temp = TanamInput::whereRaw($query)
                ->where('tanam_id', $tanam->id)->get();
            if (count($temp))
                $tanamData[] = $temp;
        }


        return response()->json(['data' => $tanamData], 200);
    }

    public function datadebit(Request $request){
        $user = $request->input('user');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $x=strtotime("01 $bulan $tahun");
        $y = strtotime("+1 month", $x);

        $x = date('Y-m-d H:i:s', $x);
        $y = date('Y-m-d H:i:s', $y);
        $query = "(created_at BETWEEN '$x' AND '$y')";
//        $tanam = TanamInput::whereRaw($query)
//            ->where('user_id', $user)
//            ->get();

        $debits = DebitLocation::where('user_id', $user)->get();
        $debitData = [];
        foreach ($debits as $debit) {
            $temp = DebitInput::whereRaw($query)
                ->where('debit_location_id', $debit->id)->get();
            if (count($temp))
                $debitData[] = $temp;
        }


        return response()->json(['data' => $debitData], 200);
    }

    public function import()
    {
        Excel::load();
    }

    public function pdf()
    {

        Excel::load('', function ($reader) {

        });
        $pdf = PDF::loadview('admin.laporan');

        return $pdf->stream();
    }

    public function excel(Request $request)
    {
//        $data=$this->data();
//        $pdf = PDF::loadview('admin.lap');
//        $pdf->setPaper('A4', 'landscape');

        $user = $request->input('user');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        if($user && !is_numeric($user)) $user=User::where('name',$user)->first()->id;
        if(!$user) $user= User::get()->last()->id;
        if(!$bulan) $bulan= 'December';
        if(!$tahun) $tahun= date('Y');
        $b = explode(' ', $bulan);

        if ($b[1] == 'A') {
            $x = strtotime("01 $b[0] $tahun");
            $y = strtotime("16 $b[0] $tahun");
        } else {
            $x = strtotime("01 $b[0] $tahun");
            $y = strtotime("+1 month", $x);
            $x = strtotime("+15 days", $x);
        }
        $x = date('Y-m-d H:i:s', $x);
        $y = date('Y-m-d H:i:s', $y);
        $query = "(created_at BETWEEN '$x' AND '$y')";
//        $tanam = TanamInput::whereRaw($query)
//            ->where('user_id', $user)
//            ->get();

        $tanams = Tanam::where('user_id', $user)->get();

        $tanamData = [];
        foreach ($tanams as $tanam) {
            $temp = TanamInput::whereRaw($query)
                ->where('tanam_id', $tanam->id)->get();
            if (count($temp))
                $tanamData[] = $temp;
        }
//        dd($tanams);
        return view('admin.lap')->with([
            'tanamData'=>$tanamData,
        ]);
        //return $pdf->stream('laporan.pdf');
    }

    public function excel2(Request $request)
    {
//        $pdf = PDF::loadview('admin.lap2');
//        $pdf->setPaper('A4', 'potrait');
        $user = $request->input('user');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        if($user && !is_numeric($user)) $user=User::where('name',$user)->first()->id;
        if(!$user) $user= User::get()->last()->id;
        if(!$bulan) $bulan= 'December';
        if(!$tahun) $tahun= date('Y');
        $x=strtotime("01 $bulan $tahun");
        $y = strtotime("+1 month", $x);

        $x = date('Y-m-d H:i:s', $x);
        $y = date('Y-m-d H:i:s', $y);
        $query = "(created_at BETWEEN '$x' AND '$y')";
//        $tanam = TanamInput::whereRaw($query)
//            ->where('user_id', $user)
//            ->get();

        $debits = DebitLocation::where('user_id', $user)->get();
        $debitData = [];
        foreach ($debits as $debit) {
            $temp = DebitInput::whereRaw($query)
                ->where('debit_location_id', $debit->id)->get();
            if (count($temp))
                $debitData[] = $temp;
        }
        return view('admin.lap2')->with([
            'debitData'=>$debitData,
        ]);
//        return $pdf->stream('laporan_blangko8.pdf');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
