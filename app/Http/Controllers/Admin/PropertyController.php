<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index(){
        $properties = $this->propertyService->getAllProperties();
        // return Inertia::render('Admin/Properties/Index',[
        //     'properties' => $properties,
        // ]);
    }

    public function delete(Property $property){
        $this->propertyService->deleteProperty($property);
        return redirect()->back()->with('success', 'Propriété supprimée avec succès.');
    }
}
