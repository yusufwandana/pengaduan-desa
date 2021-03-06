<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masyarakat;
use App\Pengaduan;

class MasyarakatController extends Controller
{
    public function index()
    {
        $data = Masyarakat::all();
        return view('masyarakat.index', compact('data'));
    }

    public function ajukanPengaduan()
    {
        $data = Masyarakat::where('user_id', auth()->user()->id)->first();
        return view('masyarakat.pengaduan', compact('data'));
    }

    public function riwayatPengaduan()
    {
        $user = Masyarakat::where('user_id', auth()->user()->id)->first();
        $data = Pengaduan::where('masyarakat_id', $user->id)->latest()->get();
        return view('masyarakat.riwayat-pengaduan', compact('data'));
    }

    public function detailPengaduan($id)
    {
        $data = Pengaduan::where('id', $id)->with('Masyarakat')->first();
        return view('masyarakat.detail-pengaduan', compact('data'));
    }

    public function  postPengaduan(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:.jpeg,jpg,png|max:2048'
        ]);

        $time = date('ymdhis');
        $id   = uniqid();
        $file = $request->file;
        $fileName  = $time . $id . '.' . $file->getClientOriginalExtension();
        $moveto = 'public/images/pengaduan';
        $file->move($moveto, $fileName);
        $date = date('Y-m-d');

        $masyarakat = Masyarakat::where('user_id', auth()->user()->id)->first();

        Pengaduan::create([
            'tanggal' => $date,
            'masyarakat_id' => $masyarakat->id,
            'teks_pengaduan' => htmlspecialchars($request->teks_masalah),
            'foto' => $fileName,
            'status' => 'terkirim',
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('dashboard.' . auth()->user()->role)->with('success', 'Sukses! Terima kasih telah melaporkan masalah Anda!');
    }

    public function hapus($id)
    {
        $masyarakat = Masyarakat::find($id)->delete();

        return redirect()->route('masyarakat.index')->with('success', 'Data telah berhasi dihapus!');
    }
}
