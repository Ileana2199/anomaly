<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','unit_id'];
    protected $dates=['deleted_at'];

    public function Unit()
    {
    
        return $this->belongsTo(Unit::class, 'unit_id');
        
    }
    

}

