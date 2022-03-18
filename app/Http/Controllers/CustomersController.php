<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{





   
    public function index()
    {   
        $datos["customers"] = Customers::paginate(5);
        return view("customers.index", $datos);
    }







  
    public function create()
    {
        //
        return view("customers.create");
    }






  
    public function store(Request $request)
    {
        //
        $datosCustomer = request()->except("_token");

        /*EN CASO QUE HAYA QUE SUBIR UN ARCHIVO O IMAGEN
        if($request->hasFile('foto')) {
            $datosCustomer["foto"] = request->file("foto")->store("uploads" , "public");
        }
        */

        Customers::insert($datosCustomer);
        return redirect("customers")->with("mensaje","Se ha creado un cliente exitosamente");

    }







   
    public function find()
    {
        //
        //$datos["customers"] = DB::table("customers")->where("id",$id)->get();
        //return dd($datos);
        return view('customers.find');
    }







  
    public function show($id)
    {
        //
        $datos["customers"] = DB::table("customers")->where("cedula", $id)->get();
        //return $id;
        //return dd($datos);
        return view('customers.index', $datos)->with("mensaje","Consulta exitosa");
    }






    public function edit($id)
    {
        //
        $customer = Customers::findOrFail($id);
        return view("customers.edit", compact("customer"));
    }







   
    public function update(Request $request, $id)
    {
        //
        $datosCustomer = request()->except(["_token","_method"]);

        //SI HAY QUE ACTUALIZAR FOTO
        /*
        if($request->hasFile('foto')) {
            $customer = Customer::findOrFail($id);
            Storage::delete('public/'.$customer->foto);
            $datosCustomer["foto"] = $request-file("foto")->store("uploads","public");
        }
        */

        Customers::where("id","=",$id)->update($datosCustomer);
        $customer = Customers::findOrFail($id);
        //return view("customers.edit", compact("customer"));
        return redirect("customers")->with("mensaje","Se ha actualizado un cliente exitosamente");
    }






  
    public function destroy($id)
    {
        //
        Customers::destroy($id);
        return redirect("customers")->with("mensaje","Se ha eliminado un clienter exitosamente");
    }
}
