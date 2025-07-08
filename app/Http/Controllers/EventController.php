<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        return Event::all()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => Carbon::parse($event->start)->format('Y-m-d\TH:i:s'),
                'end' => $event->end ? Carbon::parse($event->end)->format('Y-m-d\TH:i:s') : null,
                'allDay' => $event->all_day,
                'backgroundColor' => $event->background_color,
                'borderColor' => $event->border_color,
                'textColor' => $event->text_color,
                'extendedProps' => $event->extended_props,
            ];
        });
    }
}