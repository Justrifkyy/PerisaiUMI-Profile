<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InboxMessage;
use Illuminate\Http\Request;

class InboxMessageController extends Controller
{
    /**
     * Display all inbox messages
     */
    public function index()
    {
        $messages = InboxMessage::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.inbox.index', compact('messages'));
    }

    /**
     * Show single message detail
     */
    public function show(InboxMessage $message)
    {
        // Mark as read
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.inbox.show', compact('message'));
    }

    /**
     * Store message from contact form (API)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $message = InboxMessage::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim',
            'data' => $message,
        ], 201);
    }

    /**
     * Mark message as read
     */
    public function markAsRead(InboxMessage $message)
    {
        $message->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Pesan ditandai sebagai sudah dibaca');
    }

    /**
     * Mark message as unread
     */
    public function markAsUnread(InboxMessage $message)
    {
        $message->update(['is_read' => false]);
        return redirect()->back()->with('success', 'Pesan ditandai sebagai belum dibaca');
    }

    /**
     * Delete message
     */
    public function destroy(InboxMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.inbox.index')->with('success', 'Pesan berhasil dihapus');
    }

    /**
     * Delete multiple messages
     */
    public function destroyMultiple(Request $request)
    {
        $validated = $request->validate([
            'message_ids' => 'required|array',
            'message_ids.*' => 'required|exists:inbox_messages,id',
        ]);

        InboxMessage::whereIn('id', $validated['message_ids'])->delete();

        return redirect()->route('admin.inbox.index')->with('success', 'Pesan berhasil dihapus');
    }
}
