<?php

namespace App\Services;

use App\Services\Contracts\BreadcrumbItemServiceInterface;
use Illuminate\Support\Facades\Route;

class BreadcrumbItemService implements BreadcrumbItemServiceInterface
{
    protected string $name = '';

    protected string $icon = '';

    protected string $route = '';

    protected string $routeName = '';

    public static function make(): BreadcrumbItemService
    {
        return new self;
    }

    public function addName(string $name): BreadcrumbItemService
    {
        $this->name = $name;

        return $this;
    }

    public function addIcon(string $icon): BreadcrumbItemService
    {
        $this->icon = $icon;

        return $this;
    }

    public function addRoute(string $route): BreadcrumbItemService
    {
        $this->route = route($route);
        $this->routeName = $route;

        return $this;
    }

    public function addRouteWithParameters(string $route): BreadcrumbItemService
    {
        if (Route::currentRouteName() == $route) {
            $this->route = route($route, Route::getCurrentRoute()->parameters());
        }

        $this->routeName = $route;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function toArray(): array
    {
        $data = [];

        $data['name'] = $this->getName();
        $data['icon'] = $this->getIcon();
        $data['route'] = $this->getRoute();
        $data['active'] = Route::currentRouteName() == $this->routeName;

        return $data;
    }
}
