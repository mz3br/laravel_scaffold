<?php

namespace App\Actions\Auth;

use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use App\Tools\FlashMessage;
use App\Traits\ApiResponses;
use App\Traits\HybridResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class PostResetPasswordAction
{
    use ApiResponses, HybridResponse;

    private User $user;

    public function __invoke(ResetPasswordRequest $request)
    {

        $storedHash = Cache::get("password_reset_token_{$request->user}");

        if (!Hash::check($request->token, $storedHash)) {
            return back()->withErrors([
                'credentials' => 'Link inválido ou expirado, solicite novamente o e-mail da senha.',
            ]);
        }
        // TODO: LOg de auditoria

        $user = User::findOrFail($request->user);

        $user->update([
            'password' => $request->password,
        ]);

        FlashMessage::success('Você já pode fazer login com a nova senha', 'Senha alterada com sucesso');

        return to_route('get.auth.login');
    }

    protected function json()
    {
        // return response()->json([
        //     'user' => $this->user,
        //     'token' => $this->user->createToken('auth_token')->plainTextToken,
        // ]);
    }

    protected function inertia()
    {
        // return back()->with([
        //     'success' => true,
        // ]);
    }
}
