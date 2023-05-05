<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $table = 'service_category';
    protected $fillable = ['service_id','category_name_en','description_en','category_name_fr','description_fr','path','photo','status'];
}
