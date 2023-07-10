<?php

namespace App\Services\Contracts;

use App\Services\BreadcrumbItemService;
use App\Services\BreadcrumbService;

interface BreadcrumbServiceInterface
{
    public function register(string $route, BreadcrumbItemService $breadcrumbItem): BreadcrumbService;

    public function registerUsing(string $route, string $existingRoute): BreadcrumbService;

    public function resolve(): array;

    public function getMappingRoute(): array;
}
