<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $fillable = ['name','phone','latitude', 'longitude','image'];
    private static $outlet;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $extension;
    private static $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        if (self::$image)
        {
            self::$extension = self::$image->getClientOriginalExtension();
            self::$imageName = 'outlet-images'.time().'.'.self::$extension;
            self::$directory = 'outlet-images/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory.self::$imageName;
        }
        else
        {
            return '';
        }
    }

    Public static function newOutlet($request)
    {
        self::$outlet = new Outlet();
        self::$outlet->name = $request->name;
        self::$outlet->phone = $request->phone;
        self::$outlet->latitude = $request->latitude;
        self::$outlet->longitude = $request->longitude;
        self::$outlet->image = self::getImageUrl($request);
        self::$outlet->save();
    }

    public static function updateOutlet($request, $id)
    {
        self::$outlet = Outlet::find($id);

        if (empty(self::$outlet->image))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            if (self::$image = $request->file('image'))
            {
                if (self::$image) {
                    if (file_exists(self::$outlet->image))
                    {
                        unlink(self::$outlet->image);
                    }
                    self::$imageUrl = self::getImageUrl($request);
                }
            }
            else
            {
                self::$imageUrl = self::$outlet->image;
            }
        }

        self::$outlet->name = $request->name;
        self::$outlet->phone = $request->phone;
        self::$outlet->latitude = $request->latitude;
        self::$outlet->longitude = $request->longitude;
        self::$outlet->image = self::$imageUrl;
        self::$outlet->save();

    }

    public static function deleteUser($id)
    {
        self::$outlet = Outlet::find($id);
        if(file_exists(self::$outlet->image))
        {
            if (self::$outlet->image)
            {
                unlink(self::$outlet->image);
            }
        }
        self::$outlet->delete();
    }
}
