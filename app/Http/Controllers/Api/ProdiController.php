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
        //isikan kode berikut
        try {                                           
            //cek apakah request berisi nama_role atau tidak
            $validator = Validator::make($request->all(), [
                'prodi' => 'required|string|max:255|unique:prodi',
                'deskripsi' => 'required',
                'slug' => 'required',
            ]);
            
            //kalau tidak akan mengembalikan error
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            
            //kalau ya maka akan membuat roles baru
            $data = Prodi::create([
                'prodi' => $request->jenis_akademik,
                'deskripsi' => $request->deskripsi,
                'slug' => $request->slug
            ]);
            
            //data akan di kirimkan dalam bentuk response list
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Data berhasil di simpan',
            ];
            
            //jika berhasil maka akan mengirimkan status code 200
            return response()->json($response, 200);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => $th,
            ];
            //jika error maka akan mengirimkan status code 500
            return response()->json($response, 500);
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
