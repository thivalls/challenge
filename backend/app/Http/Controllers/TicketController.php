<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        //
    }

    public function store(StoreTicketRequest $request)
    {
        //
    }

    public function show(Ticket $ticket)
    {
        //
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    public function destroy(Ticket $ticket)
    {
        //
    }

    public function upload(Request $request)
    {
        //
    }
}
