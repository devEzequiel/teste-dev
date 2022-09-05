<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateBookRequest;
use App\Http\Requests\Book\FilterBooksRequest;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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

            if (empty($books)) {
                return $this->responseAccepted('Nenhum livro cadastrado');
            }

            return $this->responseOk($books);
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
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
            $books = $this->bookService->getBook($id);

            if (!$books) {
                return $this->responseAccepted('Livro não encontrado');
            }

            return $this->responseOk($books);
        } catch (\Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }
    /**
     * Update the specified book.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->recipe->deleteRecipe(2);

            return response()->json(['status' => 'success', 'message' => 'Recipe deleted successfully'], 200);
        } catch (DefaultException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], $e->getCode());
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 422);
        }
    }
}
