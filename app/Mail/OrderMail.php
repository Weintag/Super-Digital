<?php

namespace App\Mail;

use App\Models\Order;
use PharIo\Manifest\Url;
use App\Models\OrderProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderproduct;
    public $totalPrice;
  

    /**
     * Create a new message instance.
     */
    public function __construct($order, $orderproduct, $totalPrice)
    {
        $this->order = $order;
        $this->orderproduct = $orderproduct;
        $this->totalPrice = $totalPrice;
  
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Спасибо за покупку в нашем магазине "Супер Цифровой"!',
        );
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'ordermail',
            with: [
                'order' => $this->order,
                'orderproduct' => $this->orderproduct,
                'totalPrice' => $this->totalPrice,
            ],
        );
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
