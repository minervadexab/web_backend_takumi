<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\news;
use App\Models\Prodi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = news::all();
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

    public function getNewsUser()
    {
        try {
            $data = news::all();
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
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'judul_berita' => 'required|string|max:255|unique:news_table',
                'users_id' => 'required|exists:users,id',
                'body' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:12820',
                'slug' => 'required|string|unique:news_table',
            ]);

            // Jika validasi gagal, kembalikan error
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Ambil data user berdasarkan ID
            $user = User::find($request->users_id);
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan.',
                ], 404);
            }

            // Ambil prodi_id dari user
            $prodi_id = $user->prodi_id;

            // Proses upload image (jika ada)
            $fullpath = null;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = $file->store('images', 'public');
                $fullpath = env('APP_URL') . Storage::url($path);
            }

            // Simpan data ke tabel news
            $data = news::create([
                'judul_berita' => $request->judul_berita,
                'user_id' => $request->users_id,
                'prodi_table_id' => $prodi_id,
                'body' => $request->body,
                'deskripsi' => $request->deskripsi,
                'image' => $fullpath,
                'slug' => $request->slug,
            ]);

            // Kembalikan response sukses
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Data berita berhasil disimpan',
            ], 200);
        } catch (Exception $th) {
            // Tangkap error dan kembalikan response
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = news::find($id);
            if ($data == null){
                $response = [
                    'success' => false,
                    'message' => 'berita Tidak Ditemukan',
                ];
                return response()->json($response, 500);
            }
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'ini berita yang di buat anda',
            ];

            return response()->json($response, 200);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => 'berita Tidak Ditemukan',
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
            $save = news::find($id);
            if ($save == null) {
                return response()->json(['success' => false, 'message' => 'Periksa kembali data yang akan di hapus'], 404);
            }
            $save->delete();
            $response = [
                'success' => true,
                'message' => 'news berhasil dihapus',
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
