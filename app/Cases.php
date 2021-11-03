<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modul;

class Cases extends Model
{
    use Notifiable;
    protected $fillable = [
       'Case_Name', 'Des_case', 'Bug_Priority', 'Bug_Status','file_path','Modul_id', 'namaFile'
    ];
    public $timestamps = true;

    public function module(){
        return $this->belongsTo(Modul::class, 'Modul_id','id');
    }

    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
