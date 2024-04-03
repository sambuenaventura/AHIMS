<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class ServiceRequested extends Notification
{
    use Queueable;

    protected $serviceRequest;
    protected $requester;

    /**
     * Create a new notification instance.
     *
     * @param  \App\Models\ServiceRequest  $serviceRequest
     * @param  \App\Models\User  $requester
     * @return void
     */
    public function __construct($serviceRequest, $requester)
    {
        $this->serviceRequest = $serviceRequest;
        $this->requester = $requester;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database']; // Log the notification to the database
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'service_id' => $this->serviceRequest->request_id,
            'requester_id' => $this->requester->id,
            'req_first_name' => $this->requester->first_name,
            'req_last_name' => $this->requester->last_name,
            'procedure_type' => $this->serviceRequest->procedure_type, // Add procedure_type to the notification data
            'message' => "{$this->requester->first_name} {$this->requester->last_name} requested a {$this->serviceRequest->procedure_type} service."
        ];
    }
    
}
