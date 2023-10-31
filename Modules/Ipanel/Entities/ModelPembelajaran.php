<?php

namespace Modules\Ipanel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelPembelajaran extends Model
{
    use HasFactory;
    #id 	user_id 	catId 	pmTitle 	pmPermalink 	pmImage 	pmDescription 	pmEstimation 	pmStatus 	created_at 	updated_at 	
    protected $fillable=[
        'id','user_id','catId','pmTitle','pmPermalink','pmImage','pmDescription','pmEstimation','pmStatus',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Ipanel\Database\factories\ModelPembelajaranFactory::new();
    }
}
