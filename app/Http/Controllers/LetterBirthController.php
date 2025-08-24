<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\BirthLetter;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class LetterBirthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.letter.birth');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(BirthLetter::rules(), BirthLetter::messages());

        if (BirthLetter::isDuplicated($validated)) {
            return back()->with('error', 'Data sudah ada di database.');
        }

        $birthLetter = BirthLetter::create($validated);

        $templatePath = storage_path('app/private/template/suratketeranganlahir.docx');
        $filename = 'Surat-Kelahiran-' . Str::slug($birthLetter->nama) . '-' . Carbon::now()->translatedFormat('YmdHis');

        $templateProcessor = new TemplateProcessor($templatePath);
        $templateProcessor->setValues([
            'nama' => $birthLetter->nama,
            'tempat_lahir' => $birthLetter->tempat_lahir,
            'tanggal_lahir' => Carbon::parse($birthLetter->tanggal_lahir)->translatedFormat('d F Y'),
            'jenis_kelamin' => $birthLetter->jenis_kelamin,
            'anak_ke' => $birthLetter->anak_ke,
            'nama_ayah' => $birthLetter->nama_ayah,
            'nomor_ktp_ayah' => $birthLetter->nomor_ktp_ayah,
            'tempat_lahir_ayah' => $birthLetter->tempat_lahir_ayah,
            'tanggal_lahir_ayah' => Carbon::parse($birthLetter->tanggal_lahir_ayah)->translatedFormat('d F Y'),
            'agama_ayah' => $birthLetter->agama_ayah,
            'pekerjaan_ayah' => $birthLetter->pekerjaan_ayah,
            'alamat_ayah' => $birthLetter->alamat_ayah,
            'nama_ibu' => $birthLetter->nama_ibu,
            'nomor_ktp_ibu' => $birthLetter->nomor_ktp_ibu,
            'tempat_lahir_ibu' => $birthLetter->tempat_lahir_ibu,
            'tanggal_lahir_ibu' => Carbon::parse($birthLetter->tanggal_lahir_ibu)->translatedFormat('d F Y'),
            'agama_ibu' => $birthLetter->agama_ibu,
            'pekerjaan_ibu' => $birthLetter->pekerjaan_ibu,
            'alamat_ibu' => $birthLetter->alamat_ibu,
            'nomor_pengantar' => $birthLetter->nomor_pengantar,
            'nama_pelapor' => $birthLetter->nama_pelapor
        ]);

        $docxPath = storage_path("app/public/suratkelahiran/{$filename}.docx");
        if (!Storage::disk('public')->exists('suratkelahiran')) {
            Storage::disk('public')->makeDirectory('suratkelahiran');
        }

        $templateProcessor->saveAs($docxPath);

        $birthLetter->update(['filename' => "{$filename}.docx"]);

        return redirect()->back()->with('success', 'Surat Kelahiran berhasil dibuat.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
