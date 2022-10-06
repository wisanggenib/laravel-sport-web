<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use Illuminate\Validation\Rule;

class KalenderController extends Controller
{
    
    public function pengelola_kalender_list(){
        role_diizinkan('1');

        $respon = DB::table('kalender')->orderBy('tgl_kalender', 'asc')->get();
        
        return view('admin.kalender_list', ['list'=> $respon]);
    }

    public function pengelola_kalender_tambah(){
        role_diizinkan('1');
        return view('admin.kalender_tambah');
    }

    public function pengelola_kalender_tambah_proses(Request $request){
        role_diizinkan('1');
        
        DB::table('kalender')->insert(
            [ 
                'tgl_kalender' => $request->tanggal, 
                'isi_kalender' => $request->input('konten'),             ]
        );
        return redirect()->route('pengelola_kalender_list')->with('notif', 'Data berhasil disimpan')->with('notif_type', 'success');
    }

    public function pengelola_kalender_hapus_proses(Request $request, $id_kalender){
        role_diizinkan('1');
        DB::table('kalender')->where('id_kalender', '=', $id_kalender)->delete();
        return redirect()->back()->with('notif', 'Kalender berhasil dihapus');
    }


    public function kalender_list(){
        if (isset($_GET['tanggal'])) {
            $date = date_create($_GET['tanggal']);
            $bulan =  date_format($date,"m");
            $tahun =  date_format($date,"Y");
            $hari_akhir = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        }else{
            $bulan =  date('m');
            $tahun =  date('Y');
            $hari_akhir = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
        }

        $tanggal_awal = $tahun.'-'.$bulan.'-01';
        $tanggal_akhir = $tahun.'-'.$bulan.'-'.$hari_akhir;
        $tulisan_tanggal = date_format(date_create($tanggal_awal),"F Y");


        $data = DB::table('kalender')->selectRaw('tgl_kalender, COUNT(*) AS jml')->orderBy('tgl_kalender', 'asc')->whereBetween('tgl_kalender', [$tanggal_awal, $tanggal_akhir])->groupBy('tgl_kalender')->get();


        return view('user.kalender', ['data'=>$data, 'text_tanggal'=> $tulisan_tanggal]);

    }

    public function kalender_detail(Request $request, $tgl=''){
        if ($tgl == '') {
            $tgl = date('Y-m-d');
        }

        $tulisan_tanggal = date_format(date_create($tgl),"d F Y");

        $data = DB::table('kalender')->where('tgl_kalender', '=', $tgl)->get();
        return view('user.kalender_detail', ['data'=>$data, 'text_tanggal'=> $tulisan_tanggal]);
    }

}
