<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Equipment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title','area_id'];
    protected $dates=['deleted_at'];


    public $table = 'equipments';

    
    public function Area()
    {
    
        return $this->belongsTo(Area::class, 'area_id');
        
    }
}
