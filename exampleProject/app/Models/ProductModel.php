<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = "tblProduct";
    protected $primaryKey ='pid';
    public $incrementting = false;
    protected $keyType = 'string';
    
    public function hasOrderDetail(){
        return $this->hasMany(OrderDetailModel::class,'pid','odid');
    }
}
