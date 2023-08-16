<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use App\Models\Amenities;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PropertyTypeExport;

class PropertyTypeController extends Controller
{

    public function admin_all_property()
    {
        $types = PropertyType::all();
        return view('admin/property/all_properties')->with('types',$types);
    }

    public function admin_add_property()
    {
        return view('admin/property/add_properties');
    }

    public function admin_store_property(Request $request)
    {
        $request -> validate([
            'type_name'=> 'required|unique:property_types|max:200',
            'type_icon'=>'required',
        ]);

        $property = $request->all();
        PropertyType::create($property);

     
        return redirect()->back()->with('success', 'Property Type Added Successfully!');
    }
    
    public function admin_edit_property(string $id)
    {
        $types = PropertyType::find($id);
        return view('admin/property/edit_property')->with('types',$types);
    }

    public function admin_update_property(Request $request,string $id)
    {
        $request -> validate([
            'type_name'=> 'required|unique:property_types|max:200',
            'type_icon'=>'required',
        ]);

        $types = PropertyType::find($id);
        $types->type_name = $request->type_name;
        $types->type_icon = $request->type_icon;
        $types->save();

        return redirect()->back()->with('success','Property Type Updated Successfully!');
    }


    public function admin_delete_property(string $id)
    {
  
        PropertyType::findOrFail($id)->delete();

        return redirect()->back()->with('success','Property Type Deleted Successfully!');
    }


    // Starting a new amenities methods 

    public function admin_all_amenity()
    {
        $types = Amenities::all();
        return view('admin/amenity/all_amenities')->with('types',$types);
    }

    public function admin_add_amenity()
    {
        return view('admin/amenity/add_amenities');
    }

    public function admin_store_amenity(Request $request)
    {
        $request -> validate([
            'amenities_name'=> 'required',
            
        ]);

        $amenity = $request->all();
        Amenities::create($amenity);

        
        return redirect()->back()->with('success', 'New Amenity  Added Successfully!');
    }
    
    public function admin_edit_amenity(string $id)
    {
        $types = Amenities::find($id);
        return view('admin/amenity/edit_amenity')->with('types',$types);
    }

    public function admin_update_amenity(Request $request,string $id)
    {
        $request -> validate([
            'amenities_name'=> 'required',

        ]);

        $types = Amenities::find($id);
        $types->amenities_name = $request->amenities_name;

        $types->save();

        return redirect()->back()->with('success',' New Amenity Updated Successfully!');
    }


    public function admin_delete_amenity(string $id)
    {
  
        Amenities::findOrFail($id)->delete();

        return redirect()->back()->with('success','New Amenity Deleted Successfully!');
    }


    public function admin_import_excel()
    {
        return view('admin/excel/import_excel');
    }


    public function admin_export_excel()
    {
        return Excel::download(new PropertyTypeExport, 'properties.xlsx');
    }

}
