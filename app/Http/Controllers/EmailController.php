<?php

namespace App\Http\Controllers;

use App\Mail\SendingEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function sendmail(Request $request)
    {
        // Retrieve the user from the database
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            Log::error('User not found for email: ' . $request->email);
            return redirect()->route('admin-desa.index')->with('error', 'User not found');
        }

        // Prepare the data to be passed to the email
        $data = [
            'username' => $user->username,
            'password' => $user->password, // Assuming this is not hashed, if it is, you should handle it appropriately
        ];

        // Log the email data
        Log::info('Sending email to: ' . $user->email, $data);

        // Send the email with the user data
        try {
            Mail::to($user->email)->send(new SendingEmail($data));
            Log::info('Email sent successfully to: ' . $user->email);
            return redirect()->route('admin-desa.index')->with('success', 'Email successfully sent.');
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            return redirect()->route('admin-desa.index')->with('error', 'Failed to send email.');
        }
    }
}
