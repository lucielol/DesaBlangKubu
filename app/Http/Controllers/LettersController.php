<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Models\BirthLetter;
use App\Models\DeathLetter;

class LettersController extends Controller
{
    public function index() 
    {
        $birthLetters = BirthLetter::latest()->paginate(10);
        $deathLetters = [];
        
        return view('pages.letter.index', compact('birthLetters', 'deathLetters'));
    }

    public function download($type, $id)
    {
        if ($type === 'birth') {
            $letter = BirthLetter::findOrFail($id);
            $filename = $letter->filename;

            if (Storage::disk('public')->exists("suratkelahiran/{$filename}")) {
                return Storage::disk('public')->download("suratkelahiran/{$filename}");
            } else {
                return response()->json(['message' => 'File tidak ditemukan'], Response::HTTP_NOT_FOUND);
            }
        } elseif ($type === 'death') {
            
        }

        return response()->json(['message' => 'Tipe tidak valid'], Response::HTTP_BAD_REQUEST);
    }
}
