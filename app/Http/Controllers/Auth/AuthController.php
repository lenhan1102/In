<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\User;
use Validator;
use App\Http\Controllers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use App\Http\Controllers\Controller;
use Socialite;
use App\SocialAccountService;
use App\SocialAccount;

class AuthController extends Controller
{

	protected $redirectPath = 'index';
	protected $loginPath = 'auth/login';
	protected $redirectAfterLogout = 'auth/login';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function authenticate()
    {

    }
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']), 
            ]);
    }
    public function redirectToProvider()
    {
       return Socialite::driver('facebook')->scopes(['public_profile', 'email'])->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */

    public function handleProviderCallback()
    {
      $providerUser = Socialite::driver('facebook')->user();
      $user = $this->createOrGetUser($providerUser);	
      Auth::login($user);

      return redirect()->to('index');
    }

    /**
     * Get existed account or create new
     *
    */
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')->whereProviderUserId($providerUser->getId())->first();

        if ($account) {

            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
                ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            
            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'avatar' => $providerUser->getAvatar(),
                    ]);
            }
            
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
    /**
     *
    */
}
