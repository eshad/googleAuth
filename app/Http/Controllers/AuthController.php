<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OTPHP\TOTP;
use OTPHP\Base32;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function verifyCode(Request $request){
        $secret = $request->input('secret');
        $code = $request->input('code');

        // Verify the code using OTPHP
        $isValid = TOTP::verify($code, $secret);

        if ($isValid) {
            return response()->json(['message' => 'Code is valid'], 200);
        } 
        else {
            return response()->json(['message' => 'Invalid code'], 400);
        }
    }

    public function testCode(){
        return view('testCode');
    }
    public function authenticate(Request $request)
    {
        // Get the user's secret key from the database (assuming it's stored there)
        // $user = auth()->user();
        // $secretKey = $user->google2fa_secret;
        $data = $request->json()->all();

        // $secretKey = $request->query('secret');
        $secretKey = $data['secret'];
        // $secretKey = $request->input('secret');

        // Get the one-time password (OTP) entered by the user
        $otp = $data['one_time_password'];
        // $otp = $request->query('one_time_password');
        // $otp = $request->input('one_time_password');


        

        //return $data['secret'];

        // Instantiate Google2FA
        $google2fa = app('pragmarx.google2fa');

        // Validate the OTP
        $valid = $google2fa->verifyKey($secretKey, $otp);

        if ($valid) {
            // OTP is valid, authenticate the user
            // For example, log the user in or set a session variable
            // You can also redirect the user to a dashboard or any other page
            // For now, let's just return a success response
            return response()->json([
                'status' => 'success',
                'msg' => 'auth successful',
                'code' => '200'
            ]);
        } else {
            // OTP is invalid, redirect the user back with an error message
            //return redirect()->back()->with('error', 'Invalid one-time password');
             // OTP is invalid, return a failed JSON response
        return response()->json([
            'status' => 'failed',
            'msg' => 'auth failed',
            'code' => '401'
        ]);
        }
    }


    public function generateSecretAndQR(Request $request)

    {
        $google2fa = app('pragmarx.google2fa');
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
        $registration_data['email'] = "uiu025@gmail.com";

        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );

        //var_dump($QR_Image);

        // Pass the QR barcode image to our view
        return view('qrview', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);

    }

    public function login(Request $request)
    {
        // Verify username and password (you can use Laravel's built-in authentication)
        $username = $request->input('username');
        $password = $request->input('password');
        $secret = $request->input('secret');

        return $username;
    }
    public function test() {
        $output = "Hello";
        $file =   getcwd().'/log.txt'; // Assuming log.txt is the file you want to append to
        $text = date('y-m-d H:i:s') . ' withdrawal: ' . $output . "\r\n";
        
        // Append text to the file
        $result = file_put_contents($file, $text, FILE_APPEND);
        return $result;
    }
}
