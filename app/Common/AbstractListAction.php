<?php

namespace App\Common;

use App\Traits\HasApiResource;
use App\Common\NewQueryTrait;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractListAction
{
    use NewQueryTrait;
    use HasApiResource;

    protected int $defaultPagination = 10;

    public function setPaginationLength(int $length)
    {
        $this->defaultPagination = $length;
        return $this;
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->getQuery()->get();
    }

    /**
     * @return Paginator
     */
    public function paginate(): Paginator
    {
        return $this->getQuery()->paginate($this->defaultPagination);
    }

    /**
     * @return Paginator|Collection
     */
    public function listOrPaginate(): Paginator|Collection
    {
        if (request()->has('all')) {
            return $this->get();
        } else {
            return $this->paginate();
        }
    }
}
