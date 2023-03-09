<?php

namespace App\Traits;

trait Image
{
    public function imageStore($path,$file)
    {
        if($file)
        {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path($path),$fileName);
            return $fileName;
        }
    }
}
