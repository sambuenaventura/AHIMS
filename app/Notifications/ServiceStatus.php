<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class ServiceStatus extends Notification
{
    use Queueable;

    protected $serviceRequest;
    protected $performer;
    protected $notificationType;

    /**
     * Create a new notification instance.
     *
     * @param  \App\Models\ServiceRequest  $serviceRequest
     * @param  \App\Models\User  $performer
     * @param  string  $notificationType
     * @return void
     */
    public function __construct($serviceRequest, $performer, $notificationType = 'accepted')
    {
        $this->serviceRequest = $serviceRequest;
        $this->performer = $performer;
        $this->notificationType = $notificationType;
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
        $message = "{$this->performer->first_name} {$this->performer->last_name} ";
        
        switch ($this->notificationType) {
            case 'accepted':
                $message .= "accepted the {$this->serviceRequest->procedure_type} service request.";
                break;
            case 'declined':
                $message .= "declined the {$this->serviceRequest->procedure_type} service request.";
                break;
            case 'completed':
                $message .= "completed the {$this->serviceRequest->procedure_type} service request.";
                break;
            default:
                // Default message for unknown notification types
                $message .= "performed an action on the {$this->serviceRequest->procedure_type} service request.";
        }

        return [
            'service_id' => $this->serviceRequest->request_id,
            'performer_id' => $this->performer->id,
            'performer_first_name' => $this->performer->first_name,
            'performer_last_name' => $this->performer->last_name,
            'status' => $this->notificationType,
            'procedure_type' => $this->serviceRequest->procedure_type, // Add procedure_type to the notification data
            'message' => $message
        ];
    }
}
