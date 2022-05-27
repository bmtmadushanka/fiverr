<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationHistory extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'application_history';
    protected $fillable = [
        'column','old','new','edited_by'
    ];
}
