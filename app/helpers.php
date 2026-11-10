<?php

use App\Services\GlideGeneratorService;

function glideImage(string $path, int $width, ?int $height = null): string
{
    return app(GlideGeneratorService::class)->makePath($path, $width, $height);
}
