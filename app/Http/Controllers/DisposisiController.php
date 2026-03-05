<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DisposisiController extends Controller
{
    public function index()
    {
        $disposisis = Disposisi::with('teams', 'creator')->latest()->paginate(10);
        return view('disposisi.index', compact('disposisis'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('disposisi.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_agenda' => 'required|string|max:255',
            'tanggal_agenda' => 'required|date',
            'jenis_agenda' => 'required|string|max:255',
            'sifat' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'asal_surat' => 'required|string|max:255',
            'tujuan_surat' => 'required|string|max:255',
            'perihal' => 'required|string',
            'lampiran' => 'nullable|string',
            'jumlah_lembar' => 'required|integer|min:1',
            'klasifikasi' => 'nullable|string|max:255',
            'retensi' => 'nullable|string|max:255',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'diketahui' => 'boolean',
            'ditindaklanjuti' => 'boolean',
            'jadwalkan_hadir' => 'boolean',
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'nullable|date',
            'teams' => 'required|array',
            'teams.*' => 'exists:teams,id',
        ]);

        if ($request->hasFile('attachment')) {
            $validated['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        $validated['diketahui'] = $request->boolean('diketahui');
        $validated['ditindaklanjuti'] = $request->boolean('ditindaklanjuti');
        $validated['jadwalkan_hadir'] = $request->boolean('jadwalkan_hadir');
        $validated['created_by'] = auth()->id();

        $disposisi = Disposisi::create($validated);
        $disposisi->teams()->sync($request->teams);

        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil dibuat.');
    }

    public function show(Disposisi $disposisi)
    {
        $disposisi->load('teams', 'creator');
        return view('disposisi.show', compact('disposisi'));
    }

    public function edit(Disposisi $disposisi)
    {
        $teams = Team::all();
        $disposisi->load('teams');
        return view('disposisi.edit', compact('disposisi', 'teams'));
    }

    public function timEdit(Disposisi $disposisi)
    {
        $teams = Team::all();
        $disposisi->load('teams');
        return view('tim.edit', compact('disposisi', 'teams'));
    }

    public function timUpdate(Request $request, Disposisi $disposisi)
    {
        $validated = $request->validate([
            'no_agenda' => 'required|string|max:255',
            'tanggal_agenda' => 'required|date',
            'jenis_agenda' => 'required|string|max:255',
            'diketahui' => 'nullable|boolean', 
            'ditindaklanjuti' => 'nullable|boolean',
            'jadwalkan_hadir' => 'nullable|boolean',
            'catatan' => 'nullable|string',
            'status_disposisi' => 'integer',
            'tanggal_disposisi' => 'nullable|date',
            'teams' => 'required|array',
            'teams.*' => 'exists:teams,id',
        ]);

        // Paksa nilai 0 atau 1 untuk checkbox
        $validated['diketahui'] = $request->has('diketahui') ? 1 : 0;
        $validated['ditindaklanjuti'] = $request->has('ditindaklanjuti') ? 1 : 0;
        $validated['jadwalkan_hadir'] = $request->has('jadwalkan_hadir') ? 1 : 0;
        $validated['status_disposisi'] = (int) $request->status_disposisi;

        $disposisi->update($validated);
        $disposisi->teams()->sync($request->teams);

        return redirect()->route('tim.disposisi')->with('success', 'Disposisi berhasil diupdate.');
    }

    public function update(Request $request, Disposisi $disposisi)
    {
        $validated = $request->validate([
            'no_agenda' => 'required|string|max:255',
            'tanggal_agenda' => 'required|date',
            'jenis_agenda' => 'required|string|max:255',
            'sifat' => 'required|string|max:255',
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'asal_surat' => 'required|string|max:255',
            'tujuan_surat' => 'required|string|max:255',
            'perihal' => 'required|string',
            'lampiran' => 'nullable|string',
            'jumlah_lembar' => 'required|integer|min:1',
            'klasifikasi' => 'nullable|string|max:255',
            'retensi' => 'nullable|string|max:255',
            'attachment' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'diketahui' => 'boolean',
            'ditindaklanjuti' => 'boolean',
            'jadwalkan_hadir' => 'boolean',
            'catatan' => 'nullable|string',
            'tanggal_disposisi' => 'nullable|date',
            'teams' => 'required|array',
            'teams.*' => 'exists:teams,id',
        ]);

        if ($request->hasFile('attachment')) {
            if ($disposisi->attachment) {
                Storage::disk('public')->delete($disposisi->attachment);
            }
            $validated['attachment'] = $request->file('attachment')->store('attachments', 'public');
        }

        $validated['diketahui'] = $request->boolean('diketahui');
        $validated['ditindaklanjuti'] = $request->boolean('ditindaklanjuti');
        $validated['jadwalkan_hadir'] = $request->boolean('jadwalkan_hadir');

        $disposisi->update($validated);
        $disposisi->teams()->sync($request->teams);

        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil diupdate.');
    }

    public function destroy(Disposisi $disposisi)
    {
        if ($disposisi->attachment) {
            Storage::disk('public')->delete($disposisi->attachment);
        }
        $disposisi->delete();
        return redirect()->route('disposisi.index')->with('success', 'Disposisi berhasil dihapus.');
    }

    public function timIndex()
    {
        $teamId = auth()->user()->team_id;
        $disposisis = Disposisi::whereHas('teams', function($q) use ($teamId) {
            $q->where('teams.id', $teamId);
        })->with('creator')->latest()->paginate(10);
        
        return view('tim.index', compact('disposisis'));
    }

    public function timShow(Disposisi $disposisi)
    {
        // Ensure this team is actually assigned to this disposisi
        if (!$disposisi->teams()->where('teams.id', auth()->user()->team_id)->exists()) {
            abort(403, 'Unauthorized. Disposisi tidak ditujukan untuk tim Anda.');
        }
        
        $disposisi->load('teams', 'creator');
        return view('disposisi.show', compact('disposisi'));
    }
}
