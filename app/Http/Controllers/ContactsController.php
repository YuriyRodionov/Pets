<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function index() {
        $contacts = User::where('id', '!=', Auth::id())->get();

        $unreadMessages = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', Auth::id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        $contacts = $contacts->map(function($contact) use($unreadMessages) {
            $contactUnread = $unreadMessages->where('sender_id', $contact->id)->first();

            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });

        return response()->json($contacts);
    }

    public function getMessagesFor($id) {

        Message::where('from', $id)->where('to', Auth::id())->update(['read' => true]);

        $messages = Message::where(function($q) use($id) {
            $q->where('from', Auth::id());
            $q->where('to', $id);
        })->orWhere(function($q) use($id) {
            $q->where('from', $id);
            $q->where('to', Auth::id());
        })->get();

        return response()->json($messages);
    }

    public function send(Request $request) {
        $message = Message::create([
            'from' => $request->from,
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        broadcast(new NewMessage($message));
        return response()->json($message);
    }
}
