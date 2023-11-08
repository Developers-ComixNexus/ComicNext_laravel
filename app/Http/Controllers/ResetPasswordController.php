<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request)
    {
        // $request->validate([
        //     'new_password' => 'required|min:8',
        // ]);

        // Recibe la nueva contraseña desde el frontend
        $newPassword = $request->password;

        //$user = User::find(auth()->id());
        //$user = User::find($request->cod);

        $user = Usuario::where('cod_usuario', $request ->cod) ->first();

        // Verificar que la nueva contraseña no sea igual a una contraseña anterior
        if (password_verify($newPassword, $user->password)) {
            return response()->json(['message' => 'La nueva contraseña no puede ser igual a una contraseña anterior.', $newPassword,$user->password], 400);
        }

        // Actualizar la contraseña del usuario
        $user->update(['password' => bcrypt($newPassword)]);
        // $user->password = Hash::make($newPassword);

        // echo 'Nueva contraseña: ' . $newPassword;
        // $user->save();

        // echo $user;

        return response()->json(['message' => 'Contraseña restablecida con éxito.']);
    }
}