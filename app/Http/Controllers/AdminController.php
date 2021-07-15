<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hosting;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    /**
     * Vista home del admin
     *
     * @return void
     */
    public function index(){

        $user = User::where('profile_id', '=', 3)
                    ->orderBy('name', 'ASC')
                    ->get();

        $hosting = Hosting::all();

//en la variable $ingresosEgresos se obtiene los valores de  las columnas
// date, amount , type de la tabla bills

        $ingresosEgresos= DB:: table('bills')
                  ->select('date','amount','type')
                  ->get();
       // dd($j);
        return view('admin.home')
            ->with('ingresosEgresos', $ingresosEgresos)
            ->with('user', $user)
            ->with('hosting', $hosting);

    }

    /**
     * Comentario
     *
     * @param [type] $email
     * @return void
     */
    public function check_email($email){

        $check = DB::table('users')
                    ->where('email', '=', $email)
                    ->first();

        if (is_null($check)){
            return response()->json(false, 200);
        }else{
            return response()->json(true, 200);
        }
    }
}
