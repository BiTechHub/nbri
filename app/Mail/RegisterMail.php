<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;  
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Application;
use App\Models\Guest;
use App\Models\Organization;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    
    
    /**
     * Create a new message instance.
     */
  // RegisterMail.php

public function __construct(Application $application)
{
    $this->application = $application;
    // Eager load guests
}


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Registration Received'
        );
    }

    /**
     * Get the message content definition.
     */
   
    
    public function build()
    {
         $guests = Guest::where('application_id', $this->application->application_id)->get();
        
        // Fetch the organization associated with the application using the organization_id
        $org = Organization::where('id', $this->application->organization_id)->first();
      
        return $this->view('emails.register')
                    ->with([
                'application' => $this->application, // Pass the application data
                'guests' => $guests, // Pass the guests data
                'organization' => $org, // Pass the organization data
            ])
          ->subject('CSIR-NBRI: Guest House Application');
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
