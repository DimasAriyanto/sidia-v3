<?php

namespace App\Services\Contracts;

use App\Services\BreadcrumbItemService;

interface BreadcrumbItemServiceInterface
{
    public static function make(): BreadcrumbItemService;

    public function addName(string $name): BreadcrumbItemService;

    public function addIcon(string $icon): BreadcrumbItemService;

    public function addRoute(string $route): BreadcrumbItemService;

    public function addRouteWithParameters(string $route): BreadcrumbItemService;

    public function getName(): string;

    public function getIcon(): string;

    public function getRoute(): string;

    public function getRouteName(): string;

    public function toArray(): array;
}
