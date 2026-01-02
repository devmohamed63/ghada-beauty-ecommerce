<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GeneratePwaIcons extends Command
{
    protected $signature = 'pwa:generate-icons';
    protected $description = 'Generate PWA icons from a base image';

    public function handle()
    {
        $this->info('Generating PWA icons...');
        
        $sizes = [16, 32, 72, 96, 128, 144, 152, 192, 384, 512];
        $iconsDir = public_path('icons');
        
        if (!File::exists($iconsDir)) {
            File::makeDirectory($iconsDir, 0755, true);
        }
        
        // Check if ImageMagick or GD is available
        if (!extension_loaded('gd') && !extension_loaded('imagick')) {
            $this->error('GD or ImageMagick extension is required!');
            $this->info('Please install one of these extensions or generate icons manually using generate-icons.html');
            return 1;
        }
        
        // Create a simple icon using GD
        foreach ($sizes as $size) {
            $image = imagecreatetruecolor($size, $size);
            
            // Create gradient background
            $pink = imagecolorallocate($image, 236, 72, 153); // #ec4899
            $teal = imagecolorallocate($image, 20, 184, 166); // #14b8a6
            $white = imagecolorallocate($image, 255, 255, 255);
            
            // Fill with gradient (simplified - solid pink for now)
            imagefilledrectangle($image, 0, 0, $size, $size, $pink);
            
            // Add white circle
            $circleSize = $size * 0.35;
            imagefilledellipse($image, $size/2, $size/2, $circleSize, $circleSize, $white);
            
            // Add icon (dashboard grid)
            $iconColor = $pink;
            $gridSize = $size * 0.15;
            $centerX = $size / 2;
            $centerY = $size / 2;
            
            // Draw 2x2 grid
            $offset = $gridSize / 2;
            imagefilledrectangle($image, $centerX - $gridSize - $offset, $centerY - $gridSize - $offset, $centerX - $offset, $centerY - $offset, $iconColor);
            imagefilledrectangle($image, $centerX + $offset, $centerY - $gridSize - $offset, $centerX + $gridSize + $offset, $centerY - $offset, $iconColor);
            imagefilledrectangle($image, $centerX - $gridSize - $offset, $centerY + $offset, $centerX - $offset, $centerY + $gridSize + $offset, $iconColor);
            imagefilledrectangle($image, $centerX + $offset, $centerY + $offset, $centerX + $gridSize + $offset, $centerY + $gridSize + $offset, $iconColor);
            
            $filename = $iconsDir . "/icon-{$size}x{$size}.png";
            imagepng($image, $filename);
            imagedestroy($image);
            
            $this->info("Generated: icon-{$size}x{$size}.png");
        }
        
        $this->info('All icons generated successfully!');
        return 0;
    }
}

