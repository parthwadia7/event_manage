<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    use HasFactory;
    protected $table = 'service_sub_category';
    protected $fillable = ['service_id','service_category_id','sub_categ_name_en','description_en','sub_categ_name_fr','description_fr','path','photo','status'];
}
