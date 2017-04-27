<?php

namespace App;
use Elasticquent\ElasticquentTrait;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    use ElasticquentTrait;

    protected $table = 'dishes';
    public function mlist()
    {
        return $this->belongsTo('App\MList');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    protected $fillable = ['id', 'mlist_id', 'name', 'price', 'description', 'avatar', 'ordered', 'rating', 'created_at', 'updated_at'];
    protected $mappingProperties = array(
        'name' => [
        'type' => 'string',
        "analyzer" => "standard",
        ],
        'price' => [
        'type' => 'string',
        "analyzer" => "standard",
        ],
        'description' => [
        'type' => 'string',
        "analyzer" => "stop",
        "stopwords" => [","]
        ],
        );
    
}
