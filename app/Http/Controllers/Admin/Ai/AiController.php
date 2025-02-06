<?php

namespace App\Http\Controllers\Admin\Ai;

use App\Http\Controllers\Controller;
use App\Services\Ai\AiService;
use Illuminate\Http\Request;

class AiController extends Controller
{
    protected AiService $aiService;

    public function __construct(AiService $aiService)
    {
        $this->aiService = $aiService;
    }

    public function index()
    {

    }

    public function form()
    {
        return view('admin.ai.ai-form');
    }

    public function ask(Request $request)
    {
        $request->validate(['prompt' => 'required|string']);

        $response = $this->aiService->sendPrompt($request->input('prompt'));

        return response()->json(['response' => $response]);
    }
}
