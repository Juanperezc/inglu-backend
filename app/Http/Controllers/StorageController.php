<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    //
    public function upload(Request $request)
    {
      /*   dd($request); */
      $uploadedFile = $request->file('file');
      $path = $request->input('path');
      $filename = time().$uploadedFile->getClientOriginalName();
      $file = Storage::disk('azure')->putFileAs(
        null/* 'images/'. *//* $filename */,
        $uploadedFile,
        $path ? $path. "/" . $filename : $filename
      );
      $urlFinal = Storage::url($file);
     /*  $path = $request->file('file')->store('avatars'); */
     /*  

      $file = Storage::disk('azure')->putFileAs(
        'images/'.$filename,
        $uploadedFile,
        $filename
      ); */

    /*   $upload = new Upload;
      $upload->filename = $filename;

      $upload->user()->associate(auth()->user());

      $upload->save(); */
      /* dd($request->all()); */
      $url = 'https://' . config('filesystems.disks.azure.name'). '.blob.core.windows.net/' . config('filesystems.disks.azure.container') . '/' . $filename;
    
      return response()->json([
        'data' => $request->all(),
        'path' => $uploadedFile,
        'test' => $request->files,
        'file' => $file,
        "fileUrl" => $url,
        "urlFinal" => $urlFinal
        /* 'path' => $path */
      ]);
    }
}
