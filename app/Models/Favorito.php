<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Beca;

#[Table(name:'beca_user')]
class Favorito extends Model
{
    protected $table = 'beca_user';
    protected $fillable = [
        'user_id', 'beca_id'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function beca(){
        return $this->belongsTo(Beca::class,'beca_id');
    }
}
