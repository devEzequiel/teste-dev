<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\FilterBooksRequest;
use App\Http\Requests\Book\UpdateBookRequest;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class BookController extends Controller
{
    public function __construct(protected BookService $bookService)
    {
    }

    /**
     * Display a listing of the books.
     *
     * @param FilterBooksRequest $request
     * @return JsonResponse
     */
    public function all(FilterBooksRequest $request): JsonResponse
    {
        try {
            $filters = $request->validated();
            $books = $this->bookService->list($filters);

            return $this->responseOk($books);
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBookRequest $request
     * @return JsonResponse
     */
    public function store(CreateBookRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $this->bookService->create($data);

            return $this->responseCreated('Livro adicionado');
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    /**
     * Display the specified book.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $book = $this->bookService->getBook($id);

            return $this->responseOk($books);
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    /**
     * Update the specified book.
     *
     * @param UpdateBookRequest $request
     * @return JsonResponse
     */
    public function update(UpdateBookRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $this->bookService->update($data);

            return $this->responseCreated('Livro atualizado');
        } catch (Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $this->bookService->delete($id);

            return $this->responseAccepted();
        } catch (\Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }
}
