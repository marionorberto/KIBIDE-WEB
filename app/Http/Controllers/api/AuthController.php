<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        try {
            $credentials = $request->only(['username', 'password']);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                // $token = $user->createToken('api_token')->plainTextToken; // se estiver usando Sanctum

                return response()->json([
                    'message' => 'Login efetuado com sucesso.',
                    'user' => $user,
                    'token' => 'token??',
                    'role' => $user->role,
                ], 200);
            }

            return response()->json([
                'message' => 'Credenciais inválidas.'
            ], 401);

        } catch (\Exception $e) {
            Log::error('Erro no login: ' . $e->getMessage());

            return response()->json([
                'message' => 'Ocorreu um erro ao tentar fazer login. Tente novamente mais tarde.'
            ], 500);
        }
    }

    public function registerStudent()
    {
        return view('auth.register-student');
    }

    public function registerMentor()
    {
        return view('auth.register-mentor');
    }



    public function create()
    {
        return view('auth.register-company');
    }


    public function store(Request $request)
    {
        return view('auth.login');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function chooseRole(Request $request)
    {
        return view('auth.choose-role');
    }

    public function changePassword(StoreChangePasswordRequest $request)
    {
        try {

            $user = User::find(Auth::user()->id_user);

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password Atualizada com sucesso. Seu próximo Login use a sua nova Password.');

        } catch (\Exception $e) {
            Log::error('Erro no update Password: ' . $e->getMessage());

            return back()->with('error', 'Ocorreu tentando atualizar a senha do usuário .');
        }
    }



}
