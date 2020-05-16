<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\BankSoal;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $user = DB::table('users')->where('admin',0)->orderByDesc('skor')->get();
        $soal = DB::table('bank_soal')->get();
        $status = DB::table('sesi')->where('id',10)->get();
        $carbon = Carbon::now('Asia/Jakarta'); 
            
    	return view('admin.index')->with(compact('user','soal','status','carbon'));
    }

    public function create()
    {
        $soal = DB::table('bank_soal')->get()->count();
        return view('admin.tambahSoal');
    }

    public function edit($id)
    {
        $soal = DB::table('bank_soal')->where('id',$id)->get();
        return view('admin.editSoal',['soal' => $soal]);
    }

    public function update(Request $request)
    {
        DB::table('bank_soal')->where('id',$request->id)->update([
            'soal' => $request->soal,
            'jawaban' => $request->jawaban,
            'poin' => $request->poin,
        ]);
        return redirect('/admin#soal');
    }

    public function store(Request $request){
    	$this->validate($request,[
			'soal' => 'required',
            'jawaban' => 'required',
            'poin' => 'required',
    	]);

    	DB::table('bank_soal')->insert([
            'soal' => $request->soal,
            'jawaban' => $request->jawaban,
            'poin' => $request->poin,
        ]);
    	return redirect('/admin#soal');
    }

    public function delete($id){
        $id = DB::table('bank_soal')->where('id',$id)->delete();
        return redirect('/admin#soal');
    }

    public function exportPDF(){
        $score = DB::table('users')->where('admin',0)->orderByDesc('skor')->get();
		$pdf = PDF::loadview('admin.score_pdf',['score'=>$score]);
		return $pdf->download('live-score-pdf');
    }

    public function mulaiSesi(Request $request){ 
        DB::table('sesi')->where('id',10)->update([
            'wkt_mulai' => Carbon::now('Asia/Jakarta'),
            'wkt_selesai' => Carbon::now('Asia/Jakarta')->addMinutes($request->durasi),
            'status' => 1
        ]);

        DB::table('users')->update(['skor' => 0]);

        return redirect('/admin');
    }

    public function hapusData(){
        DB::table('terjawab')->delete();
        DB::table('users')->where('admin',0)->delete();
        DB::table('bank_soal')->delete();
        return redirect('/admin');
    }
}
