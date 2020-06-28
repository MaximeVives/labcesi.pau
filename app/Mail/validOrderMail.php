<?php

namespace App\Mail;
use App\Order;
use App\Product;
use App\Color;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class validOrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $product;
    public $color;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Product $product, Color $color)
    {
    
        $this->order=$order;
        $this->product=$product;
        $this->color=$color;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.validOrderMail');
    }
}
