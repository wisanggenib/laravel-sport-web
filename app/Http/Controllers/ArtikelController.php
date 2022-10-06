<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use Illuminate\Validation\Rule;

class ArtikelController extends Controller
{
    // KATEGORI
    public function pengelola_kat_artikel_list (){
        role_diizinkan('2');
        $list = DB::table('artikel_kategori')->get();
        return view('admin.kat_artikel_list', ['list'=> $list]);
    }

    public function pengelola_kat_artikel_tambah (){
        role_diizinkan('2');
        return view('admin.kat_artikel_tambah');
    }

    public function pengelola_kat_artikel_tambah_proses(Request $request){
        role_diizinkan('2');
        $validation = $request->validate([
            'nama' => 'required|max:50'
        ]);

        DB::table('artikel_kategori')->insert(
            [
                'id_artikel_kategori' => Str::uuid(), 
                'nama_kategori' => $request->nama
            ]
        );
        return redirect()->route('pengelola_artikel_kat_list')->with('notif', 'Data berhasil disimpan')->with('notif_type', 'success');
    }

    public function pengelola_kat_artikel_edit($id_kategori){
        role_diizinkan('2');
        $data = DB::table('artikel_kategori')->where('id_artikel_kategori', $id_kategori)->get()->first();
        if (empty($data)) {
            abort(404);
            return redirect()->guest('/errorpage');
        }
        return view('admin.kat_artikel_edit', ['data'=>$data]);
    }


    public function pengelola_kat_artikel_edit_proses(Request $req, $id_kategori){
        role_diizinkan('2');
        $validation = $req->validate([
            'nama' => 'max:50'
        ]);
        
        DB::table('artikel_kategori')
        ->where('id_artikel_kategori', $id_kategori)
        ->update([
                'nama_kategori' => $req->nama
            ]
        );

        return redirect()->route('pengelola_artikel_kat_list')->with('notif', 'Data berhasil diubah');

    }


    public function pengelola_kat_artikel_hapus_proses($id_kategori){
        role_diizinkan('2');
        $count = DB::table('artikel')->where('id_artikel_kategori', $id_kategori)->count();
        if ($count > 0) {
            return redirect()->route('pengelola_artikel_kat_list')->with('notif', 'Data tidak bisa dihapus, karena masih ada artikel yang memiliki kategori tersebut')
            ->with('notif_type', 'danger');
        }

        DB::table('artikel_kategori')->where('id_artikel_kategori', $id_kategori)->delete();

        return redirect()->route('pengelola_artikel_kat_list')->with('notif', 'Data berhasil dihapus');
    }


    // ARTIKEL
    public function pengelola_artikel_list(){
        role_diizinkan('0|1|2|3');
        kelola_artikel();

        // if (session('level') == 1 OR session('level') == 2) {
        //     $query = DB::table('artikel')
        //     ->join('user AS p1', 'artikel.created_by', '=', 'p1.id_user')
        //     ->leftjoin('user AS p2', 'artikel.approved_by', '=', 'p2.id_user')
        //     ->select('artikel.*', 'p1.nama_user AS dibuat', 'p2.nama_user AS ditanggapi');
            
        //     if (@$_GET['list'] == "persetujuan") {
        //         $query->where('artikel.status_approved', 'Menunggu');
        //     }elseif(@$_GET['list'] == "ditolak"){
        //         $query->where('artikel.status_approved', 'Ditolak');
        //     }else{
        //         $query->where('artikel.status_approved', 'Tayang');
        //     }

        //     $respon = $query->get();
        // }else{
        //     $respon = DB::table('artikel')
        //     ->join('user AS p1', 'artikel.created_by', '=', 'p1.id_user')
        //     ->leftjoin('user AS p2', 'artikel.approved_by', '=', 'p2.id_user')
        //     ->where('artikel.created_by',session('id'))
        //     ->select('artikel.*', 'p1.nama_user AS dibuat', 'p2.nama_user AS ditanggapi')->get();
        // }

        $query = DB::table('artikel')
            ->join('user AS p1', 'artikel.id_user', '=', 'p1.id_user');

        if (session('level') == "2") {
            $query->where('artikel.id_user', session('id'));
        }

        $respon = $query->get();

        $persetujuan = DB::table('artikel')->count();

        return view('admin.artikel_list', ['list'=> $respon, 'persetujuan' => $persetujuan]);
    }

    public function pengelola_artikel_tambah(){
        role_diizinkan('1|2');
        kelola_artikel();
        return view('admin.artikel_tambah');
    }

    public function pengelola_artikel_tambah_proses(Request $req){
        role_diizinkan('1|2');
        kelola_artikel();
        $validation = $req->validate([
            'judul' => 'required|max:200',
            'kategori' => 'required',
            'konten' => 'required',
            'foto_thumbnail' => 'required|mimes:jpg,jpeg,png|max:1024',
        ]);

        $destination = "public/images/artikel";
        $file_name = Str::uuid().".".$req->foto_thumbnail->extension();
        $path = $req->foto_thumbnail->storeAs($destination, $file_name);
        if($path){
            DB::table('artikel')->insert(
                [
                    'id_user' => session('id'), 
                    'judul' => $req->judul, 
                    'konten' => $req->input('konten'), 
                    'gambar' => $file_name,
                    'kategori' => $req->kategori,
                ]
            );
    
            return redirect()->route('pengelola_artikel_list')->with('notif', 'Artikel berhasil disimpan')->with('notif_type', 'success');
        }
        return redirect()->route('pengelola_artikel_list')->with('notif', 'Gagal menyimpan data')->with('notif_type', 'danger');
    }


    public function pengelola_artikel_detail($id_artikel){
        role_diizinkan('1|2');
        kelola_artikel();
        $data = DB::table('artikel')
        ->join('user AS p1', 'artikel.id_user', '=', 'p1.id_user')
        ->where('id_artikel', '=', $id_artikel)->get()->first();

        return view('admin.artikel_detail', ['data'=> $data]);

    }


    public function pengelola_artikel_terima($id_artikel){
        role_diizinkan('2');
        DB::table('artikel')
        ->where('id_artikel', $id_artikel)
        ->update([
                'status_approved' => 'Tayang',
                'approved_by' => session('id')
            ]
        );
        return redirect()->route('pengelola_artikel_list')->with('notif', 'Artikel berhasil ditayangkan');
    }

    public function pengelola_artikel_tolak($id_artikel){
        role_diizinkan('2');
        DB::table('artikel')
        ->where('id_artikel', $id_artikel)
        ->update([
                'status_approved' => 'Ditolak',
                'approved_by' => session('id')
            ]
        );
        return redirect()->route('pengelola_artikel_list')->with('notif', 'Artikel berhasil ditayangkan');
    }

    public function pengelola_artikel_edit ($id_artikel){
        role_diizinkan('1|2');
        $data = DB::table('artikel')
        ->where('id_artikel', '=', $id_artikel)->get()->first();

        return view('admin.artikel_edit', ['data'=> $data]);
    }

    public function pengelola_artikel_edit_proses(Request $req, $id_artikel){
        role_diizinkan('1|2');
        // dd($req->all());

        $data_old = DB::table('artikel')->where('id_artikel', $id_artikel)->get()->first();
        if (empty($data_old)) {
            return redirect()->guest('/errorpage');
        }

        $validation = $req->validate([
            'judul' => 'required|max:200',
            'kategori' => 'required',
            'konten' => 'required',
            'foto_thumbnail' => 'mimes:jpg,jpeg,png|max:1024',
        ]);

        DB::beginTransaction();

        try {

            DB::table('artikel')
            ->where('id_artikel', $id_artikel)
            ->update([
                    'judul' => $req->judul,
                    'kategori' => $req->kategori,
                    'konten' => $req->konten,
                ]
            );

            if($req->hasFile('foto_thumbnail')){
                $destination = "public/images/artikel";
                $file_name = Str::uuid().".".$req->foto_thumbnail->extension();
                $req->foto_thumbnail->storeAs($destination, $file_name);
                DB::table('artikel')->where('id_artikel',$id_artikel)->update([
                    'gambar' => $file_name
                ]);
            }

            if($req->hasFile('foto_thumbnail')){
                if ($data_old->gambar != 'default.svg') {
                    delete_storage($destination."/".$data_old->gambar);
                }
            }

            // SUKSES
            DB::commit();
            return redirect()->route('pengelola_artikel_list')->with('notif', 'Data berhasil diubah');

        } catch (\Exception $e) {
            if($req->hasFile('foto_thumbnail')){
                delete_storage($destination."/".$file_name);
            }
            DB::rollback();
            return redirect()->route('pengelola_artikel_list')->with('notif', 'Data gagal diubah -')
            ->with('notif_type', 'danger');
        }

    }



    public function pengelola_artikel_hapus_proses($id_artikel){
        // role_diizinkan('2');
        $data_old = DB::table('artikel')->where('id_artikel', $id_artikel)->get()->first();

        DB::table('artikel')->where('id_artikel', $id_artikel)->delete();

        $destination = "public/images/artikel";
        delete_storage($destination."/".$data_old->gambar);

        return redirect()->route('pengelola_artikel_list')->with('notif', 'Data berhasil dihapus');
    }

    public function tambah_komentar_proses(Request $request, $id_artikel){
        // role_diizinkan('1|2|3|4');
        DB::table('komentar')->insert(
            [
                'id_artikel' => $id_artikel, 
                'id_user' => session('id'), 
                'konten' => ($request->komentar),
            ]
        );
        return redirect()->back()->with('notif', 'Komentar berhasil dikiirm');

    }

    public function hapus_komentar_proses(Request $request, $id_komentar){
        DB::table('komentar')->where('id_komentar', '=', $id_komentar)->delete();
        return redirect()->back()->with('notif', 'Komentar berhasil dihapus');
    }


}
