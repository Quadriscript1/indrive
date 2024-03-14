<?php

namespace App\Events;

use App\Models\User;
use App\Module\Trips\Models\Trip;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TripLocationUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $trip;
    private $user;
    /**
     * Create a new event instance.
     */
    public function __construct(Trip $trip,User $user)
    {
        //

        $this->trip = $trip;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('passenger_'.$this->user->id),
        ];
    }
}
