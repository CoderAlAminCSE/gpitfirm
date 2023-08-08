<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Mail\TestConnectionMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SmtpController extends Controller
{
    /**
     * Display the SMTP settigns page content.
     */
    public function index()
    {
        return view('backend.smtp.index');
    }


    /**
     * Update SMTP settigns page content.
     */
    public function update(Request $request)
    {
        $request->validate([
            'driver' => 'required',
            'port' => 'required',
            'username' => 'required',
            'from' => 'required',
            'host' => 'required',
            'password' => 'required',
            'from_name' => 'required',
        ]);

        try {
            // Update the mailer value from .env file
            overWriteEnvFile('MAIL_MAILER', $request->driver);
            overWriteEnvFile('MAIL_HOST', $request->host);
            overWriteEnvFile('MAIL_PORT', $request->port);
            overWriteEnvFile('MAIL_USERNAME', $request->username);
            overWriteEnvFile('MAIL_PASSWORD', $request->password);
            overWriteEnvFile('MAIL_ENCRYPTION', $request->encryption);
            overWriteEnvFile('MAIL_FROM_ADDRESS', $request->from);
            overWriteEnvFile('MAIL_FROM_NAME', $request->from_name);
            return back()->with('success', 'SMTP updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return back();
    }


    /**
     * SMTP connection test.
     */
    public function test()
    {
        try {
            Mail::to('hello@gmail.com')->send(new TestConnectionMail());
            return back()->with('success', 'SMTP connected successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return back();
    }
}
