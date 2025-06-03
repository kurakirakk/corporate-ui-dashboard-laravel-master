<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Notulen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Helpers\ResponseHandler;

class NotulenController extends Controller
{
    public function index()
    {
        $notulens = Notulen::with(['meeting', 'uploader'])
            ->orderBy('uploaded_at', 'desc')
            ->paginate(10);

        return view('data_notulen_rapat', compact('notulens'));
    }

    public function store(Request $request, $meetingId)
    {
        $messages = [
            'file.required'       => 'File notulen wajib diunggah.',
            'file.mimes'          => 'File harus berupa PDF.',
            'file.max'            => 'Ukuran file maksimal 5MB.',
        ];

        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf|max:5120',
        ], $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal mengupload notulen: ' . $validator->errors()->first());
        }

        try {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('notulen', $filename, 'public');

            Notulen::create([
                'nama_notulen' => $filename,
                'meeting_id'  => $meetingId,
                'size_notulen' => number_format($file->getSize() / 1048576, 2) . ' MB',
                'uploaded_by'  => Auth::id(),
                'uploaded_at'  => now(),
            ]);

            return back()
                ->with('success', 'Notulen berhasil diupload!')
                ->with('file_path', $path);
        } catch (\Exception $e) {
            return back()
                ->with('error', 'Terjadi kesalahan saat mengunggah notulen: ' . $e->getMessage());
        }
    }

    public function downloadByMeeting($meetingId)
    {
        try {
            $notulen = Notulen::where('meeting_id', $meetingId)->firstOrFail();

            if (!Storage::disk('public')->exists('notulen/' . $notulen->nama_notulen)) {
                return back()->with('error', 'File notulen tidak ditemukan.');
            }

            $filePath = Storage::disk('public')->path('notulen/' . $notulen->nama_notulen);
            $fileName = 'Notulen_' . $notulen->meeting->nama_rapat . '.pdf';

            return response()->download($filePath, $fileName, [
                'Content-Type' => 'application/pdf',
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return back()->with('error', 'Notulen untuk rapat ini tidak ditemukan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mendownload notulen: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $notulen = Notulen::with(['meeting', 'uploader'])->find($id);

        if (!$notulen) {
            return ResponseHandler::notFound('Notulen tidak ditemukan.');
        }

        return ResponseHandler::success($notulen);
    }

    public function update(Request $request, $id)
    {
        $notulen = Notulen::find($id);

        if (!$notulen) {
            return ResponseHandler::notFound('Notulen tidak ditemukan.');
        }

        $messages = [
            'file.mimes'          => 'File harus berupa PDF.',
            'file.max'            => 'Ukuran file maksimal 5MB.',
            'meeting_id.required' => 'Meeting harus dipilih.',
            'meeting_id.exists'   => 'Meeting tidak valid.',
        ];

        $validator = Validator::make($request->all(), [
            'meeting_id' => 'required|exists:meetings,id',
            'file'       => 'nullable|file|mimes:pdf|max:5120',
        ], $messages);

        if ($validator->fails()) {
            return ResponseHandler::validationErrors($validator->errors());
        }

        try {
            $notulen->meeting_id = $request->meeting_id;

            if ($request->hasFile('file')) {
                // Hapus file lama jika ada
                if ($notulen->nama_notulen && Storage::disk('public')->exists('notulen/' . $notulen->nama_notulen)) {
                    Storage::disk('public')->delete('notulen/' . $notulen->nama_notulen);
                }

                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('notulen', $filename, 'public');

                $notulen->nama_notulen = $filename;
                $notulen->size_notulen = number_format($file->getSize() / 1048576, 2) . ' MB';
            }

            $notulen->save();

            return ResponseHandler::success($notulen);
        } catch (\Exception $e) {
            return ResponseHandler::error('Terjadi kesalahan saat memperbarui notulen.', 500);
        }
    }

    public function destroy($id)
    {
        $notulen = Notulen::find($id);

        if (!$notulen) {
            return ResponseHandler::notFound('Notulen tidak ditemukan.');
        }

        try {
            if ($notulen->nama_notulen && Storage::disk('public')->exists('notulen/' . $notulen->nama_notulen)) {
                Storage::disk('public')->delete('notulen/' . $notulen->nama_notulen);
            }

            $notulen->delete();

            return ResponseHandler::success(['message' => 'Notulen berhasil dihapus!']);
        } catch (\Exception $e) {
            return ResponseHandler::error('Terjadi kesalahan saat menghapus notulen.', 500);
        }
    }
}
