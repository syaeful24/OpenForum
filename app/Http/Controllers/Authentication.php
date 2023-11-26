<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class Authentication extends Controller
{
    public function index($page){
        return view('auth.'.$page);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        };

        return back()->with('fail', 'Login gagal');
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:16'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if ($validator->fails()) {
            return redirect('Auth/register')->with('fail', 'Registrasi gagal');
        }
        
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (QueryException $e) {
            return redirect('Auth/register')->with('fail', 'Registrasi gagal. Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect('Auth/register')->with('fail', 'Registrasi gagal. Error: ' . $e->getMessage());
        }
    
        return redirect("Auth/register")->with('success', "Registrasi berhasil!");
    }

    public function logout(Request $request){
        
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/Auth/login');
    }

}
