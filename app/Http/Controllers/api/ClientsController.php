<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
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

                'access_token' => '',
            'error' => 'The provided credentials are incorrect.',
            'token_type' => ''
            ]);
        }

        $token = $user->createToken('ios')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'error' => '',
            'token_type' => 'Bearer'
        ]);
    }


    public function sungupp(Request $request)
    {


        try {

          //  $data = $this->getData($request);

         $client =    new Client();
         $client->first_name = $request->first_name ;
         $client->last_name = $request->last_name ;
         $client->phone = $request->phone ;
         $client->ud = $request->ud ;
         $client->email = $request->email ;
         $client->photo_ud_frent = $request->photo_ud_frent ;
         $client->photo_ud_back = $request->photo_ud_back ;
         $client->password = $request->password ;
         $client->contry_id = $request->contry_id ;
         $client->save();
         return response()->json([
            'id' => 1,
            'message' => 'success',
            'errors' => ''
        ]);
        } catch (Exception $exception) {
            return response()->json([
                'id' => '',
                'message' => '',
                'errors' => ''
            ]);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }





    public function signature($id, Request $request)
    {
        try {
            $request->validate([
                'signature' => 'required',

            ]);

            $image = $request->signature;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(12) . '.png';

            Storage::disk('local')->put('images/'.$imageName, base64_decode($image));

            $client = Client::findOrFail($id);
            $client->singateur = $imageName;
            $client->save();
            return response()->json([
                'id' => $client->id,
                'message' => 'success'
            ]);
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }



    public function confiramtion($id, Request $request)
    {
        try {
            $request->validate([
                'code' => 'required',

            ]);


            $client = Client::findOrFail($id);
            if($client->code == $request->code){
                $client->virification = 1;
                $client->save();
            $token = $client->createToken('ios')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
            }else{
                return response()->json([
                    'error' => 'The code incorrect.'
                ]);
            }


        } catch (Exception $exception) {
           dd( $exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }




        protected function getData(Request $request)
    {
        $rules = [
                'first_name' => 'string|min:1|required',
            'last_name' => 'string|min:1|required',
            'phone' => 'required|numeric|min:8|unique:clients,phone',
            'ud' => 'required|numeric|min:12|unique:clients,ud',
            'email' => 'required|email|min:10|max:255|unique:clients,email',
            'photo_ud_frent' => 'file|nullable',
            'photo_ud_back' => 'file|nullable',
            'password' => 'required',
            'contry_id' => 'required',

        ];




        $data = $request->validate($rules);
        if ($request->hasFile('photo_ud_frent')) {
            $data['photo_ud_frent'] = $this->moveFile($request->file('photo_ud_frent'));
        }
        if ($request->hasFile('photo_ud_back')) {
            $data['photo_ud_back'] = $this->moveFile($request->file('photo_ud_back'));
        }


        $data['password']=  Hash::make($data['password']);

        return $data;
    }
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }

        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('images',['disk' => 'public_uploads']);

        return  $saved;
    }
}
