<?php

namespace Modules\Ipanel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengetahuanCategoryModel extends Model
{
    use HasFactory;

    protected $fillable=[
        # 	catId 	catName 	catShort 	catPermalink 	catDescription 	catImage 	catStatus 	created_at 	updated_at 	
        'catId','catName','catShort','catPermalink','catImage','catDescription','catStatus'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Ipanel\Database\factories\PengetahuanCategoryModelFactory::new();
    }
}
