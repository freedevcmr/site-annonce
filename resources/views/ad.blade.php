@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card bg-light">
        <h5 class="card-header">{{ $ad->title }}</h5>
        @if($photos->isNotEmpty())
            @if($photos->count() > 1)
                <div id="ctrl" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                         @foreach ($photos as $photo)
                            <li data-target="#ctrl" data-slide-to="{{ $loop->index }}" @if($loop->first) class="active" @endif></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($photos as $photo)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img class="d-block w-100" src="{{ asset('images/' . $photo->filename) }}" alt="First slide">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#ctrl" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="carousel-control-next" href="#ctrl" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                </div>
            @else
                <img class="card-img-top" src="{{ asset('images/' . $ad->photos->first()->filename) }}">
            @endif
        @endif
        <div class="card-body">
            <hr>
            <p><u>Description :</u></p>
            <p class="card-text">{{ $ad->texte }}</p>
            <hr>
            <p class="card-text"><u>Catégorie</u> : {{ $ad->category->name }}</p>
            <p class="card-text">
                <u>Ville</u> : {{ $ad->commune_name . ' (' . $ad->commune_postal . ')'}}<br>
                <u>Publication</u> : {{ $ad->created_at->calendar() }}
            </p>
            <hr>
            <p class="card-text"><u>Pseudo</u> : {{ $ad->pseudo }}</p>
        </div>
    </div>

</div>

@endsection