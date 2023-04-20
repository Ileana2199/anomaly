<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class System extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','equipment_id'];
    protected $dates=['deleted_at'];

    public function Equipment()
    {
    
        return $this->belongsTo(Equipment::class, 'equipment_id');
        
    }
}
