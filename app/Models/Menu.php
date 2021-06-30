<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Null_;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function items(){
        return $this->hasMany(MenuItem::class,'menu_id')->where('parent_id',null)->orderBy('order','asc');
    }
}
