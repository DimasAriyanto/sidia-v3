<?php

namespace App\Services;

use App\Services\Contracts\BreadcrumbServiceInterface;
use Exception;
use Illuminate\Routing\Route;

class BreadcrumbService implements BreadcrumbServiceInterface
{
    protected string $currentRoute;

    protected array $mappingRoute = [];

    public function __construct(Route $route)
    {
        $this->currentRoute = $route->getName();
    }

    public function register(string $route, BreadcrumbItemService $breadcrumbItem): BreadcrumbService
    {
        if (! isset($this->mappingRoute[$route])) {
            $this->mappingRoute[$route] = [];
        }

        array_push($this->mappingRoute[$route], $breadcrumbItem);

        return $this;
    }

    public function registerUsing(string $route, string $existingRoute): BreadcrumbService
    {
        if (! isset($this->mappingRoute[$existingRoute])) {
            throw new Exception(sprintf('route %s tidak terdaftar di breadcrumb', $existingRoute));
        }

        if (! isset($this->mappingRoute[$route])) {
            $this->mappingRoute[$route] = [];
        }

        $this->mappingRoute[$route] = array_merge($this->mappingRoute[$route], $this->mappingRoute[$existingRoute]);

        return $this;
    }

    public function resolve(): array
    {
        if (! isset($this->mappingRoute[$this->currentRoute])) {
            return [];
        }

        return array_map(
            fn (BreadcrumbItemService $breadcrumbItem) => $breadcrumbItem->toArray(),
            $this->mappingRoute[$this->currentRoute]
        );
    }

    public function getMappingRoute(): array
    {
        return $this->mappingRoute;
    }
}
