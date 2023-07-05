<?php

namespace App\Services;

use App\Repositories\Contracts\TransaksiRepositoryInterface;
use App\Services\Contracts\TransaksiServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class TransaksiService implements TransaksiServiceInterface
{
    protected TransaksiRepositoryInterface $repository;

    public function __construct(TransaksiRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getMonthlyTransaction(): Collection
    {
        return $this->repository->getMonthlyTransaction();
    }
}
