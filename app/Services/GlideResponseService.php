<?php

namespace App\Services;

use Illuminate\Http\Response;
use League\Flysystem\FilesystemOperator;
use League\Glide\Responses\ResponseFactoryInterface;

class GlideResponseService implements ResponseFactoryInterface
{
    public function create(FilesystemOperator $cache, string $path): Response
    {
        $content = $cache->read($path);
        $mimeType = $cache->mimeType($path);

        return new Response(
            content: $content,
            headers: [
                'Content-Type' => $mimeType,
            ]
        );
    }
}
