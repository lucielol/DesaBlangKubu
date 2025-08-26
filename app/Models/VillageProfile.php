<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_name',
        'district',
        'regency',
        'province',
        'vision',
        'mission',
        'history',
        'area_size',
        'geographic_info',
        'boundaries',
        'topography',
        'climate',
        'head_village_name',
        'secretary_name',
        'treasurer_name',
        'bpd_chairman',
        'bpd_vice_chairman',
        'google_maps_url',
        'logo',
    ];
}
