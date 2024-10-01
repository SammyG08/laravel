<?php

namespace App\Livewire;

use App\Events\MessageSentEvent;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{

    public $user;
    public $message;
    public $messages;

    public $eventCalledAlready = false;


    public function mount(User $user = null)
    {
        $this->user = $user;
        // $message = new Message();
        $this->messages = Message::with('user')->whereIn('sender_id', [Auth::user()->id, $user->id])
            ->whereIn('receiver_id', [$user->id, Auth::user()->id])->orderBy('created_at', 'asc')->get();

        // if ($user->messages()->with('user')->where('sender_id', Auth::user()->id)->get()->count()) {
        //     if ($message->with('user')->where('sender_id', $user->id)->where('reciever_id', Auth::user()->id)->get()->count()) {
        //         $this->messages = $message->with('user')->where('sender_id', $user->id)->orWhere('reciever_id', Auth::user()->id)->get();
        //         dd($this->messages);
        //     } else {
        //         $this->messages = $user->messages()->with('user')->where('sender_id', Auth::user()->id)->get();
        //     } // dd($this->messages);
        // } else {
        //     $this->messages = Message::with('user')->where('receiver_id', Auth::user()->id)->where('sender_id', $user->id)->get();
        //     // dd($this->messages);
        // }
    }

    #[On('echo:chats,MessageSentEvent')]
    public function listenForMessage($data)
    {
        $this->messages = Message::with('user')->whereIn('sender_id', [Auth::user()->id, $data['receiverUserId']])
            ->whereIn('receiver_id', [$data['receiverUserId'], Auth::user()->id])->orderBy('created_at', 'asc')->get();
        // dd($this->messages);
        $this->eventCalledAlready = true;
    }

    public function saveMessage()
    {
        // dd(vars: $this->user);

        MessageSentEvent::dispatch($this->message, $this->user);
        // $this->messages = null;
        $this->message = '';
    }
    public function render()
    {
        return view('livewire.chat-component', data: ['user' => $this->user, 'messages' => $this->messages, 'eventCalled' => $this->eventCalledAlready]);
    }
}
