<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'doctor';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'specialist_id',
        'name',
        'fee',
        'photo',
        'updated_at',
        'deleted_at',
    ];

    public function specialist(){
        // 3 parameter (path model, field foreign key, field primary key dari table hasmany/hasone)
        return $this->belongsTo('App\Models\MasterData\Specialist', 'specialist_id', 'id');
    }

    public function appointment(){
        //2 parameter (path models, field foreign key)
        return $this->hasMany('App\Models\Operational\Appointment', 'doctor_id');
    }
}
