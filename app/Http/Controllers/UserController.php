<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Validation\Rule;
use Socialite;

class UserController extends Controller
{
    public function landing()
    {
        if (@$_GET['kat'] != "") {
            $artikel = DB::table('artikel')->where('kategori', $_GET['kat'])->get();
        } else {
            $artikel = DB::table('artikel')->get();
        }
        return view('user.landing', ['artikel' => $artikel]);
    }

    public function detail_blog($slug)
    {
        $artikel = DB::table('artikel')->where('id_artikel', $slug)->get()->first();
        if (empty($artikel)) {
            abort(404);
        }

        $komentar = DB::table('komentar')
            ->join('user', 'user.id_user', '=', 'komentar.id_user')
            ->where('id_artikel', $artikel->id_artikel)
            ->orderBy('date', 'desc')
            ->get();

        $artikel_terbaru = DB::table('artikel')->orderByRaw('date DESC')->limit(5)->get();
        return view('user.artikel_detail', [
            'artikel' => $artikel,
            'artikel_terbaru' => $artikel_terbaru,
            'komentar' => $komentar,
        ]);
    }


    public function login()
    {
        return view('user.login');
    }


    public function login_proses(Request $request)
    {
        // dd($request->all());

        $email = $request->input('email');
        // dd(Hash::make("qweqweqwe"));

        // $data = User::where('email_user', $request->email)->first();
        $data = DB::table('user')->where('email', $email)->join('validasi', 'user.id_user', '=', 'validasi.id_user')->get()->first();

        if (empty($data)) {
            return redirect()->back()->with('notif', 'Email / password yang anda masukkan salah')->with('notif_type', 'danger');
        }

        if ($data->status == "1") {
            $kelola_artikel = true;
        } else {
            $kelola_artikel = false;
        }

        if (Hash::check($request->password, $data->password)) {
            session([
                'login' => true,
                'id' => $data->id_user,
                'nama' => $data->nama,
                'level' => 2,
                'kelola_artikel' => $kelola_artikel,
            ]);
            return redirect()->route('landing');
        } else {
            return redirect()->back()->with('notif', 'Email / password yang anda masukkan salah')->with('notif_type', 'danger');
        }
    }


    public function logout_proses(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('user_login');
    }

    public function registrasi()
    {
        return view('user.registrasi');
    }

    public function registrasi_proses(Request $request)
    {
        $validation = $request->validate([
            'nama' => [
                'required',
                'max:100',
            ],
            'username' => 'required|max:150',
            'email' => 'required|max:150',
            'password' => 'required|max:50',
            'password_konfirmasi' => 'required|max:50'
        ]);

        if ($request->password != $request->password_konfirmasi) {
            return redirect()->back()->withErrors([
                'password' => 'Password yang anda masukkan tidak sama',
                'password_konfirmasi' => 'Password yang anda masukkan tidak sama'
            ]);
        }
        // dd($request->all());

        $id = DB::table('user')->insertGetId(array(
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ));

        DB::table('validasi')->insert(
            [
                'id_user' => $id,
                'status' => 0,
            ]
        );
        return redirect()->route('user_login')->with('notif', 'Registrasi akun berhasil');
    }

    public function user_profile()
    {
        // role_diizinkan('4');
        $data = DB::table('user')->where('id_user', session('id'))->get()->first();

        $komentar = DB::table('komentar')
            ->select('komentar.*', 'artikel.judul', 'artikel.id_artikel', 'artikel.gambar')
            ->join('user', 'user.id_user', '=', 'komentar.id_user')
            ->join('artikel', 'artikel.id_artikel', '=', 'komentar.id_artikel')
            ->where('komentar.id_user', session('id'))
            ->orderBy('id_komentar', 'desc')
            ->limit(5)->get();

        if (empty($data)) {
            abort(404);
        }
        return view('user.profile', ['data' => $data, 'komentar' => $komentar]);
    }

    public function user_profile_edit_proses(Request $req)
    {
        // role_diizinkan('4');
        $id_user = session('id');
        $validation = $req->validate([
            'nama' => 'required|max:100',
            'email' => 'required|max:150',
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
                ->update(
                    [
                        'nama' => $req->nama,
                        'email' => $req->email,
                    ]
                );

            if (!empty($req->password)) {

                DB::table('user')
                    ->where('id_user', $id_user)
                    ->update(
                        [
                            'password' => Hash::make($req->password)
                        ]
                    );
            }

            // SUKSES
            DB::commit();
            return redirect()->back()->with('notif', 'Data berhasil diubah');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('notif', 'Data gagal diubah')
                ->with('notif_type', 'danger');
        }
    }


    //tambahkan script di bawah ini
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    //tambahkan script di bawah ini 
    public function handleProviderCallback()
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = DB::table('user')->where('email', $user_google->getEmail())->join('validasi', 'user.id_user', '=', 'validasi.id_user')->get()->first();
            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_google menyimpan data google account seperti email, foto, dsb

            if ($user != null) {
                if ($user->status == "1") {
                    $kelola_artikel = true;
                } else {
                    $kelola_artikel = false;
                }

                session([
                    'login' => true,
                    'id' => $user->id_user,
                    'nama' => $user_google->getName(),
                    'level' => 2,
                    'kelola_artikel' => $kelola_artikel,
                ]);

                return redirect()->route('landing');
            } else {

                // $create = User::Create([
                //     'email'             => $user_google->getEmail(),
                //     'name'              => $user_google->getName(),
                //     'password'          => 0,
                //     // 'email_verified_at' => now()
                // ]);
                $create = DB::table('user')->insertGetId(array(
                    'nama' => $user_google->getName(),
                    'email' => $user_google->getEmail(),
                    'username' => $user_google->getName(),
                    'password' => 0,
                ));
                DB::table('validasi')->insert(
                    [
                        'id_user' => $create,
                        'status' => 0,
                    ]
                );

                $data = DB::table('user')->where('email', $user_google->getEmail())->join('validasi', 'user.id_user', '=', 'validasi.id_user')->get()->first();
                // error_log('user null', $create);
                // return redirect()->route('landing');

                if ($data->status == "1") {
                    $kelola_artikel = true;
                } else {
                    $kelola_artikel = false;
                }

                session([
                    'login' => true,
                    'id' => $create,
                    'nama' => $user_google->getName(),
                    'level' => 2,
                    'kelola_artikel' => $kelola_artikel,
                ]);

                return redirect()->route('landing');
            }
        } catch (\Exception $e) {
            dd($e, "error");
            return redirect()->route('landing');
            // return redirect()->route('login');
        }
    }
}


//  if ($data->status == "1") {
//             $kelola_artikel = true;
//         } else {
//             $kelola_artikel = false;
//         }

//         if (Hash::check($request->password, $data->password)) {
//             session([
//                 'login' => true,
//                 'id' => $data->id_user,
//                 'nama' => $data->nama,
//                 'level' => 2,
//                 'kelola_artikel' => $kelola_artikel,
//             ]);
//             return redirect()->route('landing');
//         }
