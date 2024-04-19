<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogRepo;

    /**
     * Contruct function
     *
     * @param BlogRepositoryInterface $blogRepo BlogRepositoryInterface
     */
    public function __construct(
        BlogRepositoryInterface $blogRepo,
    ) {
        $this->blogRepo = $blogRepo;
    }

    /**
     * Create
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $attributes = [
            'user_id' => $this->getCurrentUser()['id'],
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'slug' => $request->slug
        ];

        $result = $this->blogRepo->create($attributes);

        return $this->successResponse($result);
    }

    /**
     * Update
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $attributes = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'slug' => $request->slug
        ];

        $result = $this->blogRepo->update($request->id, $attributes);

        return $this->successResponse($result);
    }

    /**
     * Get detail
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail(Request $request)
    {
        $result = $this->blogRepo->find($request->id);

        return $this->successResponse($result);
    }

    /**
     * Get all
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $result = $this->blogRepo->getAll();

        return $this->successResponse($result);
    }

    /**
     * Delete
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $result = $this->blogRepo->delete($request->id);

        return $this->successResponse($result);
    }
}
