<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct(
        private LocationService $locationService
    ) {}

    /**
     * Get cities by governorate ID.
     *
     * @param int $governorateId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities(int $governorateId)
    {
        $cities = $this->locationService->getCitiesByGovernorate($governorateId);

        // Return only Arabic names
        $citiesData = $cities->map(function ($city) {
            return [
                'id' => $city->id,
                'name_ar' => $city->name_ar,
            ];
        });

        return response()->json($citiesData);
    }
}
