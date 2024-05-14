<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())->get();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            $validatedData['user_id'] = auth()->id();
            $validatedData['status'] = 'open';
            Ticket::create($validatedData);
            return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');

        } catch (\Exception $e) {
          
            return redirect()->route('tickets.create')->withErrors(['error' => $e->getMessage()])->withInput($request->all());

            // return view('tickets.create')->withErrors(['error' => $e->getMessage()])->withInput($request->all());
        }
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

}
