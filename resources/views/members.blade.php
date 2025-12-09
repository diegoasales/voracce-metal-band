@extends('layouts.app')

@section('title', __('messages.members.title'))

@push('styles')
<style>
    .members-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .members-header h1 {
        font-size: 3rem;
        color: #ff0000;
        text-shadow: 0 0 20px rgba(255, 0, 0, 0.8), 0 0 40px rgba(255, 0, 0, 0.5);
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .members-header p {
        color: #ccc;
        font-size: 1.2rem;
    }

    .members-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .member-card {
        background: rgba(0, 0, 0, 0.7);
        border: 2px solid #8b0000;
        border-radius: 10px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .member-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 0, 0, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .member-card:hover::before {
        left: 100%;
    }

    .member-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 15px 40px rgba(255, 0, 0, 0.4);
        border-color: #ff0000;
    }

    .member-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        color: #ff0000;
        text-shadow: 0 0 15px rgba(255, 0, 0, 0.6);
    }

    .member-name {
        font-size: 1.8rem;
        color: #ff0000;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
    }

    .member-role {
        font-size: 1.2rem;
        color: #e0e0e0;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .member-description {
        color: #ccc;
        line-height: 1.6;
        font-size: 0.95rem;
    }

    .instrument-icon {
        display: inline-block;
        margin: 0 0.5rem;
        font-size: 1.5rem;
    }

    @media (max-width: 768px) {
        .members-header h1 {
            font-size: 2rem;
        }

        .members-grid {
            grid-template-columns: 1fr;
        }

        .member-card {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="members-header">
    <h1>{{ __('messages.members.header.title') }}</h1>
    <p>{{ __('messages.members.header.subtitle') }}</p>
</div>

<div class="members-grid">
    <div class="member-card">
        <div class="member-icon">🥁</div>
        <div class="member-name">Diego</div>
        <div class="member-role">
            <span class="instrument-icon">🥁</span>
            {{ __('messages.members.diego.role') }}
        </div>
        <div class="member-description">
            {{ __('messages.members.diego.description') }}
        </div>
    </div>

    <div class="member-card">
        <div class="member-icon">🎸</div>
        <div class="member-name">Nilo</div>
        <div class="member-role">
            <span class="instrument-icon">🎸</span>
            {{ __('messages.members.nilo.role') }}
        </div>
        <div class="member-description">
            {{ __('messages.members.nilo.description') }}
        </div>
    </div>

    <div class="member-card">
        <div class="member-icon">🎸</div>
        <div class="member-name">Mohammed</div>
        <div class="member-role">
            <span class="instrument-icon">🎸</span>
            {{ __('messages.members.mohammed.role') }}
        </div>
        <div class="member-description">
            {{ __('messages.members.mohammed.description') }}
        </div>
    </div>

    <div class="member-card">
        <div class="member-icon">🎸</div>
        <div class="member-name">Mamute</div>
        <div class="member-role">
            <span class="instrument-icon">🎸</span>
            {{ __('messages.members.mamute.role') }}
        </div>
        <div class="member-description">
            {{ __('messages.members.mamute.description') }}
        </div>
    </div>
</div>
@endsection

