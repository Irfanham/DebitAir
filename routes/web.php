<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Tanam;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);



Route::group(['prefix' => 'admin' ], function () {
    Route::get('/','HomeController@index')->name('home');
    Route::get('/dashboard',function(){
        return view('dashboard');
    })->name('dashboard');




    Route::get('/laporan','LaporanController@index')->name('laporan');
    Route::get('/laporan_blanko8','LaporanController@index8')->name('laporan8');





    Route::get('lap','LaporanController@data')->name('lap');
    Route::get('lapor','LaporanController@datadebit')->name('lapor');

    Route::get('/cetak','LaporanController@excel')->name('cetak');
    Route::get('/cetak2','LaporanController@excel2')->name('cetak2');



    Route::resource('/debit', 'DebitInputController', array(
        'except'=>array('create','edit')
        )
    );

    Route::get('/debit', function(){

        $debits = \App\DebitLocation::all();
        $years = DB::table('debit_inputs')
            ->select(DB::raw("YEAR(created_at) as 'tahun'"))
            ->groupBy('tahun')
            ->get();
//        return $years;
        return view('admin.debit')->with([
            'debit' => $debits,
            'years' => $years,

        ]);

    })->name('debit');

    Route::get('/debitloc', function(){
        $debits = \App\DebitLocation::all();
        $user = \App\User::where('id','>',1)->get();
        return view('admin.debitloc')->with([
            'debit_loc' => $debits,
            'user'=>$user,
        ]);

    })->name('debitloc');




    Route::get('/tanam', function(){
        $user = \App\User::where('id','>',1)->get();
        $tanam = Tanam::whereNull('parent')
            ->with(['subtanam','user'])
            ->get();
//        return $tanam;
        return view('admin.tanam')->with([
            'user'=>$user,
            'tanam'=>$tanam
        ]);

    })->name('tanam');


    Route::get('/tanamin', function(){
        $tanams = \App\Tanam::whereNotNull('parent')->get();
        $years = DB::table('debit_inputs')
            ->select(DB::raw("YEAR(created_at) as 'tahun'"))
            ->groupBy('tahun')
            ->get();
        return view('admin.tanamin')->with([
            'tanam' => $tanams,
            'years' => $years,
        ]);
    })->name('tanamin');

    Route::get('/pegawai', function(){
        $user = \App\User::all();
        return view('admin.pegawai')->with([
            'user'=>$user
        ]);
    })->name('pegawai');

});
//Route::get('/home', 'HomeController@index')->name('home');
