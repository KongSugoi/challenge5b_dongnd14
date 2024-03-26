<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\ChatModel;
class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $data['header_title'] = "My Chat";
        $sender_id =Auth::user()->id;

        if(!empty($request->receiver_id))
        {
            $receiver_id = base64_decode($request->receiver_id);
            if($receiver_id == $sender_id)
            {
                return redirect()->back()->with('warning', 'Something Error, Please Try Again');                
                exit();
            }

            $data['getReceiver'] = User::getSingle($receiver_id);
            $data['getChat'] = ChatModel::getChat($receiver_id, $sender_id);
        }

        return view('chat.list',$data);
    }
    public function submit_message(Request $request)
    {
        $chat = new ChatModel;
        $chat->sender_id = Auth::user()->id;
        $chat->receiver_id = $request->receiver_id;
        $chat->message = $request->message;
        $chat->created_date = time();
        $chat->save();

        $json['success'] = true;
        echo json_encode($json);
    }
}
