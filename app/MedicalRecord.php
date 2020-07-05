<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    //
    use SoftDeletes;

    protected $casts = [
        'pathologies' => 'array'
    ];
    /* protected $fillable = [
        "blood_type",
        "patient_status",
        "pathologies",
        "treatments",
        "record",
    ]; */
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
