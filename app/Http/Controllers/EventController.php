<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventCreateRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the create event page.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a new event.
     */
    public function store(EventCreateRequest $request)
    {
        $data = $request->validated();
        $data['creator_user_id'] = Auth::id();

        $event = Event::query()->create($data);

        return redirect()->route('index')->with('success', 'Событие успешно создано!');
    }

    /**
     * Show the event page.
     */
    public function show(Event $event)
    {
        return view('events.show', ['event' => $event]);
    }

    /**
     * Show the edit event page.
     */
    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the event.
     */
    public function update(Event $event, EventCreateRequest $request)
    {
        $event = Event::query()->update($request->validated());

        return view('events.show', ['event' => $event])->with('success', 'Событие обновлено!');
    }

    /**
     * Destroy the event.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('index')->with('success', 'Событие удалено');
    }
}
