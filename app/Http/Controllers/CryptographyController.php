<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CryptographyController extends Controller
{
    public function sign()
    {
        $keys = $this->generate_key();
        
        return view('sign', compact('keys'));
    }

    public function verifies_signatures(Request $request)
    {
        $this->validate($request, [
            'public_key' => 'required',
            'signatures' => 'required',
            'messages' => 'required',
        ]);

        $verify = $this->verify_data($request['messages'], $request['signatures'], $request['public_key']);

        return $verify ? 'Verified' : 'Incorrect';

        // return redirect('verify')->with('status', $messages);
    }

    public function create_signatures(Request $request)
    {
        $this->validate($request, [
            'private_key' => 'required',
            'public_key' => 'required',
            'messages' => 'required',
        ]);

        $info_sign = [
            'public_key' => $request['public_key'],
            'messages' => $request['messages'],
            'signatures' => $this->sign_data($request['messages'], $request['private_key'])
        ];

        return view('signatures', compact('info_sign'));
    }

    private function config_key()
    {
        // Create a private/public key pair
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );

        return openssl_pkey_new($config);
    }

    private function generate_key()
    {
        $resource = $this->config_key();

        // Extract private key from the pair
        openssl_pkey_export($resource, $private_key);

        // Extract public key from the pair
        $key_details = openssl_pkey_get_details($resource);
        $public_key = $key_details["key"];

        return array('private' => $private_key, 'public' => $public_key);
    }

    private function sign_data($data, $private_key)
    {
        openssl_sign($data, $raw_signature, $private_key);

        // Use base64_encode to make contents viewable/sharable
        return base64_encode($raw_signature);
    }

    private function verify_data($data, $signature, $public_key)
    {
        $raw_signature = base64_decode($signature);

        return openssl_verify($data, $raw_signature, $public_key);
    }

    private function encrypt_data($plaintext , $public_key)
    {
        openssl_public_encrypt($plaintext, $encrypted, $public_key );

        return base64_encode($encrypted);
    }

    private function decrypt_data($ciphertext , $private_key)
    {
        openssl_private_decrypt(base64_decode($ciphertext), $decrypted, $private_key );

        return base64_encode($decrypted);
    }
}
