<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrcamentoMail extends Mailable {

    use Queueable,
        SerializesModels;

    public $form;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($form) {
        $this->form = (object)$form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject('Solicitação de orçamento pelo site')
                        ->view('emails.OrcamentoMail');
    }

}
