<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Glide\Server;
use League\Glide\Signatures\Signature;

class GlideController extends Controller
{
    public function show(Request $request, Server $server, Signature $signature, string $path): Response
    {
        $signature->validateRequest($request->path(), $request->all());

        return $server->getImageResponse($path, $request->all());
    }
}
