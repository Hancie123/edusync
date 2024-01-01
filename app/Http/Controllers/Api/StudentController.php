<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\StudentAccountMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')]

        ]);
        try {
            $user = DB::transaction(function () use ($request) {
                $user = User::create(
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'address'=>$request->address,
                        'phone'=>$request->phone,
                        "role" => "student",
                        'class_id'=>$request->class_id,
                        'institution_id'=>auth()->user()->institution_id,
                        'password' => Hash::make('1234'),
                       

                    ]
                );
               
                $token = Str::random(60);

                DB::table('password_resets')->insert([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => now(),
                ]);

                Mail::to($request->email)->send(new StudentAccountMail($user, $token));
                return $user;
            });
            if ($user) {
                
                return responseSuccess($user,200,'Student Account Created Successfully!');
            }
        } catch (\Exception $e) {
            return responseError($e->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function setPasswordIndex()
    {
        return view('complete_registration');
    }


  

    public function setNewUserPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required']

        ]);
        $token = $request->token;

        if (!$token) {
            sweetalert()->addWarning('Invalid Token!');
        }

        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            sweetalert()->addWarning('Token Not Found!');
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user) {
            sweetalert()->addWarning('User Not Found!');
        }

        try {
            DB::transaction(function () use ($user, $request, $token) {
                $user->password = Hash::make($request->input('password'));
                $user->email_verified_at = now();
                $user->save();
                $passwordReset = PasswordReset::where('token', $token)->delete();
            });
            sweetalert()->addSuccess('Password Set Successfully!');
            return redirect('/');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}