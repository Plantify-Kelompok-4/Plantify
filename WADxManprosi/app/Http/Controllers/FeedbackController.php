<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')->get(); 
        return view('feedback.index', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $request->validate(['content' => 'required']);
        Feedback::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['content' => 'required']);
        $feedback = Feedback::findOrFail($id);
        $feedback->update(['content' => $request->content]);
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback berhasil dihapus.');
    }
}
