<?php

namespace App\Http\Controllers;

use App\Models\CallCenter;
use App\Models\Customers;
use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CallCenterController extends Controller
{
   
    public function index()
    {
        //
       
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
        //
        $nota = request()->except("_token","cedula");

        /*EN CASO QUE HAYA QUE SUBIR UN ARCHIVO O IMAGEN
        if($request->hasFile('foto')) {
            $datosCustomer["foto"] = request->file("foto")->store("uploads" , "public");
        }
        */
        $fechaActual = Carbon::now();

        $CallCenter = new CallCenter();
        $CallCenter->customer_id = $request["customer_id"];
        $CallCenter->nota = $request["nota"];
        $CallCenter->created_at = $fechaActual;
        $CallCenter->save();

        return redirect("callcenter/".$request["cedula"]);
    }

  
    public function show($id)
    {
        //
        //return $id;
        $datos["customers"] = DB::table('customers')->where("cedula","=",$id)->get();
        $array = json_decode(json_encode($datos), true);
        $idCustomer = $array["customers"][0]["id"];
        $dato["dato"] = DB::table('call_centers')->where("customer_id","=",$idCustomer)->get();
         
        return view("callcenter.perfil", $datos)->with("dato", $dato["dato"]);
    }

  
    public function edit(CallCenter $callCenter)
    {
        //
    }

  
    public function update(Request $request, CallCenter $callCenter)
    {
        //
    }

   
    public function destroy(CallCenter $callCenter)
    {
        //
    }
}
