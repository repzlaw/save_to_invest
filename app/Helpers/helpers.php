<?php

use Illuminate\Support\Facades\Hash;


//process image function
function process_image($image)
{
    // Get filename with the extension
    $filenameWithExt = $image->getClientOriginalName();
    //get file name with the extension
    $filename = Hash::make(pathinfo($filenameWithExt, PATHINFO_FILENAME));
    //get just extension
    $extension = $image->getClientOriginalExtension();
    
    //filename to store
    $fileNameToStore = $filename.'_'.time().'.'.$extension;

    return $fileNameToStore;
}