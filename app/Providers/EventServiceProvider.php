<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\Event as ModelEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(['header' => 'events'], ['header' => 'all_events']);

            $modalEvent = new ModelEvent;
            $modalEventData = $modalEvent->query()->get();

            foreach ($modalEventData as $item) {
                $event->menu->add([
                    'text' => $item->title,
                    'url' => route('events.show', $item),
                ]);
            }

            $event->menu->add([
                'header' => 'my_events',
            ]);

            $userEventsData = $modalEventData->where('creator_user_id', '=', Auth::id());
            foreach ($userEventsData as $item) {
                $event->menu->add([
                    'text' => $item->title,
                    'url' => route('events.show', $item),
                ]);
            }
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
