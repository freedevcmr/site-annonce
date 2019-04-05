<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'texte',
        'category_id',
        'region_id',
        'user_id',
        'departement',
        'commune',
        'commune_name',
        'commune_postal',
        'pseudo',
        'email',
        'limit',
        'active',
    ];



    //un annonce a partion a une region
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    //un annonce a partion a une categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //un annonce a 1 ou plusieurs image-upload)
    public function photos()
    {
        return $this->hasMany(Upload::class);
    }
}
