<?php
 
namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
 
class SocialAuthController extends Controller
{
 
    /*public function __construct()
    {
        $this->middleware('guest');
    }*/
 
    /**
     * List of providers configured in config/services acts as whitelist
     *
     * @var array
     */
    protected $providers = [
        'github',
        'facebook',
        'google',
        'twitter'
    ];
 
    /**
     * Show the social login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('auth.social');
    }
 
    /**
     * Redirect to provider for authentication
     *
     * @param $driver
     * @return mixed
     */
    public function redirectToProvider($driver)
    {
        if( ! $this->isProviderAllowed($driver) ) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }
 
        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }
 
    /**
     * Handle response of authentication redirect callback
     *
     * @param $driver
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback( $driver )
    {
        try {
            $user = Socialite::driver($driver)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
 
        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
            : $this->loginOrCreateAccount($user, $driver);
    }
 
    /**
     * Send a successful response
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendSuccessResponse()
    {
        return redirect()->intended('home');
    }
 
    /**
     * Send a failed response with a msg
     *
     * @param null $msg
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }
 
    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();
 
        // if user already found
        if( $user ) {
            // update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user I can't get the name of the account on my own github, but I can get the nickname.
            $user = User::create([
                'name' => $providerUser->getName()?:$providerUser->getNickName(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar(),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                // user can use reset password to create a password
                'password' => ''
            ]);
        }
 
                 // login the user, web version login, native auth verification
        Auth::login($user, true);
 
        return $this->sendSuccessResponse();
 
               //Login return value in API form (return JWT token)
       /*$user = BaUser::where('email', $providerUser->getEmail())->first();
        if ($token = auth()->login($user)) {
            $return = [
                'code'=>200,
                                 'msg'=>'login successful',
                'data'=>['token'=>'Bearer '.$token],
            ];
            return response()->json($return);
        } else {
            return response()->json([
                'code'=>400,
                                 'msg'=>'Login failed',
            ]);
        }*/
 
    }
 
    /**
     * Check for provider allowed and services configured
     *
     * @param $driver
     * @return bool
     */
    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
}