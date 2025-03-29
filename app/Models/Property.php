<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Category;
use App\Models\PropertyImage;

class Property extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'user_id', 
        'name', 
        'description', 
        'price', 
        'stock', 
        'status'
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'property_category');
    }

    public function images() {
    return $this->hasMany(PropertyImage::class);
}

}
