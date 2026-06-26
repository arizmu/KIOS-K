<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PanggilAntrian implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public $antrian)
    {
        Log::info('Event PanggilAntrian dipanggil dengan data:', ['antrian' => $antrian]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('panggil-antrian');
    }

    public function broadcastAs(): string
    {
        return 'antrian';
    }

    public function broadcastWith()
    {
        return [
           'antrian' => $this->antrian,
        ];
    }
}
