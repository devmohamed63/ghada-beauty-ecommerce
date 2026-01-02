<?php

namespace App\Support;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class MediaPathGenerator implements PathGenerator
{
    /**
     * Get path for media file organized by model/date
     * Example: product/2025/01/123/
     *
     * @param Media $media
     * @return string
     */
    public function getPath(Media $media): string
    {
        $modelName = strtolower(class_basename($media->model_type));
        $date = $media->created_at->format('Y/m');
        
        return "{$modelName}/{$date}/{$media->id}/";
    }
    
    /**
     * Get path for image conversions
     *
     * @param Media $media
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }
    
    /**
     * Get path for responsive images
     *
     * @param Media $media
     * @return string
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive/';
    }
}

