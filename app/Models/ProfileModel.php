<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ProfileModel extends Model
{   public function alldata()
    {
    return DB::table('profile')->get();
}
public function addData($data)
{
    return DB::table('profile')->insert($data);
}
public function find($id)
{
    return DB::table("Profile")->where('ID_BARANG',$id)->first();
}
public function editprofile($data,$id)
    {
        return DB::table("profile")
                ->where('ID_BARANG', $id)
                ->update($data);
    }
    public function deleteprofile($id)
    {
    return DB::table("profile")
                ->where('ID_BARANG', $id)
                ->delete();
    }

}
