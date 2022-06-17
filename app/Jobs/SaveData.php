<?php

namespace App\Jobs;

use App\Models\Data;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SaveData implements ShouldBroadcast
{
    use Dispatchable, SerializesModels, InteractsWithSockets;

    /**
     * @var Data
     */
    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Data $data)
    {
        $this->data = $data;
    }

    public function broadcastOn()
    {
        return new Channel("data");
    }

    public function broadcastAs() {
        return "data.create";
    }

    public function broadcastWith() {
        return [
            "id" => $this->data->id,
            "hash" => $this->data->hash
        ];
    }
}
