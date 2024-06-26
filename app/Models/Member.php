<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    protected $table = 'members';

    public $timestamps = false;
    protected $fillable = [
        'CreatedDate', 'Name', 'ParentId'
    ];
}
