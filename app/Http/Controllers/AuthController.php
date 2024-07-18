<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('autorized.login');
    }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $email = $request->input('email');

    if ($email === 'den@gmail.com') {
        // Store the special label in the session for the main administrator
        session(['special_label' => 'Главный администратор']);
        return redirect()->route('create_client');
    }

    $client = Client::where('email', $email)->first();

    if ($client && $client->role_id == 2) { // 2 - role_id for "Admin"
        // Store the admin's first name in the session
        session(['first_name' => $client->first_name]);
        return redirect()->route('admin_create_country');
    } else {
        return back()->withErrors(['email' => 'The provided email does not match our records or you do not have the admin role.']);
    }
}

    

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
