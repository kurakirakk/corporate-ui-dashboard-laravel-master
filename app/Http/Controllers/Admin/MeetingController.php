<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHandler;
use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeetingController extends Controller
{
    public function index(Request $request)
    {
        $query = Meeting::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama_rapat', 'like', '%' . $search . '%')
                    ->orWhere('pengelola_rapat', 'like', '%' . $search . '%')
                    ->orWhere('tanggal_rapat', 'like', '%' . $search . '%');
            });
        }

        $meetings = $query->orderByDesc('tanggal_rapat')->paginate(10)->withQueryString();
        return view('data_rapat_list', compact('meetings'));
    }

    public function create()
    {
        return view('data_rapat_component', ['mode' => 'create']);
    }

    public function store(Request $request)
    {
        $messages = [
            'waktu_mulai.date_format'    => 'Format waktu mulai harus jam:menit AM/PM, contoh: 08:00 AM.',
            'waktu_selesai.date_format'  => 'Format waktu selesai harus jam:menit AM/PM, contoh: 10:30 AM.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_rapat'       => 'required|string',
            'bidang_rapat'     => 'required|string',
            'tanggal_rapat'    => 'required|date',
            'pemimpin_rapat'   => 'required|string',
            'waktu_mulai'      => 'required|date_format:H:i',
            'waktu_selesai'    => 'required|date_format:H:i',
            'ruangan_rapat'    => 'required|string',
            'pengelola_rapat'  => 'required|string',
            'jumlah_peserta'   => 'required|integer',
            'deskripsi_rapat'  => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Meeting::create($request->only([
                'nama_rapat',
                'bidang_rapat',
                'tanggal_rapat',
                'pemimpin_rapat',
                'waktu_mulai',
                'waktu_selesai',
                'ruangan_rapat',
                'pengelola_rapat',
                'jumlah_peserta',
                'deskripsi_rapat',
            ]));

            return redirect()->route('admin.rapat.index')
                ->with('success', 'Data Rapat berhasil disimpan.');
        } catch (\Exception) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        $meeting = Meeting::find($id);
        if (!$meeting) {
            return ResponseHandler::notFound();
        }
        return view('data_rapat_component', compact('meeting') + ['mode' => 'edit']);
    }

    public function update(Request $request, $id)
    {
        $meeting = Meeting::find($id);
        if (!$meeting) {
            return ResponseHandler::notFound('Data meeting tidak ditemukan.');
        }

        $messages = [
            'waktu_mulai.date_format'    => 'Format waktu mulai harus jam:menit AM/PM, contoh: 08:00 AM.',
            'waktu_selesai.date_format'  => 'Format waktu selesai harus jam:menit AM/PM, contoh: 10:30 AM.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_rapat'       => 'required|string',
            'bidang_rapat'     => 'required|string',
            'tanggal_rapat'    => 'required|date',
            'pemimpin_rapat'   => 'required|string',
            'waktu_mulai'      => 'required|date_format:H:i',
            'waktu_selesai'    => 'required|date_format:H:i',
            'ruangan_rapat'    => 'required|string',
            'pengelola_rapat'  => 'required|string',
            'jumlah_peserta'   => 'required|integer',
            'deskripsi_rapat'  => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $meeting->update($request->only([
                'nama_rapat',
                'bidang_rapat',
                'tanggal_rapat',
                'pemimpin_rapat',
                'waktu_mulai',
                'waktu_selesai',
                'ruangan_rapat',
                'pengelola_rapat',
                'jumlah_peserta',
                'deskripsi_rapat',
            ]));
            return redirect()->route('admin.rapat.index')
                ->with('success', 'Data Rapat berhasil diperbarui.');
        } catch (\Exception) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $meeting = Meeting::find($id);
        if (!$meeting) {
            return redirect()->route('admin.rapat.index')->with('error', 'Data Rapat tidak ditemukan.');
        }

        try {
            $meeting->delete();
            return redirect()->route('admin.rapat.index')->with('success', 'Data Rapat berhasil dihapus.');
        } catch (\Exception) {
            return redirect()->route('admin.rapat.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
