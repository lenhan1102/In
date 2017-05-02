<?php

namespace App;
use Elasticquent\ElasticquentTrait;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    public $timestamps = false;
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
    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    protected $fillable = ['id', 'mlist_id', 'name', 'price', 'description', 'avatar', 'ordered', 'rating'];

    protected $mappingProperties = array(
        'id' => [
        'type' => 'integer',
        "analyzer" => "standard",
        ],
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
