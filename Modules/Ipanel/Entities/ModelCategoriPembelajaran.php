<?php

namespace Modules\Ipanel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelCategoriPembelajaran extends Model
{
    use HasFactory;

    protected $fillable=[
        'catId','catName','catPermalink','catImage','catDescription'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Ipanel\Database\factories\ModelCategoriPembelajaranFactory::new();
    }
}
