<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villageProfile = VillageProfile::first();
        return view('pages.home.profile', compact('villageProfile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the village profile.
     */
    public function edit()
    {
        $villageProfile = VillageProfile::first();
        return view('pages.profile.edit', compact('villageProfile'));
    }

    /**
     * Update the village profile.
     */
    public function update(Request $request)
    {
        $request->validate([
            'village_name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'history' => 'required|string',
            'area_size' => 'required|string|max:255',
            'geographic_info' => 'required|string',
            'boundaries' => 'required|string',
            'topography' => 'required|string|max:255',
            'climate' => 'required|string|max:255',
            'head_village_name' => 'required|string|max:255',
            'secretary_name' => 'required|string|max:255',
            'treasurer_name' => 'required|string|max:255',
            'bpd_chairman' => 'required|string|max:255',
            'bpd_vice_chairman' => 'required|string|max:255',
            'google_maps_url' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $villageProfile = VillageProfile::first();

        if (!$villageProfile) {
            $villageProfile = new VillageProfile();
        }

        $data = $request->except('logo');

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($villageProfile->logo && Storage::disk('public')->exists($villageProfile->logo)) {
                Storage::disk('public')->delete($villageProfile->logo);
            }

            $data['logo'] = $request->file('logo')->store('village-profile', 'public');
        }

        $villageProfile->fill($data);
        $villageProfile->save();

        return redirect()->route('dashboard.profile.edit')->with('success', 'Profil desa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
