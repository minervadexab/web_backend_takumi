<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Prodi::all();
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Data tersedia',
            ];        
            return response()->json($response, 200);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => $th,
            ];
            return response()->json($response, 500);
        }   
    }
    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'prodi' => 'required|string|max:255|unique:prodi_table',
                'deskripsi' => 'required|string',
                'slug' => 'required|string|unique:prodi_table',
            ]);

            // Jika validasi gagal, kirimkan respons error
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Simpan data ke database
            $data = Prodi::create([
                'prodi' => $request->input('prodi'),
                'deskripsi' => $request->input('deskripsi'),
                'slug' => $request->input('slug'),
            ]);

            // Kirimkan respons sukses
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Data berhasil disimpan',
            ], 201);
        } catch (Exception $e) {
            // Jika terjadi kesalahan, kirimkan respons error
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Prodi::find($id);
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Data tersedia',
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'data' => null,
                'message' => 'Data tidak tersedia',
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     //
    // }

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
        try {
            $data = Prodi::find($id);
            $data->delete();
            $response = [
                'success' => true,
                'data' => null,
                'message' => 'Data berhasil dihapus',
            ];
            return response()->json($response, 200);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'data' => null,
                'message' => $th,
            ];
            return response()->json($response, 500);
        }
    }
}
