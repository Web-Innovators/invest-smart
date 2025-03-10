<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SMS implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message;  // Use 'public' so Laravel can broadcast it

    /**
     * Create a new event instance.
     */
    public function __construct(string $message)
    {
        $this->message = $message;  // Assign message to class property
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [new Channel('public.sms')]; // Public channel
    }

    /**
     * Set event name for broadcast.
     */
    public function broadcastAs()
    {
        return 'chat-message';
    }

    /**
     * Define the broadcast payload.
     */
    public function broadcastWith()
    {
        return [
            'message' => $this->message,
        ];
    }
}
