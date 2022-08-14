<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecryptRequest;
use Illuminate\Support\Facades\Storage;
use SoareCostin\FileVault\Facades\FileVault;

class DecryptController extends Controller
{
    /**
     * Show encrypt form
     */
    public function show()
    {
        return view('decrypt.show');
    }

    /**
     * decrypt file and download
     */
    public function store(DecryptRequest $request)
    {
        try {
            if ($request->hasFile('file') && $request->file('file')->isValid()) {

                // get file
                $file = $request->file('file');

                // move file to path
                $path = Storage::disk('public')->putFileAs($request->path, $file, $file->getClientOriginalName());

                // file without .enc
                $pathWithoutEnc = substr($path, 0, strlen($path) - 4);
                $extension = explode('.', $pathWithoutEnc)[1];

                // dncrypt file with request name
                FileVault::decrypt($path, "$request->path/$request->name.$extension");

                session()->flash('success', "Decrypted Successfuly.");
            }
            return redirect()->route('home');
        } catch (\Exception $e) {
            session()->flash('error', "Occur error when encrypt file, try again.");
            return redirect()->route('home');
        }
    }
}