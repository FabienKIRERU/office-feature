<?php

namespace App\Http\Controllers\Byer;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Services\PropertyService;
use App\Http\Controllers\Controller;
use App\Models\Property;

class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index()
    {
        $properties = $this->propertyService->getAllProperties();
    }

    public function show(int $id)
    {
        $property = $this->propertyService->getPropertyDetails($id);
    }
}
