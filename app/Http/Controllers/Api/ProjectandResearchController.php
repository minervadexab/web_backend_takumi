<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\projectandresearch;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class projectandresearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = projectandresearch::all();
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //isikan kode berikut
        try {                                       
            //cek apakah request berisi nama_role atau tidak
            $validator = Validator::make($request->all(), [
                'judul_project' => 'required|string|max:255|unique:projectandresearch_table',
                'users_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'body' => 'required',
                // 'gelar' => 'required',
                'slug' => 'required|string|unique:projectandresearch_table',
            ]);
            //kalau tidak akan mengembalikan error
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            //logika untuk mengambil image
            $url = null;
            if ($request->image != null) {
            $n = str_replace(' ', '-', $request->image);

            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $url = Storage::url($path);
        }   
            //kalau ya maka akan membuat roles baru
            $data = projectandresearch::create([
                'judul_project' => $request->judul_project,
                'users_id' => $request->users_id,
                'body' => $request->body,
                'image' => $url,
                'slug' => $request->slug
            ]);
            
            //data akan di kirimkan dalam bentuk response list
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Data project and research berhasil di simpan',
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
            $data = projectandresearch::find($id);
            if ($data == null){
                $response = [
                    'success' => false,
                    'message' => 'project and research Tidak Ditemukan',
                ];
                return response()->json($response, 500);
            }
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'ini project and research yang di buat anda',
            ];

            return response()->json($response, 200);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => 'project and research Tidak Ditemukan',
            ];
            return response()->json($response, 500);
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
            $save = projectandresearch::find($id);
            if ($save == null) {
                return response()->json(['success' => false, 'message' => 'Periksa kembali data yang akan di hapus'], 404);
            }
            $save->delete();
            $response = [
                'success' => true,
                'message' => 'project and research berhasil dihapus',
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
}
