<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class ClientsController extends Controller
{
    public function create_token(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
            'contry_id' => 'required',
        ]);

        $user = Client::where('phone', $request->input('phone'))->where('contry_id', $request->input('contry_id'))->where('accepted', '1')->first();

        if (! $user || ! Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'error' => 'The provided credentials are incorrect.'
            ]);
        }

        $token = $user->createToken('ios')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
}
