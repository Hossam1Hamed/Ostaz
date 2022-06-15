<?php

namespace App\Traits;

trait HelperTrait
{
    public function uploadImages($imageRequest, $placeMove)
    {
        $img = time() . md5(uniqid()) . "." . $imageRequest->guessExtension();
        $path = $imageRequest->storeAs($placeMove, $img, 'public');

        return  '/storage/'.$path;
    }

}
