<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    public function __construct(public Event $event)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json($this->event->all());
    }
}
