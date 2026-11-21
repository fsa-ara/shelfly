<?php

namespace App\Providers;

use App\Services\GlideGeneratorService;
use App\Services\GlideResponseService;
use Illuminate\Support\ServiceProvider;
use League\Glide\Server;
use League\Glide\ServerFactory;
use League\Glide\Signatures\Signature;

class GlideServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(GlideGeneratorService::class, fn() => new GlideGeneratorService(env('GLIDE_KEY')));
        $this->app->singleton(Signature::class, fn() => new Signature(env('GLIDE_KEY')));
        $this->app->singleton(Server::class, function () {
            return ServerFactory::create([
                'response' => new GlideResponseService,
                'source' => storage_path('app/public'),
                'cache' => storage_path('app/.cache'),
                'base_url' => 'storage/images/',
            ]);
        });
    }
}
