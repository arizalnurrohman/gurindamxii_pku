<?php

namespace Modules\Front\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatBacaModel extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Front\Database\factories\RiwayatBacaModelFactory::new();
    }
}
