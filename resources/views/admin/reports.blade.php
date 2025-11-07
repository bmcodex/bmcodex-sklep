@extends('layouts.app')

@section('title', 'Raporty sprzedaży - Panel Admin')

@section('styles')
<style>
    .admin-container {
        display: flex;
        gap: 2rem;
        margin-top: 2rem;
    }
    
    .admin-sidebar {
        width: 250px;
        background-color: var(--light-gray);
        padding: 1.5rem;
        border-radius: 8px;
        height: fit-content;
    }
    
    .admin-sidebar h3 {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }
    
    .admin-sidebar a {
        display: block;
        padding: 0.8rem;
        margin-bottom: 0.5rem;
        color: var(--text-light);
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }
    
    .admin-sidebar a:hover {
        background-color: var(--dark-bg);
    }
    
    .admin-content {
        flex: 1;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background-color: var(--light-gray);
        padding: 1.5rem;
        border-radius: 8px;
        border: 2px solid var(--primary-color);
        text-align: center;
    }
    
    .stat-card h3 {
        color: var(--primary-color);
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .stat-card p {
        color: var(--text-gray);
        font-size: 0.9rem;
    }
    
    .report-section {
        background-color: var(--light-gray);
        padding: 2rem;
        border-radius: 8px;
        margin-bottom: 2rem;
    }
    
    .report-section h2 {
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 0.5rem;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }
    
    table th {
        background-color: var(--dark-bg);
        color: var(--primary-color);
        padding: 1rem;
        text-align: left;
        font-weight: 600;
    }
    
    table td {
        padding: 1rem;
        border-bottom: 1px solid var(--dark-bg);
        color: var(--text-light);
    }
    
    table tr:hover {
        background-color: var(--dark-bg);
    }
    
    @media (max-width: 768px) {
        .admin-container {
            flex-direction: column;
        }
        
        .admin-sidebar {
            width: 100%;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        table {
            font-size: 0.9rem;
        }
        
        table th,
        table td {
            padding: 0.5rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>📈 Raporty sprzedaży</h1>
    
    <div class="admin-container">
        <aside class="admin-sidebar">
            <h3>🔧 Panel Admin</h3>
            <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
            <a href="{{ route('admin.products.index') }}">📦 Produkty</a>
            <a href="{{ route('admin.orders') }}">🛒 Zamówienia</a>
            <a href="{{ route('admin.users') }}">👥 Użytkownicy</a>
            <a href="{{ route('admin.categories') }}">📁 Kategorie</a>
            <a href="{{ route('admin.reports') }}" style="background-color: var(--dark-bg);">📈 Raporty</a>
        </aside>
        
        <div class="admin-content">
            <!-- Ogólne statystyki -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>{{ number_format($totalRevenue, 2) }} PLN</h3>
                    <p>Całkowity przychód</p>
                </div>
                <div class="stat-card">
                    <h3>{{ $totalOrders }}</h3>
                    <p>Wszystkie zamówienia</p>
                </div>
                <div class="stat-card">
                    <h3>{{ number_format($averageOrderValue, 2) }} PLN</h3>
                    <p>Średnia wartość zamówienia</p>
                </div>
                <div class="stat-card">
                    <h3>{{ $totalCustomers }}</h3>
                    <p>Klienci</p>
                </div>
            </div>
            
            <!-- Sprzedaż w ostatnich 30 dniach -->
            <div class="report-section">
                <h2>📅 Sprzedaż w ostatnich 30 dniach</h2>
                @if($salesLast30Days->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Liczba zamówień</th>
                                <th>Przychód</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salesLast30Days as $sale)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($sale->date)->format('d.m.Y') }}</td>
                                    <td>{{ $sale->orders_count }}</td>
                                    <td>{{ number_format($sale->revenue, 2) }} PLN</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p style="color: var(--text-gray); text-align: center; padding: 2rem;">Brak danych sprzedażowych w ostatnich 30 dniach.</p>
                @endif
            </div>
            
            <!-- Najpopularniejsze produkty -->
            <div class="report-section">
                <h2>🏆 Najpopularniejsze produkty</h2>
                @if($topProducts->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Produkt</th>
                                <th>Sprzedane sztuki</th>
                                <th>Przychód</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topProducts as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->total_sold }}</td>
                                    <td>{{ number_format($product->total_revenue, 2) }} PLN</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p style="color: var(--text-gray); text-align: center; padding: 2rem;">Brak danych o sprzedanych produktach.</p>
                @endif
            </div>
            
            <!-- Statystyki miesięczne -->
            <div class="report-section">
                <h2>📊 Statystyki miesięczne (ostatnie 12 miesięcy)</h2>
                @if($monthlyStats->count() > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>Miesiąc</th>
                                <th>Liczba zamówień</th>
                                <th>Przychód</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($monthlyStats as $stat)
                                <tr>
                                    <td>{{ str_pad($stat->month, 2, '0', STR_PAD_LEFT) }}/{{ $stat->year }}</td>
                                    <td>{{ $stat->orders_count }}</td>
                                    <td>{{ number_format($stat->revenue, 2) }} PLN</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p style="color: var(--text-gray); text-align: center; padding: 2rem;">Brak danych miesięcznych.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
