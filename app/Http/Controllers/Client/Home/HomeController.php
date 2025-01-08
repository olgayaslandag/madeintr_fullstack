<?php

namespace App\Http\Controllers\Client\Home;

use App\Contracts\Tag\TagInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected TagInterface $tagRepository;

    public function __construct(TagInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $data = [
            "tags" => $this->tagRepository->all()
        ];

        return view('client.home.home', $data);
    }
}
