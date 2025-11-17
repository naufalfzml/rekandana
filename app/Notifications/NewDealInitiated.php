<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewDealInitiated extends Notification implements ShouldQueue
{
    use Queueable;

    public $proposal;
    public $sponsor;

    public function __construct($proposal, $sponsor)
    {
        $this->proposal = $proposal;
        $this->sponsor = $sponsor;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🎉 Kabar Gembira! Sponsor Tertarik dengan Proposal Anda')
            ->view('emails.new-deal-initiated', [
                'mahasiswa' => $notifiable,
                'proposal' => $this->proposal,
                'sponsor' => $this->sponsor
            ]);
    }
}