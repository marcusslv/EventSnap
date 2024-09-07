<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function __construct(public Event $event)
    {
    }

    public function index(): JsonResponse
    {
        $with = request()->get('with', []);

        return response()->json($this->event->with($with)->get());
    }

    public function show(int $event): JsonResponse
    {
        $with = request()->get('with', []);
        $event = $this->event->with($with)->find($event);

        if (! $event) {
            return response()->json(['message' => 'Event not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'message' => 'Event found successfully',
            'event' => $event
        ]);
    }

    public function store(StoreEventRequest $request): JsonResponse
    {
        $data = $request->validated();
        $event = $this->event->create($data);

        return response()->json([
            'message' => 'Event created successfully',
            'event' => $event->toArray()
        ]);
    }

    public function update(UpdateEventRequest $request, Event $event): JsonResponse
    {
        $data = $request->validated();
        $event->update($data);

        return response()->json([
            'message' => 'Event updated successfully',
            'event' => $event->toArray()
        ]);
    }

    public function destroy(int $event): JsonResponse
    {
        $event = $this->event->find($event);

        if (! $event) {
            return response()->json(['message' => 'Event not found'], Response::HTTP_NOT_FOUND);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
