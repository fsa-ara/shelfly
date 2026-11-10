<?php

namespace App\Services;

use League\Glide\Urls\UrlBuilder;
use League\Glide\Urls\UrlBuilderFactory;

class GlideGeneratorService
{
    private UrlBuilder $urlBuilder;

    public function __construct(string $signature)
    {
        $this->urlBuilder = UrlBuilderFactory::create('/storage/images/', $signature);
    }

    public function makePath(string $path, int $width, ?int $height = null): string
    {
        return $this->urlBuilder->getUrl($path, [
            'w' => $width,
            'h' => $height ?? $width,
            'fm' => 'webp',
        ]);
    }
}
