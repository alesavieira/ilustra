<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Mail;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller {

    protected $categoria;

    public function __construct(Categoria $categoria) {
        //$this->middleware('auth');
        $this->categoria = $categoria;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('site.index');
    }

    public function getContato() {
        return view('site.contato.contato');
    }

    public function postContato() {
        $data = Input::all();

        Mail::send('site.emails.mailcontato', $data, function($message) {
            $message->from(Input::get('email'), Input::get('nome'));
            $message->to('alesavieira@gmail.com')->subject('Formulário de contato recebido');
        });
        return view('site.contato.contato');
    }

}
