<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event; //importar a model Events para o controller EventsController
use App\Models\User; //importar a model User para o controller EventsController

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) {
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $events = Event::all(); //Seleciona todos os dados do bd através da model Events     
        }

        return view('welcome', ['events' => $events, 'search' => $search]);

        strtotime($events->date);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $event = new Event;

        $event->title       = $request->title;
        $event->date        = $request->date;
        $event->city        = $request->city;
        $event->private     = $request->private;
        $event->description = $request->description;
        $event->items       = $request->items;

        //Upload da Imagem

        if ($request->hasFile('image') && ($request->file('image')->isValid())) {
            $requestImage = $request->image;
            $extension    = $requestImage->extension();
            $imageName    = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        } else {
            return redirect('/events/create')->with('erro', 'É necessário preencher todos os campos');
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event], ['eventOwner' => $eventOwner]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;
        return view('events.dashboard', ['events' => $events]);
    }
}