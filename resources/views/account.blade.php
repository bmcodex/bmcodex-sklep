@extends('layouts.app')

@section('title', 'Moje konto - BMCODEX')

@section('styles')
<style>
    .account-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
    }
    
    .account-card {
        background-color: var(--light-gray);
        padding: 2rem;
        border-radius: 8px;
        margin-bottom: 2rem;
        border: 2px solid var(--primary-color);
    }
    
    .account-card h2 {
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 0.5rem;
    }
    
    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 1rem 0;
        border-bottom: 1px solid var(--dark-bg);
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .info-label {
        color: var(--text-gray);
        font-weight: 600;
    }
    
    .info-value {
        color: var(--text-light);
    }
    
    @media (max-width: 768px) {
        .account-container {
            padding: 1rem;
        }
        
        .info-row {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="account-container">
    <h1>👤 Moje konto</h1>
    
    <div class="account-card">
        <h2>Informacje o koncie</h2>
        
        <div class="info-row">
            <span class="info-label">Imię:</span>
            <span class="info-value">{{ auth()->user()->first_name ?? 'Nie podano' }}</span>
        </div>
        
        <div class="info-row">
            <span class="info-label">Nazwisko:</span>
            <span class="info-value">{{ auth()->user()->last_name ?? 'Nie podano' }}</span>
        </div>
        
        <div class="info-row">
            <span class="info-label">Email:</span>
            <span class="info-value">{{ auth()->user()->email }}</span>
        </div>
        
        <div class="info-row">
            <span class="info-label">Telefon:</span>
            <span class="info-value">{{ auth()->user()->phone ?? 'Nie podano' }}</span>
        </div>
        
        <div class="info-row">
            <span class="info-label">Rola:</span>
            <span class="info-value">
                @if(auth()->user()->role === 'admin')
                    Administrator
                @else
                    Użytkownik
                @endif
            </span>
        </div>
        
        <div class="info-row">
            <span class="info-label">Data rejestracji:</span>
            <span class="info-value">{{ auth()->user()->created_at->format('d.m.Y H:i') }}</span>
        </div>
    </div>
    
    @if(auth()->user()->role === 'admin')
        <div class="account-card">
            <h2>Panel administracyjny</h2>
            <p style="margin-bottom: 1rem; color: var(--text-gray);">
                Masz uprawnienia administratora. Możesz zarządzać sklepem.
            </p>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                Przejdź do panelu admina
            </a>
        </div>
    @endif
    
    <div class="account-card">
        <h2>Wyloguj się</h2>
        <p style="margin-bottom: 1rem; color: var(--text-gray);">
            Zakończ sesję i wyloguj się z konta.
        </p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-secondary">Wyloguj się</button>
        </form>
    </div>
</div>
@endsection
