<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Agenda;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::latest()->paginate(10);
        return view('agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('agenda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_agenda' => 'required|string|max:255',
            'nama_agenda' => 'required|string|max:255',
            'deskripsi_agenda' => 'required|string',
            'tanggal_agenda' => 'required|date',
            'lokasi' => 'required|in:Online,Offline',
            'detail_lokasi' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        Agenda::create($validated);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dibuat.');
    }

    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        return view('agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $validated = $request->validate([
            'no_agenda' => 'required|string|max:255',
            'nama_agenda' => 'required|string|max:255',
            'deskripsi_agenda' => 'required|string',
            'tanggal_agenda' => 'required|date',
            'lokasi' => 'required|in:Online,Offline',
            'detail_lokasi' => 'required|string|max:255',
            'link' => 'nullable|url',
        ]);

        $agenda->update($validated);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diupdate.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }
}