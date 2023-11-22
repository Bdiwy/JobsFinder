<?php 
namespace App\Traits;


trait FileUpload
{


    
public static function Fupload($request,$nameFromForm,$folder,$driver){

    $img = $request->file("$nameFromForm")->getClientOriginalName();
    $path=$request->file("$nameFromForm")->storeAs($folder,$img,"$driver");
    return $img; 
}
}
