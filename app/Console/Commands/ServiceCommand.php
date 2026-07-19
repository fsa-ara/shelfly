<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\GeneratorCommand;
use Override;

#[Signature('make:service {name}')]
#[Description('Create a new service class')]
class ServiceCommand extends GeneratorCommand
{
    /**
     * 
     */
    #[Override]
    protected function getStub(): string
    {
        return base_path('stubs/service.stub');
    }

    /**
     * 
     */
    #[Override]
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }
}
