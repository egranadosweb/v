<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;





class LicenseController extends Controller
{

    public function index()
    {
        //
        /*$datos = [
            "id"=> 1,
            "customer_id" => 2,
            "license_type_id" => 1,
            "fecha_vencimiento" => "2022-03-05"
        ];*/

        $datos["licenses"] = DB::table('licenses')
        ->join('customers', 'licenses.customer_id', '=', 'customers.id')
        ->select('licenses.*', 'customers.nombre', 'customers.apellido','customers.cedula')
        ->get();

        
        //return dd($datos);
        //$datos["licenses"] = License::paginate(5);
        //$datos = array("a" => "Edwin" );

        return view("licenses.index", $datos);
    }





    public function create()
    {
        //
        $tipo_licencias = DB::table("license_types")->orderBy("codigo", "asc")->get();

        return view("licenses.create", ["tipos_licencias" => $tipo_licencias]);
    }






    public function store(Request $request)
    {
        //
        $datosLicense = request()->except("_token");

        /*EN CASO QUE HAYA QUE SUBIR UN ARCHIVO O IMAGEN
        if($request->hasFile('foto')) {
            $datosCustomer["foto"] = request->file("foto")->store("uploads" , "public");
        }
        */

        $customer = DB::table("customers")->where("cedula",$datosLicense["customer_id"])->first();
        if($customer){
            $datosLicense["customer_id"] = $customer->id;
        }else{
            return "Ese cliente no existe, debe crearlo";
        }

        //return print_r($datosLicense);

        License::insert($datosLicense);
        return redirect("licenses")->with("mensaje","Se ha asignado una licencia exitosamente");
    }






    public function show(License $license)
    {
        //
    }







    public function edit($id)
    {
        //
        $license = License::findOrFail($id);
        

        $tipo_licencias = DB::table("license_types")->orderBy("codigo", "asc")->get();
        $customer = DB::table("customers")->where("id",$license->customer_id)->first();

        return view("licenses.edit", compact("license"))->with("tipos_licencias",$tipo_licencias)->with("customer",$customer);
    }







    public function update(Request $request, $id)
    {
        //
        $datosLicense = request()->except(["_token", "_method"]);

        //SI HAY QUE ACTUALIZAR FOTO
        /*
        if($request->hasFile('foto')) {
            $customer = Customer::findOrFail($id);
            Storage::delete('public/'.$customer->foto);
            $datosCustomer["foto"] = $request-file("foto")->store("uploads","public");
        }
        */

        License::where("id", "=", $id)->update($datosLicense);
        $license = License::findOrFail($id);
        //return view("customers.edit", compact("customer"));
        return redirect("licenses")->with("mensaje","Se ha actualizado una licencia exitosamente");;
    }








    public function destroy($id)
    {
        //
        License::destroy($id);
        return redirect("licenses")->with("mensaje","Se ha eliminado una licencia exitosamente");;
    }







    public function expired(){
        /*$datos["licenses"] = DB::table('licenses')
        ->join('customers', 'licenses.customer_id', '=', 'customers.id')
        ->select('licenses.*', 'customers.nombre', 'customers.apellido','customers.cedula')
        ->get();

        //$datos["licenses"] = License::paginate(5);
        //$datos = array("a" => "Edwin" );

        return view("licenses.index", $datos);*/

        $p["licenses"] = DB::table('licenses')->join('customers', 'licenses.customer_id', '=', 'customers.id')->select('licenses.*', 'customers.nombre', 'customers.apellido','customers.cedula')->whereRaw('DATEDIFF(fecha_vencimiento,NOW()) < 45')->orderBy('fecha_vencimiento','asc')->get();

        return view("licenses.expired", $p);

    }





}
