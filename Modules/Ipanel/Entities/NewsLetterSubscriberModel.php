<?php

namespace Modules\Ipanel\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsLetterSubscriberModel extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Ipanel\Database\factories\NewsLetterSubscriberModelFactory::new();
    }
}