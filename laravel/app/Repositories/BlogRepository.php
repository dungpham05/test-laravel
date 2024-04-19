<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Repositories\Repository;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogRepository extends Repository implements BlogRepositoryInterface
{
    /**
     * GetModel function
     *
     * @return void
     */
    public function getModel()
    {
        return Blog::class;
    }
}
