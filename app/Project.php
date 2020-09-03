<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Project extends Model
{
use Notifiable;
    protected $fillable = [
       'Project_Title', 'Owner_Name', 'Description',
    ];
    public $timestamps = true;

    public function modul(){
        return $this->hasMany('project','Project_id','id');
    }

}
