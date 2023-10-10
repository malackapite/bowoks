<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;

    public $incrementing=false;
    protected $primaryKey=["start", "user_id", "copy_id"];
    protected $fillable=["start", "user_id", "copy_id"];

    protected function setKeysForSaveQuery($query)
    {
        $query
        ->where('user_id', '=', $this->getAttribute('user_id'))
        ->where('copy_id', '=', $this->getAttribute('copy_id'))
        ->where('start', '=', $this->getAttribute('start'));

    }
}
