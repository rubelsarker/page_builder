<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function subItems(){
        return MenuItem::where('parent_id',$this->id)->get();
    }
}
