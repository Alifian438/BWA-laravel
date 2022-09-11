<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'permissions_role';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permission(){
        // 3 parameter (path model, field foreign key, field primary key dari table hasmany/hasone)
        return $this->belongsTo('App\Models\ManagementAccess\Permission', 'permission_id', 'id');
    }

    public function role(){
        // 3 parameter (path model, field foreign key, field primary key dari table hasmany/hasone)
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }
    

}
