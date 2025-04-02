<?php

namespace App\Repositories;

use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Collection;

class PropertyImageRepository {

    protected $propertyImage;

    public function __construct(?PropertyImage $propertyImage = null)
    {
       $this->propertyImage = $propertyImage ?? new PropertyImage();
    }
    
    public function getByPropertyId(int $propertyId): Collection {
        return PropertyImage::where('property_id', $propertyId)->get();
    }

    public function create(array $data): PropertyImage {
        return PropertyImage::create($data);
    }

    public function delete(PropertyImage $image): bool {
        return $image->delete();
    }
}
