<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    public $table = "tbl_user_permissions";
    public $primaryKey = "user_permission_auto_id";
    
}

