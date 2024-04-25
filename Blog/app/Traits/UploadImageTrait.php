<?php
namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str ;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait {
    public function uploadImage(Request $request, $fieldname = 'image', $folder) {
        if ($request->hasFile($fieldname) && $request->file($fieldname)->isValid()) {
            $image = $request->file($fieldname);
            $extension =  $image->getClientOriginalExtension();
            $imageName = time() . rand(0, 999) . "." . $extension;

            // Create the directory if it doesn't exist
            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            return $image->storeAs($folder, $imageName, 'public');
        }
        return null;
    }
}

