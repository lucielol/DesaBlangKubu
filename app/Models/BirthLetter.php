<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirthLetter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'anak_ke',
        'nama_ayah',
        'nomor_ktp_ayah',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'agama_ayah',
        'pekerjaan_ayah',
        'alamat_ayah',
        'nama_ibu',
        'nomor_ktp_ibu',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'agama_ibu',
        'pekerjaan_ibu',
        'alamat_ibu',
        'nomor_pengantar',
        'nama_pelapor',
        'filename'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_lahir_ayah' => 'date',
        'tanggal_lahir_ibu' => 'date',
        'anak_ke' => 'integer',
    ];

    /**
     * Validating rules
     * 
     * @return array
     */
    public static function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'anak_ke' => 'required|integer|min:1',
            
            // Ayah
            'nama_ayah' => 'required|string|max:255',
            'nomor_ktp_ayah' => 'required|digits:16|numeric',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tanggal_lahir_ayah' => 'required|date',
            'agama_ayah' => 'nullable|string|max:50',
            'pekerjaan_ayah' => 'nullable|string|max:100',
            'alamat_ayah' => 'nullable|string',
            
            // Ibu
            'nama_ibu' => 'required|string|max:255',
            'nomor_ktp_ibu' => 'required|digits:16|numeric',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tanggal_lahir_ibu' => 'required|date',
            'agama_ibu' => 'nullable|string|max:50',
            'pekerjaan_ibu' => 'nullable|string|max:100',
            'alamat_ibu' => 'nullable|string',
            
            // Surat Pengantar
            'nomor_pengantar' => 'nullable|string|max:100',
            'nama_pelapor' => 'required|string|max:255',
        ];
    }

    /**
     * Custom error messages for validation
     * 
     * @return array
     */
    public static function messages()
    {
        return [
            'nomor_ktp_ayah.digits' => 'Nomor KTP Ayah harus terdiri dari 16 digit angka',
            'nomor_ktp_ibu.digits' => 'Nomor KTP Ibu harus terdiri dari 16 digit angka',
            'anak_ke.min' => 'Anak ke- tidak boleh kurang dari 1',
        ];
    }

    /**
     * Check record when duplicate
     * 
     * @return Object
     */
    public static function isDuplicated($data)
    {
        return self::where('nama', $data['nama'])
            ->where('tanggal_lahir', $data['tanggal_lahir'])
            ->exists();
    }
}
