<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProposalStatusUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    public $status;
    public $proposalTitle;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $status, string $proposalTitle)
    {
        $this->status = $status;
        $this->proposalTitle = $proposalTitle;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = $this->status === 'disetujui'
            ? "🎉 Selamat! Proposal Anda Disetujui"
            : "Status Proposal Anda Diperbarui";

        return (new MailMessage)
            ->subject($subject)
            ->view('emails.proposal-status-updated', [
                'mahasiswa' => $notifiable,
                'status' => $this->status,
                'proposalTitle' => $this->proposalTitle
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
