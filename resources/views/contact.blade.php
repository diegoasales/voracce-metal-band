@extends('layouts.app')

@section('title', __('messages.contact.title'))

@push('styles')
<style>
    .contact-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .contact-header h1 {
        font-size: 3rem;
        color: #ff0000;
        text-shadow: 0 0 20px rgba(255, 0, 0, 0.8), 0 0 40px rgba(255, 0, 0, 0.5);
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .contact-header p {
        color: #ccc;
        font-size: 1.2rem;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-top: 2rem;
    }

    .contact-form {
        background: rgba(0, 0, 0, 0.7);
        border: 2px solid #8b0000;
        border-radius: 10px;
        padding: 2rem;
    }

    .contact-form h2 {
        color: #ff0000;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1.8rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        color: #e0e0e0;
        margin-bottom: 0.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.9rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        background: rgba(0, 0, 0, 0.5);
        border: 2px solid #8b0000;
        border-radius: 5px;
        color: #e0e0e0;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #ff0000;
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .submit-btn {
        background: linear-gradient(135deg, #8b0000 0%, #ff0000 100%);
        border: 2px solid #ff0000;
        color: #fff;
        padding: 1rem 2rem;
        font-size: 1.1rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        border-radius: 5px;
        transition: all 0.3s ease;
        width: 100%;
    }

    .submit-btn:hover {
        background: linear-gradient(135deg, #ff0000 0%, #ff3333 100%);
        box-shadow: 0 0 20px rgba(255, 0, 0, 0.5);
        transform: translateY(-2px);
    }

    .contact-info {
        background: rgba(0, 0, 0, 0.7);
        border: 2px solid #8b0000;
        border-radius: 10px;
        padding: 2rem;
    }

    .contact-info h2 {
        color: #ff0000;
        margin-bottom: 1.5rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1.8rem;
    }

    .info-item {
        margin-bottom: 2rem;
        padding: 1rem;
        background: rgba(139, 0, 0, 0.2);
        border-left: 4px solid #ff0000;
        border-radius: 5px;
    }

    .info-item h3 {
        color: #ff0000;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 1.2rem;
    }

    .info-item p {
        color: #e0e0e0;
        line-height: 1.6;
    }

    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .social-link {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background: rgba(139, 0, 0, 0.3);
        border: 2px solid #8b0000;
        color: #e0e0e0;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .social-link:hover {
        background: rgba(255, 0, 0, 0.3);
        border-color: #ff0000;
        color: #fff;
        box-shadow: 0 0 15px rgba(255, 0, 0, 0.3);
    }

    @media (max-width: 768px) {
        .contact-header h1 {
            font-size: 2rem;
        }

        .contact-container {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .contact-form,
        .contact-info {
            padding: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="contact-header">
    <h1>{{ __('messages.contact.header.title') }}</h1>
    <p>{{ __('messages.contact.header.subtitle') }}</p>
</div>

<div class="contact-container">
    <div class="contact-form">
        <h2>{{ __('messages.contact.form.title') }}</h2>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">{{ __('messages.contact.form.name') }}</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">{{ __('messages.contact.form.email') }}</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="subject">{{ __('messages.contact.form.subject') }}</label>
                <input type="text" id="subject" name="subject" required>
            </div>

            <div class="form-group">
                <label for="message">{{ __('messages.contact.form.message') }}</label>
                <textarea id="message" name="message" required></textarea>
            </div>

            <button type="submit" class="submit-btn">{{ __('messages.contact.form.submit') }}</button>
        </form>
    </div>

    <div class="contact-info">
        <h2>{{ __('messages.contact.info.title') }}</h2>
        
        <div class="info-item">
            <h3>{{ __('messages.contact.info.email') }}</h3>
            <p>contact@voracce.com</p>
        </div>

        <div class="info-item">
            <h3>{{ __('messages.contact.info.shows.title') }}</h3>
            <p>{{ __('messages.contact.info.shows.text') }}</p>
        </div>

        <div class="info-item">
            <h3>{{ __('messages.contact.info.social.title') }}</h3>
            <p>{{ __('messages.contact.info.social.text') }}</p>
            <div class="social-links">
                <a href="#" class="social-link">Facebook</a>
                <a href="#" class="social-link">Instagram</a>
                <a href="#" class="social-link">YouTube</a>
                <a href="#" class="social-link">Spotify</a>
            </div>
        </div>

        <div class="info-item">
            <h3>{{ __('messages.contact.info.partnerships.title') }}</h3>
            <p>{{ __('messages.contact.info.partnerships.text') }}</p>
        </div>
    </div>
</div>
@endsection

