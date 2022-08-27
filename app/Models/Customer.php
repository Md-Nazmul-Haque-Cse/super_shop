<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','password'];
    private static $customer;


    public  static function newUser($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->password = $request->password;
        self::$customer->save();
    }

    public  static function deleteUser($id)
    {
        self::$customer = Customer::find($id);
        self::$customer->delete();
    }
    public  static function updateUser($request, $id)
    {
        self::$customer = Customer::find($id);
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->password = $request->password;
        self::$customer->save();
    }
}
