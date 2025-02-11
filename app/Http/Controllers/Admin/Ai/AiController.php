<?php

namespace App\Http\Controllers\Admin\Ai;

use App\Contracts\Ai\AiInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ai\AiRequest;
use App\Services\Ai\AiService;
use Illuminate\Http\Request;

class AiController extends Controller
{
    protected AiService $aiService;
    protected AiInterface $repository;

    public function __construct(AiService $aiService, AiInterface $repository)
    {
        $this->aiService = $aiService;
        $this->repository = $repository;
    }

    public function index()
    {

    }

    public function form()
    {
        $settings = $this->repository->find(['id' => 1]);

        $data = [
            "settings" => $settings,
        ];

        return view('admin.ai.ai-form', $data);
    }

    public function store(AiRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->repository->store($request->all(), $request->id);

        return redirect()->route('admin.ai.form')->with('success', 'Ayarlar kaydedildi!');
    }

    public function ask(Request $request)
    {
        $request->validate(['webpage' => 'required|string']);

        $settings = $this->repository->find(['id' => 1]);
        $response = $this->aiService->sendPrompt($request->webpage, $settings->prompt);

        return response()->json($response);
    }
}
