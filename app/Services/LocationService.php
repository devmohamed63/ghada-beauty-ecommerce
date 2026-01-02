<?php

namespace App\Services;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Collection;

class LocationService
{
    /**
     * Get all governorates.
     *
     * @return Collection
     */
    public function getAllGovernorates(): Collection
    {
        return Governorate::orderBy('name_ar')->get();
    }

    /**
     * Get cities by governorate ID.
     *
     * @param int $governorateId
     * @return Collection
     */
    public function getCitiesByGovernorate(int $governorateId): Collection
    {
        return City::where('governorate_id', $governorateId)
            ->orderBy('name_ar')
            ->get();
    }

    /**
     * Get governorate by ID.
     *
     * @param int $id
     * @return Governorate|null
     */
    public function getGovernorateById(int $id): ?Governorate
    {
        return Governorate::find($id);
    }

    /**
     * Get city by ID.
     *
     * @param int $id
     * @return City|null
     */
    public function getCityById(int $id): ?City
    {
        return City::with('governorate')->find($id);
    }
}

