<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subsystem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','system_id'];
    protected $dates = ['deleted_at'];

    public function System()
    {

        return $this->belongsTo(System::class, 'system_id');


    }

}
