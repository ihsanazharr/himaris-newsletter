<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Handle subscribe form submission from the footer.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $email = strtolower(trim($request->email));

        // Check if already subscribed
        $existing = Subscriber::where('email', $email)->first();

        if ($existing) {
            return back()->with('subscribe_message', 'You are already subscribed! Check your inbox for updates.');
        }

        Subscriber::create([
            'email'    => $email,
            'token'    => Subscriber::generateToken(),
            'verified' => true, // direct subscribe, no email verification required
        ]);

        return back()->with('subscribe_message', 'Thank you for subscribing! You will now receive updates from Himaris Newsletter.');
    }

    /**
     * Handle unsubscribe via token link from the email.
     */
    public function unsubscribe(string $token)
    {
        $subscriber = Subscriber::where('token', $token)->first();

        if (!$subscriber) {
            abort(404, 'Unsubscribe link is invalid or has already been used.');
        }

        $email = $subscriber->email;
        $subscriber->delete();

        return view('pages.unsubscribed', compact('email'));
    }
}
