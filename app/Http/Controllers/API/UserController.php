<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use App\Transformers\UserTransformer;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Spatie\Fractalistic\Fractal;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function login(Request $request)
    {
        // return response()->json([
        //     'email'=>$request->email,
        //     'password'=>$request->password

        // ], 200);
        if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {

            $user = Auth::user();

            $data = Fractal::create()
                        ->item($user)
                        ->transformWith(new UserTransformer())
                        ->toArray();

            return response()->json([
                'token' => $user->createToken('nApp')->accessToken,
            ] + $data, 200);
        } else {
            return response()->json([
                'error' => 'Login gagal',
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            // return redirect()->route('book')->with('success', 'Buku berhasil ditambah');
            $response = [
                'error' => '',
                'token' => $user->createToken('nApp')->accessToken,
            ];

            return response()->json(['success'=>$response], 200);
        } catch (Illuminate\Database\QueryException $e) {
            $response = [
                'error' => 'Registrasi gagal',
            ];

            return response()->json($response, 200);
            // return redirect()->route('book')->with('danger', 'Buku gagal ditambah');
        }


        // $success['token'] =  $user->createToken('nApp')->accessToken;
        // $success['name'] =  $user->name;


        // return response()->json(['success'=>$response], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        // dd($user)
        $data = Fractal::create()
                    ->item($user)
                    ->transformWith(new UserTransformer())
                    ->toArray();

        return response()->json($data, 200);
    }
    public function index(){
        $pegawai=User::all();
        return response()->json(['data'=>$pegawai],200);
    }

    public function store(Request $request){

        //return response()->json($request->all());
        $pegawai= new User([
           'name'=>$request->get('name'),
           'email'=>$request->get('email'),
           'password'=>Hash::make($request->get('password')),
        ]);
        $pegawai->save();
        return response()->json($pegawai,200);
    }

    public function update(Request $request, $id){

        //return response()->json($request->all());
        $pegawai=User::find($id);
        $pegawai->name=$request->name;
        $pegawai->email=$request->email;
        $pegawai->password= Hash::make($request->get('password'));

        $pegawai->save();
        return response()->json($pegawai,200);

    }
    public function delete($id){
        $pegawai=User::find($id);
        $pegawai->delete();
        return response()->json('success',200);
    }


}
