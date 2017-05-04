<?php

namespace RogerFornerTodosBackend\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Mail;
use RogerFornerTodosBackend\Mail\NewUserWelcome;
use Session;
use function view;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * EmailController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('emails.index');
    }

    /**
     * "Show the form for creating a new resource."
     *
     * Enviar un email.
     * Es tracta d'enviar un email a l'usuari que faci clic al botó enviar en la vista /emails/index.blade
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        //Funció Mail (pbjecte).
        //to() a qui anirà dirigit l'email. Ens interessa el correu de l'usuari autenticat Auth::user()->email.
        //Amb send(new NewUserWelcome()) estem dient el què enviem amb el mail. En el nostre cas és un objecte nou, que
        //contindrà el contingut de la vista /emails/user/newuserwelcome.blade.php
        //Sabem que serà emprada la vista esmentada perquè si ens dirigim al fitxer /Http/Mail/NewUserWelcome.php veurem
        //que el mètode build ho defineix així.
        Mail::to(Auth::user()->email)->send(new NewUserWelcome());

        Session::flash('success', 'The email has been successfully sent.');

        return redirect()->route('emails.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}