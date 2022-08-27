<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    private static $id;

    public function addOutlet()
    {

        return view('admin.outlet.add-outlet');
    }

    public function newOutlet(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'image' => 'required',
        ],
            [
                'name.required' => 'Outlate name is invalid',
                'phone.required' => 'Phone Number is invalid',
                'latitude.required' => 'Latitude is invalid',
                'longitude.required' => 'Longitude is invalid',
                'image.required' => 'Image is invalid',
            ]);


        Outlet::newOutlet($request);
        return redirect()->back()->with('message', 'Outlet created successfully');
    }

    public static function manageOutlet()
    {
        return view('admin.outlet.manage-outlet',[
            'outlets' => Outlet::orderBy('id' , 'desc')->get()
        ]);
    }


    public static function editOutlet($id)
    {
        self::$id = base64_decode($id);
        return view('admin.outlet.edit-outlet',[
            'outlet' => Outlet::find(self::$id)
        ]);
    }

    public static function updateOutlet(Request $request, $id)
    {
        self::$id = base64_decode($id);
        Outlet::updateOutlet($request, self::$id);
        return redirect('/manage-outlet')->with('updatemessage', 'Outlet Updated successfully' );
    }



    public static function deleteOutlet(Request $request, $id)
    {

        self::$id = base64_decode($id);
        Outlet::deleteUser(self::$id);
        return redirect('/manage-outlet')->with('deleteMessage', 'Outlet deleted successfully' );
    }
}
