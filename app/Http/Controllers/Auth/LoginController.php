<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/expenses';

    
    //   Create a new controller instance.
     
    //   @return void
     
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    
    //   Obtain the user information from Google.
     
    //   @return Response
     
    

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        // return $user->token;
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $existingUser = User::where('email', $user->email)->first();        
        if($existingUser){
            // User already exists
          return $user;
        } else {
            // create a new user

            $name = explode(' ', $user->name);
            
            // $newUser                  = new User;


$newUser = User::create([
        'first_name' => $name[0],
        'last_name' => $name[1] ?? $name[0], 
        'email' => $user->email,
        'password' =>  Hash::make(Str::random(8)),
        'provider_id' => $user->id,
        'provider' => $provider
    ]);

            // $newUser->first_name            = $name[0];
            // $newUser->last_name            = $name[1] ?? $name[0];
            // $newUser->email           = $user->email;
            // $user->password =           Hash::make(Str::random(8));
            // $newUser->provider_id       = $user->id;
            // $newUser->provider = $provider;
            // dd($newUser->getAttributes());
            // $newUser->save();     
        }
        return $newUser;
    }

}
