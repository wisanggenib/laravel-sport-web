<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function login(Request $request){
        // $session['user']['id'] = "332fvg232-g23g234e32f2-g23-fdsgrfh34fs";
        // $session['user']['username'] = "nikko";
        // $session['user']['level'] = "1";
        // session($session);

        // $request->session()->forget('user');

        // $data = $request->session()->get('user');
        // dd($data);



        if (!empty($request->session()->get('user'))) {
            return redirect(route('pengelola_artikel_list'));
        }else{
            return view('admin.login');
        }

    }

    public function login_proses(Request $request){
        // dd($request->all());

        $username = $request->input('username');
        // dd(Hash::make("qweqweqwe"));
             
        // $data = User::where('email_user', $request->email)->first();
        $data = DB::table('admin')->where('username', $username)->get()->first();

        if (empty($data)) {
            return redirect()->route('admin_login')->with('notif', 'Email / password yang anda masukkan salah')->with('notif_type', 'danger');
        } 

        if (Hash::check($request->password, $data->password)) {
            session([
                'login' => true,
                'id' => $data->id_admin,
                'nama' => $data->username,
                'level' => 1,
                'kelola_artikel' => true,
            ]);
            if (session('level') == "0") {
                return redirect()->route('landing');
            }else{
                return redirect()->route('pengelola_artikel_list');
            }

        }else{
            return redirect()->route('admin_login')->with('notif', '- Email / password yang anda masukkan salah')->with('notif_type', 'danger');
        }
    }

    public function admin_list(){
        role_diizinkan('1');
        $list = DB::table('user')->join('validasi', 'user.id_user', '=', 'validasi.id_user')->get();
        return view('admin.akun_list', ['list'=> $list]);
    }

    public function admin_tambah(){
        role_diizinkan('1');
        // $list = DB::table('admin')->where('status_hapus_admin',0)->paginate(2);
        // return view('user.list_user', ['list'=> $list]);
        return view('admin.akun_tambah');
    }


    public function admin_tambah_proses(Request $request){
        role_diizinkan('1');
        $validation = $request->validate([
            'nama' => [
                'required',
                'max:100',
            ],
            'email' => 'required|max:150',
            'password' => 'required|max:50',
            'password_konfirmasi' => 'required|max:50',
            'level' => 'required',
        ]);

        if ($request->password != $request->password_konfirmasi) {
            return redirect()->back()->withErrors([
                'password' => 'Password yang anda masukkan tidak sama',
                'password_konfirmasi' => 'Password yang anda masukkan tidak sama'
            ]);
        }
        // dd($request->all());

        DB::table('user')->insert(
            [
                'id_user' => Str::uuid(), 
                'nama_user' => $request->nama, 
                'email_user' => $request->email, 
                'password' => Hash::make($request->password),
                'level_user' => $request->level,
            ]
        );
        return redirect()->route('pengelola_akun_list')->with('notif', 'Akun berhasil disimpan')->with('notif_type', 'success');
    }

    public function admin_edit($id_user){
        role_diizinkan('1');
        $data = DB::table('user')->join('validasi', 'user.id_user', '=', 'validasi.id_user')->where('user.id_user', $id_user)->get()->first();
        if (empty($data)) {
            return redirect()->guest('/errorpage');
        }
        return view('admin.akun_edit', ['data'=>$data]);
    }


    public function admin_edit_proses(Request $req, $id_user){
        role_diizinkan('1');
        $validation = $req->validate([
            'nama' => 'required|max:100',
            'email' => 'required|max:150',
            'status' => 'required',
            'password' => 'max:50',
            'password_konfirmasi' => 'max:50'
        ]);


        if (!empty(DB::table('user')->where('email', $req->email)->where('id_user', '!=', $id_user)->get()->first())) {
            $validate_error['username_user'] = 'Email telah digunakan oleh user lain, coba email lainnya'; 
        }

        if ($req->password != $req->password_konfirmasi) {
            $validate_error['password'] = 'Password yang anda masukkan tidak sama';
            $validate_error['password_konfirmasi'] = 'Password yang anda masukkan tidak sama';
        }



        if (!empty($validate_error)) {
            return redirect()->back()->withErrors($validate_error);
        }

        DB::beginTransaction();


        try {

            DB::table('user')
            ->where('id_user', $id_user)
            ->update([
                    'nama' => $req->nama,
                    'email' => $req->email,
                ]
            );

            DB::table('validasi')
            ->where('id_user', $id_user)
            ->update([
                    'status' => $req->status
                ]
            );

            if (!empty($req->password)) {

                DB::table('user')
                ->where('id_user', $id_user)
                ->update([
                        'password' => Hash::make($req->password)
                    ]
                );
            }

            // SUKSES
            DB::commit();
            return redirect()->route('pengelola_akun_list')->with('notif', 'Data berhasil diubah');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('pengelola_akun_list')->with('notif', 'Data gagal diubah')
            ->with('notif_type', 'danger');
        }

    }


    public function admin_hapus_proses($id_user){
        role_diizinkan('1');
        $data = DB::table('user')->where('id_user', $id_user)->get()->first();
        if (empty($data)) {
            return redirect()->guest('/errorpage');
        }

        DB::table('user')
        ->where('id_user', $id_user)
        ->update([
                'status_hapus_user' => 1
            ]
        );
        return redirect()->route('pengelola_akun_list')->with('notif', 'Data berhasil dihapus');
    }


    public function admin_edit_password(){
        return view('admin.akun_profile');
    }   


    public function admin_edit_password_proses(Request $req){
        $id_user = session('id');
        $data = DB::table('user')->where('id_user', $id_user)->get()->first();


        $validation = $req->validate([
            'pass_lama' => 'required|max:50',
            'pass_baru' => 'required|max:50',
            'pass_baru_cnf' => 'required|max:50'
        ]);


        if ($req->password != $req->password_konfirmasi) {
            $validate_error['pass_baru'] = 'Password yang anda masukkan tidak sama';
            $validate_error['pass_baru_cnf'] = 'Password yang anda masukkan tidak sama';
        }

        if (!Hash::check($req->pass_lama, $data->password)) {
            $validate_error['pass_baru'] = 'Password lama yang anda masukkan tidak benar';
        }

        if (!empty($validate_error)) {
            return redirect()->back()->withErrors($validate_error);
        }

        DB::table('user')
        ->where('id_user', $id_user)
        ->update([
                'password' => Hash::make($req->pass_baru)
            ]
        );

        return redirect()->back()->with('notif', 'Password berhasil diubah');

    }


}
