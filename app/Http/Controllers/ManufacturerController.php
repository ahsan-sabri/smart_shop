<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manufacturer;
use DB;  // for query builder method

class ManufacturerController extends Controller {

    //
    public function createManufacturer() {
        return view('admin.manufacturer.addManufacturerContent');
    }

    public function saveManufacturer(Request $request) {
        
        $this->validate($request, [
            'manufacturerName' => 'required',
            'manufacturerDescription' => 'required',
        ]);
        
        //eloquent ORM

//        $manufacturer = new Manufacturer();
//        $manufacturer->manufacturerName = $request->manufacturerName;
//        $manufacturer->manufacturerDescription = $request->manufacturerDescription;
//        $manufacturer->publicationStatus = $request->publicationStatus;
//        $manufacturer->save();
//        return 'Manufacturer created successfully';
        
        //eloquent ORM    
  
//        manufacturer::create($request->all());
//        return 'Manufacturer created successfully';
        
        //query builder

        DB::table('manufacturers')->insert([
            'manufacturerName' => $request->manufacturerName,
            'manufacturerDescription' => $request->manufacturerDescription,
            'publicationStatus' => $request->publicationStatus,
        ]);
        return redirect()->back()->with('message', 'Manufacturer created successfully');
//        return 'manufacturer created successfully';
                
    }
    
    public function manageManufacturer() {
        $manufacturers = Manufacturer::all();
        return view('admin.manufacturer.manageManufacturerContent', ['manufacturers' => $manufacturers]);
    }
    
    public function editManufacturer($id)  {
        $manufacturerInfoById = manufacturer::where('id',$id)->first();
        return view('admin.manufacturer.editManufacturerContent', ['manufacturerInfo' => $manufacturerInfoById]);
    }
    
    public function updateManufacturer(Request $request)  {
//        dd($request->all());
        $manufacturer = Manufacturer::find($request->manufacturerId);
        $manufacturer->manufacturerName = $request->manufacturerName;
        $manufacturer->manufacturerDescription = $request->manufacturerDescription;
        $manufacturer->publicationStatus = $request->publicationStatus;
        $manufacturer->save();
        return redirect('/manufacturer/manage')->with('updateSuccess', 'Manufacturer info updated successfully');
    }
    
    public function deleteManufacturer($id)  {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/manufacturer/manage')->with('deleteSuccess', 'Manufacturer info deleted successfully');
    }

}
