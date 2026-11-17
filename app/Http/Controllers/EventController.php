<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    //tampilin semua event
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();

        return view('events.index', compact('events'));
        
    }
    //nampilin form tambah event
    public function create()
    {

        return view('events.create');

    }

    //simpan event baru
    public function store(Request $request)
    {
        $request->validate([
            'judul_event' => 'required|string|max:100',
            'deskripsi' => 'required|string|max:180',
            'kategori' => ['required', Rule::in(['Teknologi', 'Bisnis'])],
            'silabus' => 'required|string',
            'durasi_sesi' => 'required|integer|min:1',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event berhasil ditambahkan!');
    }
    
    //detail event (sementara diarahkan ke daftar)
    public function show(Event $event)
    {
        return redirect()->route('events.index');
    }

    //nampilin form edit event
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    //update event nyimpen perubahan
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'judul_event' => 'required|string|max:100',
            'deskripsi' => 'required|string|max:180',
            'kategori' => ['required', Rule::in(['Teknologi', 'Bisnis'])],
            'silabus' => 'required|string',
            'durasi_sesi' => 'required|integer|min:1',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui!');
    }

    //hapus event
    public function destroy(Event $event)
    {
        $event->delete();  
        
        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
    }
}