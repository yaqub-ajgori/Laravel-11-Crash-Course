<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\NoteStoreRequest;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()
        ->where("user_id", auth()->user()->id)
        ->orderBy("created_at","desc")
        ->paginate(10);

        return view("note.index", [
            'notes' => $notes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view("note.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteStoreRequest $request): RedirectResponse
    {
         $validatedData = $request->validated(); // Retrieve validated data from the request

        // Append the user_id to the validated data
        $validatedData['user_id'] = $request->user()->id;

        // Create a new Note instance with the validated data
        Note::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('notes.index')->with('success', 'Note Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        if (auth()->user()->id != $note->user_id) {
            abort(403);
        }
        return view('note.show', ['note'=> $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
         return view("note.edit", [
            "note"=> $note,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteStoreRequest $request, Note $note)
    {
        $validatedData = $request->validated();
        $note->update($validatedData);
        return redirect()->route("notes.index")->with("success","Note Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // dd($note->delete());
        // $note = Note::findOrFail($id);
        $note->delete();
        return redirect()->route("notes.index", compact('note'))->with("success","Note Deleted");
    }
}
