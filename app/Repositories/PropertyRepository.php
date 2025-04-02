<?php

namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;

class PropertyRepository {
    
    protected $property;

    public function __construct(?Property $property = null)
    {
        $this->property = $property ?? new Property();
    }
    
    public function getAll(): Collection {
        return Property::with(['category', 'user', 'images'])->latest()->get();
    }

    public function findById(int $id): ?Property {
        return Property::with(['category', 'user', 'images'])->findOrFail($id);
    }

    public function getByCategory(int $categoryId): Collection {
        return Property::where('category_id', $categoryId)->with(['images'])->get();
    }

    public function create(array $data): Property {
        return Property::create($data);
    }

    public function update(Property $property, array $data): Property {
        $property->update($data);
        return $property;
    }

    public function delete(Property $property): bool {
        return $property->delete();
    }
}
