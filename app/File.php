<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'Case_Name',
        'Bug',
        'Bug_Priority',
        'Bug_Status',
        'file_path'
    ];
}
