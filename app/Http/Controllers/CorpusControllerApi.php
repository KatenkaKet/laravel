<?php

namespace App\Http\Controllers;

use App\Models\Corpus;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CorpusControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index(Request $request)
//    {
//        return response(Corpus::limit($request->perpage ?? 5)->offset(($request->perpage ?? 5)* ($request->page ?? 0))->get());
//    }

    public function index(Request $request) {
        $perPage = $request->input('per_page', 5);
        $page = $request->input('page', 0);
        $offset = $perPage * $page;
        return response(Corpus::limit($perPage)->offset($offset)->get());
    }


    public function total()
    {
        return response(Corpus::all()->count());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Corpus::find($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info("Incoming request data:", $request->all());

        if (! Gate::allows('create-corpus')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление корпуса',
            ], 403); // Используйте код состояния 403 Forbidden
        }

        try {
            $validated = $request->validate([
                'corpus_name' => 'required|unique:corpuses|max:255',
                'image' => 'required|file|image|max:2048',
            ]);

            $file = $request->file('image');
            $fileName = rand(1, 100000). '_'. $file->getClientOriginalName();

            try {
                $path = Storage::disk('s3')->putFileAs('', $file, $fileName);
                $fileUrl = Storage::disk('s3')->url($path);
            } catch (Exception $e) {
                \Log::error("S3 upload error:", ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
                return response()->json([
                    'code' => 2,
                    'message' => 'Ошибка загрузки файла в хранилище S3',
                ], 500); // Используйте код состояния 500 Internal Server Error
            }

            $corpus = Corpus::create([
                'corpus_name' => $validated['corpus_name'],
                'image_url' => $fileUrl,
            ]);

            return response()->json([
                'code' => 0,
                'message' => 'Корпус успешно добавлен',
            ], 201); // Используйте код состояния 201 Created для успешного создания
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error("Validation error:", $e->errors());
            return response()->json([
                'code' => 3,
                'message' => 'Ошибка валидации',
                'errors' => $e->errors(), // Возвращаем все ошибки валидации
            ], 422); // Используйте код состояния 422 Unprocessable Entity
        } catch (\Exception $e) {
            \Log::error("General error:", ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json([
                'code' => 4,
                'message' => 'Ошибка добавления корпуса',
            ], 500); // Используйте код состояния 500 Internal Server Error
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
