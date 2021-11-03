<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Project;

class Modul extends Model
{
use Notifiable;
    protected $fillable = [
       'Module_Name', 'Description','Project_id',
    ];
    public $timestamps = true;

    public function project()
    {
        return $this->belongsTo(Project::class, 'Project_id', 'id');
    }

    public function case()
    {
        return $this->hasMany('module','Modul_id','id');
    }

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
