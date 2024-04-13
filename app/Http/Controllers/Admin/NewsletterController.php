<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Mail\NewsletterMail;
use Mail;

class NewsletterController extends Controller {

    public function Newsletter() {

        return view('admin.newsletter', ['usuario' => Auth::user()]);
    }

    public function EnviarEmail(Request $request) {

        $request->validate([
            'titulo' => 'required|string',
            'mensagem' => 'required',
        ]);

        $i = 0;

        foreach (Newsletter::all() as $newsletter) {
            Mail::to($newsletter->email)->send(new NewsletterMail($request->all()));
            $i++;
        }

        return redirect()->route('admin.newsletter')->with('success', __('Email enviado para ' . $i . ' pessoas!'));
    }

}
