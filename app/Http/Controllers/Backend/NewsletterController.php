<?php

namespace App\Http\Controllers\Backend;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Mail\NewsletterEmail;
use App\Models\ContactMessage;
use App\Mail\ContactMessageMail;
use App\Jobs\SendNewsletterEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageReplyMail;

class NewsletterController extends Controller
{
    /**
     * Display the newsletter subscribers page data.
     */
    public function index(Request $request, Newsletter $newsletter)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $newsletters = $newsletter->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $newsletters = $newsletter->latest()->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.newsletter.index', compact('newsletters'));
    }


    /**
     * Delete newsletter subscribers data.
     */
    public function delete($id, Newsletter $newsletter)
    {
        $newsletter = $newsletter->findOrFail($id);
        $newsletter->delete();
        return back();
    }


    /**
     * Submitting newsletter form, data comming from ajax.
     */
    public function newsletterFormSubmit(Request $request, Newsletter $newsletter)
    {
        $newsletter->email = $request->email;
        $newsletter->save();
        return response()->json([
            'status' => '200',
            'value' => $request->email,
        ]);
    }


    /**
     * Submitting newsletter form, data comming from ajax.
     */
    public function newsletterSendEmaiToAllSubscribers(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {
            $from = env('MAIL_FROM_ADDRESS');
            $details = [
                'message' => $request->message,
                'subject' => $request->subject,
                'from' => $from,
            ];

            $subscribers = Newsletter::all();
            $count = $subscribers->count();
            if ($count > 0) {
                foreach ($subscribers as $subscriber) {
                    SendNewsletterEmail::dispatch($subscriber, $details);
                }
                return back()->with('success', 'Emails queued for sending to all subscribed users.');
            } else {
                return back()->with('error', 'No emails found');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return back();
    }





    /**
     * Display the contact messages page data.
     */
    public function ContactMessageIndex(Request $request, ContactMessage $contactMessage)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $contactMessages = $contactMessage->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $contactMessages = $contactMessage->latest()->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.contactMessages.index', compact('contactMessages'));
    }


    /**
     * Saving contact form using ajax.
     */
    public function contactFormSubmit(Request $request, ContactMessage $contactMessage)
    {
        $contactMessage->name = $request->name;
        $contactMessage->email = $request->email;
        $contactMessage->messages = $request->message;
        $contactMessage->save();

        Mail::to('hello@gmail.com')->send(new ContactMessageMail());

        return response()->json([
            'status' => '200',
            'value' => $request->email,
        ]);
    }


    public function contactMessageDelete($id, ContactMessage $contactMessage)
    {
        $contactMessage = $contactMessage->findOrFail($id);
        $contactMessage->delete();
        return back();
    }


    public function contactMessageReply(Request $request, ContactMessage $contactMessage)
    {
        try {
            $request->validate([
                'subject' => 'required',
                'message' => 'required',
            ]);

            $from = env('MAIL_FROM_ADDRESS');
            $details = [
                'message' => $request->message,
                'subject' => $request->subject,
                'from' => $from,
            ];

            $receiver = $contactMessage->where('id', $request->contactMessageId)->first();
            if ($receiver) {
                Mail::to($receiver->email)->send(new ContactMessageReplyMail($details));
                return back()->with('success', 'Email sent successfully');
            } else {
                return back()->with('error', 'Receiver email not found');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
