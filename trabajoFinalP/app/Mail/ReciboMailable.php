<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReciboMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $carrito;
    public $total;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @param array $cliente
     * @param array $carrito
     * @param float $total
     * @param string $pdf
     */
    public function __construct($cliente, $carrito, $total, $pdf)
    {
        $this->cliente = $cliente;
        $this->carrito = $carrito;
        $this->total = $total;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->view('emails.recibo')
            ->subject('Recibo de Compra')
            ->attachData($this->pdf, 'recibo.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}