<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use Illuminate\Validation\Rule;

class KategoriController extends Controller
{

    // ARTIKEL
    public function kategori_permainan_list()
    {
        role_diizinkan('0|1|2|3');
        $respon = DB::table('kategori_permainan')->orderBy('id_kategori', 'asc')->get();

        return view('admin.kategori_list', ['list' => $respon]);
    }

    public function kategori_permainan_tambah()
    {
        role_diizinkan('1');
        return view('admin.kategori_tambah');
    }

    public function kategori_permainan_tambah_proses(Request $request)
    {
        role_diizinkan('1');

        DB::table('kategori_permainan')->insert(
            [
                'nama_kategori' => $request->input('nama_kategori'),
            ]
        );
        return redirect()->route('kategori_permainan_list')->with('notif', 'Data berhasil disimpan')->with('notif_type', 'success');
    }

    public function kategori_permainan_hapus_proses($id_kategori)
    {
        role_diizinkan('1');
        DB::table('kategori_permainan')->where('id_kategori', '=', $id_kategori)->delete();
        return redirect()->back()->with('notif', 'Kategori berhasil dihapus');
    }

    public function kategori_permainan_ubah($id_kategori)
    {
        role_diizinkan('1');
        $data = DB::table('kategori_permainan')->where('id_kategori', $id_kategori)->get()->first();
        if (empty($data)) {
            abort(404);
            return redirect()->guest('/errorpage');
        }
        return view('admin.kategori_edit', ['data' => $data]);
    }

    public function kategori_permainan_ubah_proses(Request $req, $id_kategori)
    {
        role_diizinkan('1');
        DB::table('kategori_permainan')
            ->where('id_kategori', $id_kategori)
            ->update(
                [
                    'nama_kategori' => $req->nama_kategori
                ]
            );

        return redirect()->route('kategori_permainan_list')->with('notif', 'Data berhasil diubah');
    }
}
