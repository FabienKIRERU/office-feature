<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Services\PropertyService;
use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index(){
        $properties = $this->propertyService->getPropertiesByUser(Auth::id());
    }

    public function store(Request $request)
    {
        $data['user_id'] = Auth::id();
        $this->propertyService->createProperty($data);
        return redirect()->back()->with('success', 'Propriété ajoutée avec succès.');
    }

    public function update(Request $request, Property $property)
    {
        $data = $request->validate();

        $this->propertyService->updateProperty($property, $data);

        return redirect()->back()->with('success', 'Propriété mise à jour.');
    }

    public function destroy(Property $property)
    {
        $this->propertyService->deleteProperty($property);
        return redirect()->back()->with('success', 'Propriété supprimée.');
    }
}
