<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','photo', 'summary', 'is_parent','parent_id','status'];

    public static function shiftChild($cat_id){
        return Category::whereIn('id', $cat_id) -> update(['is_parent' => 1]);
    }

    public static function getChildByParentID($id){
        return Category::where('parent_id', $id)->pluck('title', 'id');  //returns only the subcategory title and id

        //return Category::where('parent_id', $id)->get(); //the will return the full sub category details
 }
}


