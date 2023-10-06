<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        $validatedData = $request->validate([
            'body'  => 'required',
        ],[
            'body.required'     => 'Ruas Body Wajib Diisi !',
        ]);

        $pengaduan = Pengaduan::where('slug', $request->slug)->firstOrFail();
        $validatedData['pengaduan_id']  = $pengaduan->id;
        $validatedData['user_id']       = auth()->user()->id;

        Comment::create($validatedData);

        alert()->toast('Komentar berhasil dikirimkan', 'success');
        return redirect()->back();
    }

    public function commentReply(Request $request)
    {
        $validatedData = $request->validate([
            'replyBody'  => 'required',
        ],[
            'replyBody.required'     => 'Ruas Body Wajib Diisi !',
        ]);

        $pengaduan = Pengaduan::where('slug', $request->slug)->firstOrFail();
        $validatedData['pengaduan_id']      = $pengaduan->id;
        $validatedData['comment_id']        = $request->comment_id;
        $validatedData['user_id']           = auth()->user()->id;

        $commentReply = New CommentReply();
        $commentReply->body         = $validatedData['replyBody'];
        $commentReply->comment_id   = $validatedData['comment_id'];
        $commentReply->user_id      = $validatedData['user_id'];
        $commentReply->save();

        
        alert()->toast('Komentar balasan berhasil dikirimkan', 'success');
        return redirect()->back();
    }
}
