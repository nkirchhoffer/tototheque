<?php

namespace App\Events;

use App\Review;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewReviewEvent implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $review;

    /**
     * Create a new event instance.
     *
     * @param Review $review
     *
     * @return void
     */
    public function __construct(Review $review)
    {
        $this->review = $review->load(['book', 'author']);
    }

    public function broadcastWith()
    {
        return ['review' => $this->review];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('book.'.$this->review->book->id);
    }
}
