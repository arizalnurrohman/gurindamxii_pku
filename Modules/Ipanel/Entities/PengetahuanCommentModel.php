<?php

namespace Modules\Ipanel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengetahuanCommentModel extends Model
{
    use HasFactory;

    protected $fillable=[
        'cmId','pgId','id_user','cmParent','cmComment','cmAddedDate','cmAddedDate','cmSort'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Ipanel\Database\factories\PengetahuanCommentModelFactory::new();
    }
}
