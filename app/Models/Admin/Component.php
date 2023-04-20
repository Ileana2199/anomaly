<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','subsystem_id'];
    protected $dates=['deleted_at'];
    
    public function Subsystem()
    {
    
        return $this->belongsTo(Subsystem::class, 'subsystem_id');
        
    }
    
}
