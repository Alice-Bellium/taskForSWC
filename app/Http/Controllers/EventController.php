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

        Event::query()->create($data);

        return redirect()->route('index')->with('success', 'Событие успешно создано!');
    }

    /**
     * Show the event page.
     */
    public function show(Event $event)
    {
        $participants = $event->users()->get();
        $isCreator = $event->creator_user_id === Auth::id();
        $isParticipant = $participants->contains(Auth::id());

        return view('events.show', compact(
            'event',
            'participants',
            'isCreator',
            'isParticipant',
        ));
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
        $event->update($request->validated());

        return redirect()->route('events.show', ['event' => $event])
            ->with('success', 'Событие обновлено!');
    }

    /**
     * Destroy the event.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('index')->with('success', 'Событие удалено');
    }

    /**
     * Join to the event.
     */
    public function join(Event $event)
    {
        if (!$event->users()->get()->contains(Auth::id())) {
            $event->users()->attach(Auth::id());
        }
        return redirect()->back();
    }

    /**
     * Left to the event.
     */
    public function left(Event $event)
    {
        if ($event->users()->get()->contains(Auth::id())) {
            $event->users()->detach(Auth::id());
        }
        return redirect()->back();
    }

    /**
     * Get all events.
     */
    public function events()
    {
        // todo paginate
        $events =  new Event();
        return view('admin.events', ['events' => $events->query()->get()]);
    }
}
