<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SettingRole;
// use App\Models\SettingRole;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Http\Request;

class SettingRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = SettingRole::all();
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
     * Store a newly created resource in storage.
     */
    //isikan kode berikut
public function store(Request $request)
{
    try {
        //cek apakah request berisi users_id dan roles_id
        $validator = Validator::make($request->all(), [
            'users_id' => 'required',
            'roles_id' => 'required',
        ]);
        
        //kalau tidak akan mengembalikan error
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        
        //kalau ya maka akan membuat setting_roles baru
        $data = SettingRole::create([
            'users_id' => $request->users_id,
            'roles_id' => $request->roles_id,
        ]);
        
        //data akan di kirimkan dalam bentuk response list
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Data berhasil disimpan',
        ];
        
        //jika berhasil maka akan mengirimkan status code 200
        return response()->json($response, 200);
    } catch (Exception $th) {
        $response = [
            'success' => false,
            'message' => 'Gagal Menyimpan Data',
        ];
        //jika error maka akan mengirimkan status code 500
        return response()->json($response, 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
                    //untuk menampilkan data yang di relasikan 
        $data = SettingRole::with('Users', 'Roles')->find($id);
        
            if ($data == null){
                $response = [
                    'success' => false,
                    'message' => 'ID Tidak Ditemukan',
                ];
                return response()->json($response, 500);
            }
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Selamat Datang, Admin',
            ];

            return response()->json($response, 200);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => 'ID Tidak Ditemukan',
            ];
            return response()->json($response, 500);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'users_id' => 'required',
                'roles_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $data = SettingRole::find($id);
            $data->users_id = $request->users_id;
            $data->roles_id = $request->roles_id;
            $data->save();

            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'ID Role berhasil diubah',
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $save = SettingRole::find($id);
            if ($save == null) {
                return response()->json(['success' => false, 'message' => 'Periksa kembali data yang akan di hapus'], 404);
            }
            $save->delete();
            $response = [
                'success' => true,
                'message' => 'ID Role berhasil dihapus',
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
