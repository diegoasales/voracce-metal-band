@extends('layouts.app')

@section('title', __('messages.home.title'))

@push('styles')
<style>
    .hero {
        text-align: center;
        padding: 4rem 0;
        background: linear-gradient(135deg, rgba(139, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%);
        border: 2px solid #8b0000;
        border-radius: 10px;
        margin-bottom: 3rem;
        box-shadow: 0 0 30px rgba(255, 0, 0, 0.2);
    }

    .hero h1 {
        font-size: 4rem;
        color: #ff0000;
        text-shadow: 0 0 20px rgba(255, 0, 0, 0.8), 0 0 40px rgba(255, 0, 0, 0.5);
        margin-bottom: 1rem;
        letter-spacing: 5px;
        text-transform: uppercase;
    }

    .hero p {
        font-size: 1.5rem;
        color: #ccc;
        margin-top: 1rem;
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    }

    .band-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .info-card {
        background: rgba(0, 0, 0, 0.6);
        border: 2px solid #8b0000;
        border-radius: 10px;
        padding: 2rem;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(255, 0, 0, 0.3);
        border-color: #ff0000;
    }

    .info-card h2 {
        color: #ff0000;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1.5rem;
    }

    .info-card p {
        color: #e0e0e0;
        line-height: 1.8;
    }

    .influences {
        margin-top: 2rem;
        text-align: center;
    }

    .influences h3 {
        color: #ff0000;
        font-size: 1.8rem;
        margin-bottom: 1rem;
        text-transform: uppercase;
    }

    .influences-list {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
        margin-top: 1rem;
    }

    .influence-item {
        background: rgba(139, 0, 0, 0.3);
        border: 1px solid #8b0000;
        padding: 1rem 2rem;
        border-radius: 5px;
        color: #e0e0e0;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .band-info {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="hero">
    <h1 class="glow-animation">Voracce</h1>
    <p>{{ __('messages.home.hero.subtitle') }}</p>
</div>

<div class="band-info">
    <div class="info-card">
        <h2>{{ __('messages.home.about.title') }}</h2>
        <p>{{ __('messages.home.about.text') }}</p>
    </div>

    <div class="info-card">
        <h2>{{ __('messages.home.music.title') }}</h2>
        <p>{{ __('messages.home.music.text') }}</p>
    </div>

    <div class="info-card">
        <h2>{{ __('messages.home.shows.title') }}</h2>
        <p>{{ __('messages.home.shows.text') }}</p>
    </div>
</div>

<div class="influences">
    <h3>{{ __('messages.home.influences.title') }}</h3>
    <div class="influences-list">
        <div class="influence-item">In Flames</div>
        <div class="influence-item">Carcass</div>
    </div>
</div>
@endsection

