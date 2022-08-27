<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private static $id;

    public function addUser()
    {

        return view('admin.user.add-user');
    }

    public function newUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],
            [
                'name.required' => 'User name is invalid',
                'email.required' => 'Email is invalid',
                'password.required' => 'Password is invalid',
            ]);

        Customer::newUser($request);
        return redirect()->back()->with('message', 'User created successfully');
    }

    public static function manageUser()
    {
        return view('admin.user.manage-user',[
            'users' => Customer::orderBy('id' , 'desc')->get()
        ]);
    }

    public static function editUser($id)
    {
        self::$id = base64_decode($id);
        return view('admin.user.edit-user',[
            'user' => Customer::find(self::$id)
        ]);
    }

    public static function updateUser(Request $request, $id)
    {
        self::$id = base64_decode($id);
        Customer::updateUser($request, self::$id);
        return redirect('/manage-user')->with('updatemessage', 'User Updated successfully' );

    }



    public static function deleteUser(Request $request, $id)
    {

        self::$id = base64_decode($id);
        Customer::deleteUser(self::$id);
        return redirect('/manage-user')->with('deleteMessage', 'User deleted successfully' );
    }


}
