<?php

namespace App\Mail;

use App\Order;
use App\Product;
use App\Color;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class validCartMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $product;
    public $color;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, Product $product, User $user, Color $color)
    {
        $this->order=$order;
        $this->product=$product;
        $this->user=$user;
        $this->color=$color;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.validCartMail');
    }
}
