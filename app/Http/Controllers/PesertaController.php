<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Terjawab;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesertaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
      $user = DB::table('users')->where('admin',0)->orderByDesc('skor')->get();
      $status = DB::table('sesi')->where('id',10)->get();

      foreach($status as $s){
        if($s->status==1){
          $terjawab = DB::table('terjawab')->where('peserta',Auth::id())->get();
          if($terjawab->count()<1){
            $soal = DB::table('bank_soal')->get();
          }else{
            $x = [];
            foreach ($terjawab as $t){
              array_push($x,$t->soal);
            }
            $soal = DB::table('bank_soal')->whereNotIn('id',$x)->get();
          }
          $waktu = $s->wkt_selesai;
          return view('peserta.index')->with(compact('user', 'terjawab', 'soal', 'waktu'));
        }
        else
          return view('peserta.disable')->with(compact('user'));
      }      
    }    

    public function submit($id, Request $request){
    	$this->validate($request,['jawaban' => 'required']);

      $jawabanBenar = DB::table('bank_soal')->where('id',$id)->first();
      $jawabanInput = $request->jawaban;

      if(strcmp($jawabanBenar->jawaban,$jawabanInput)==0){
        $skorSkrg = DB::table('users')->where('id',Auth::id())->first();
        $update = $skorSkrg->skor + $jawabanBenar->poin;
        DB::table('users')->where('id',Auth::id())->update(['skor' => $update]);
        DB::table('terjawab')->insert([
          'soal' => $jawabanBenar->id,
          'peserta' => Auth::id(),
        ]);
        
        return redirect('/peserta');
      }else{
        return view('peserta.salah', ['benar' => $jawabanBenar->jawaban], ['input' => $jawabanInput]);
      }
    }
}
