<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait {

		public function uploadImage(Request $request, $inputName, $path)
		{
            if($request->hasFile($inputName)) {
                $image = $request->{$inputName};
                $imageName = time() . rand() . '_' . $image->getClientOriginalName();

                $image->move(public_path($path), $imageName);

                $path = '/uploads/' . $imageName;
                return $path.'/'.$imageName;
            }
            return null;
        }
}