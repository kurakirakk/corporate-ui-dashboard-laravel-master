<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHandler;
use App\Models\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Pegawai::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_pegawai', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('jabatan_pegawai', 'like', "%{$search}%")
                    ->orWhere('bidang_pegawai', 'like', "%{$search}%");
            });
        }

        $pegawai = $query->paginate(10)->withQueryString();

        return view('data_pegawai_list', compact('pegawai'));
    }

    public function create()
    {
        return view('data_pegawai_component', ['mode' => 'create']);
    }

    public function store(Request $request)
    {
        $messages = [
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.max' => 'Password maksimal 20 karakter.',
            'password.confirmed' => 'Password konfirmasi tidak sama.',
            'email.unique' => 'Email sudah terdaftar.',
            'nip.unique' => 'NIP sudah terdaftar.',
            'nip.size' => 'NIP harus terdiri dari 18 digit.',
            'no_telp_pegawai.regex' => 'Nomor telepon harus diawali 08 dan terdiri dari angka.',
            'no_telp_pegawai.min' => 'Nomor telepon minimal 10 digit.',
            'no_telp_pegawai.max' => 'Nomor telepon maksimal 13 digit.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_pegawai'     => 'required|string|max:100',
            'nip'              => 'required|string|size:18|unique:pegawai,nip',
            'email'            => 'required|email|unique:pegawai,email',
            'password'         => 'required|string|min:8|max:20|confirmed',
            'jabatan_pegawai'  => 'required|string|max:50',
            'bidang_pegawai'   => 'required|string|max:50',
            'no_telp_pegawai'  => [
                'required',
                'regex:/^08[0-9]+$/',
                'min:10',
                'max:13',
            ],
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            Pegawai::create([
                'nama_pegawai'    => $request->nama_pegawai,
                'nip'             => $request->nip,
                'email'           => $request->email,
                'password'        => Hash::make($request->password),
                'jabatan_pegawai' => $request->jabatan_pegawai,
                'bidang_pegawai'  => $request->bidang_pegawai,
                'no_telp_pegawai' => $request->no_telp_pegawai,
            ]);

            return redirect()->route('admin.pegawai.index')
                ->with('success', 'Data pegawai berhasil disimpan.');
        } catch (\Exception) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        if (!$pegawai) {
            return ResponseHandler::notFound();
        }
        return view('data_pegawai_component', compact('pegawai') + ['mode' => 'edit']);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        if (!$pegawai) {
            return redirect()->route('admin.pegawai.index')->with('error', 'Data pegawai tidak ditemukan.');
        }

        $messages = [
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.max' => 'Password maksimal 20 karakter.',
            'email.unique' => 'Email sudah terdaftar.',
            'nip.unique' => 'NIP sudah terdaftar.',
            'nip.size' => 'NIP harus terdiri dari 18 digit.',
            'no_telp_pegawai.regex' => 'Nomor telepon harus diawali 08 dan terdiri dari angka.',
            'no_telp_pegawai.min' => 'Nomor telepon minimal 10 digit.',
            'no_telp_pegawai.max' => 'Nomor telepon maksimal 13 digit.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_pegawai'     => 'required|string|max:100',
            'nip'              => ['required', 'string', 'size:18', Rule::unique('pegawai', 'nip')->ignore($id)],
            'email'            => ['required', 'email', Rule::unique('pegawai', 'email')->ignore($id)],
            'password'         => 'nullable|string|min:8|max:20',
            'jabatan_pegawai'  => 'required|string|max:50',
            'bidang_pegawai'   => 'required|string|max:50',
            'no_telp_pegawai'  => [
                'required',
                'regex:/^08[0-9]+$/',
                'min:10',
                'max:13',
            ],
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->only([
                'nama_pegawai',
                'nip',
                'email',
                'jabatan_pegawai',
                'bidang_pegawai',
                'no_telp_pegawai'
            ]);

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $pegawai->update($data);

            return redirect()->route('admin.pegawai.index')
                ->with('success', 'Data pegawai berhasil diperbarui.');
        } catch (\Exception) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui data.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        if (!$pegawai) {
            return redirect()->route('admin.pegawai.index')->with('error', 'Data pegawai tidak ditemukan.');
        }

        try {
            $pegawai->delete();
            return redirect()->route('admin.pegawai.index')->with('success', 'Data pegawai berhasil dihapus.');
        } catch (\Exception) {
            return redirect()->route('admin.pegawai.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
