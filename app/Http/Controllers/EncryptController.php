<?php

namespace App\Http\Controllers;

use App\Http\Requests\EncryptRequest;
use Illuminate\Support\Facades\Storage;
use SoareCostin\FileVault\Facades\FileVault;

class EncryptController extends Controller
{
    /**
     * Show encrypt form
     */
    public function show()
    {
        return view('encrypt.show');
    }

    /**
     * Store file encrypted
     */
    public function store(EncryptRequest $request)
    {
        try {
            if ($request->hasFile('file') && $request->file('file')->isValid()) {

                // get file request
                $file = $request->file('file');

                // store file informations
                $ex = $file->getClientOriginalExtension();
                $file_data = [
                    'name'      => $file->getClientOriginalName(),
                    'extension' => $ex,
                    'size'      => $file->getSize()
                ];

                // move file to path
                $path = Storage::disk('public')->putFileAs($request->path, $file, $request->name . '.' . $ex);

                // encrypt file uploaded
                FileVault::encrypt($path);

                // save data in session to show in home
                session()->flash('success', "Encrypted Successfuly.");
                session()->flash('file_data', $file_data);
            }
            return redirect()->route('home');
        } catch (\Exception $e) {
            session()->flash('error', "Occur error when encrypt file, try again.");
            return redirect()->route('home');
        }
    }
}