<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller {

    protected $providers = ['google', 'facebook'];

    public function redirectToProvider($driver) {

        if (!$this->isProviderAllowed($driver)) {
            return $this->sendFailedResponse("{$driver} is not currently supported");
        }
        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {

            // You should show something simple fail message

            return $this->sendFailedResponse();
        }
    }

    public function handleProviderCallback($driver) {

        try {
            $user = Socialite::driver($driver)->user();

          
        } catch (Exception $e) {
  
            return $this->sendFailedResponse();
        }

        // check for email in returned user
        return empty($user->email)
        ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
        : $this->loginOrCreateAccount($user, $driver);
    }

    protected function sendSuccessResponse() {
        return redirect(route('home'));
    }

    protected function sendFailedResponse($msg = null) {
        return redirect()->route('ext-login')->with(['error' => $msg ? $msg: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver) {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found
        if ($user) {
            // update the avatar and provider that might have changed
            $user->update([
                'oauth_provider' => $driver,
            ]);
        } else {
            // create a new user
            $user = User::create([
                'name'     => $providerUser->getName(),
                'email'    => $providerUser->getEmail(),
                'status'    => 1,
                // user can use reset password to create a password
                'password' => '',
            ]);
            $user->roles()->attach(3);
        }

        // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($driver) {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
}
