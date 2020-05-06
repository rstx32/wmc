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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('admin.index');
        $user = DB::table('users')->where('admin',0)->orderByDesc('skor')->get();
        $soal = DB::table('bank_soal')->get();
        $status = DB::table('sesi')->where('id',10)->get();
        $carbon = Carbon::now('Asia/Jakarta'); 
            
    	return view('admin.index')->with(compact('user','soal','status','carbon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $soal = DB::table('bank_soal')->get()->count();
        if($soal>4)
            return view('admin.soalPenuh');
        else
            return view('admin.tambahSoal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        // alihkan halaman ke halaman pegawai
        return redirect('/admin#soal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        DB::table('users')->update([
            'skor' => 0
        ]);

        DB::table('terjawab')->delete();

        return redirect('/admin');
    }
}
