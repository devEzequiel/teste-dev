<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterBooksRequest;
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
     * @param FilterBooksRequest $request
     * @return JsonResponse
     */
    public function all(FilterBooksRequest $request): JsonResponse
    {
        try {
            $filters = $request->validated();
            $books = $this->bookService->getBooks($filters);

            return $this->responseOk($books);
        } catch (\Exception $e) {
            return $this->responseUnprocessableEntity($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipeRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;

        try {
            $recipe = $this->recipe->createRecipe($data);

            return response()->json([
                'data' => ['message' => 'Recipe created successfully!', 'recipe' => $recipe]
            ], 201);
        } catch (DefaultException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], $e->getCode());
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $recipe = $this->recipe->find($id);

            if (!$recipe) {
                return response()->json([
                    'message' => 'This recipe doesn\'t exists'
                ]);
            }

            $recipe = new RecipeResource($recipe);
            return response()->json(['data' => $recipe], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        //vefify if image field is valid
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('images', 'public');

            $data['image'] = $path;
        } else {
            unset($data['image']);
        }

        try {

            $recipe = $this->recipe->updateRecipe($data, $id);

            return response()->json([
                'data' => [
                    'message' => 'Recipe updated successfully!',
                    'recipe' => $recipe
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
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
