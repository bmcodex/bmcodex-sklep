# BMCODEX - Sklep z częściami do tuningu

## 🚗 O Projekcie

**BMCODEX** to nowoczesny sklep internetowy specjalizujący się w sprzedaży części do tuningu samochodów. Projekt został stworzony w ramach pracy zaliczeniowej z wykorzystaniem technologii **Laravel 11**, **MySQL 8+**, **HTML5**, **CSS3** i **JavaScript**.

### Identyfikacja wizualna:
- **Nazwa:** BMCODEX
- **Slogan:** Performance Without Limits
- **Kolory marki:**
  - Akcent: `#FF4500` (pomarańczowy – energetyczny, sportowy)
  - Tło: `#1A1A1A` (grafit/czarny – elegancki, techniczny)

---

## ✨ Funkcjonalności

### Dla Klientów:
- ✅ **Przeglądanie produktów** z filtrowaniem (kategorie, przedział cenowy, wyszukiwanie)
- ✅ **Zakupy bez rejestracji** (jako gość)
- ✅ **Rejestracja i logowanie** z potwierdzeniem email
- ✅ **Reset hasła** przez email
- ✅ **Koszyk zakupowy** z możliwością dodawania wielu artykułów
- ✅ **Panel klienta** z:
  - Historią zamówień
  - Edycją danych osobowych
  - Listą ulubionych produktów
- ✅ **Potwierdzenie zamówienia** mailem (opcjonalnie)

### Dla Administratorów:
- ✅ **Panel administracyjny** z CRUD dla:
  - Produktów
  - Kategorii
  - Zamówień
  - Użytkowników
- ✅ **Zarządzanie pracownikami** (role: user, admin)
- ✅ **Raporty sprzedaży** z wykorzystaniem widoków SQL
- ✅ **Monitoring stanu magazynowego**

---

## 🛠 Technologie

### Backend:
- **PHP:** 8.2+
- **Laravel:** 11.x
- **MySQL:** 8.0+
- **Composer:** 2.6+

### Frontend:
- **HTML5**
- **CSS3** (Custom styling)
- **JavaScript** (Vanilla JS)
- **Blade Templates** (Laravel)

---

## 📦 Instalacja

### Wymagania:
- PHP 8.2+
- MySQL 8.0+
- Composer 2.6+
- Git

### Kroki instalacji:

1. **Klonowanie repozytorium:**
```bash
git clone https://github.com/bmcodex/bmcodex-sklep.git
cd bmcodex-sklep
```

2. **Instalacja zależności:**
```bash
composer install
```

3. **Konfiguracja środowiska:**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Edycja pliku `.env`:**
```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=bmcodex_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. **Utworzenie bazy danych:**
```bash
mysql -u root -p
CREATE DATABASE bmcodex_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

6. **Uruchomienie migracji:**
```bash
php artisan migrate
php artisan db:seed
```

7. **Uruchomienie serwera:**
```bash
php artisan serve
```

Aplikacja będzie dostępna pod adresem: `http://localhost:8000`

---

## 🗄 Baza Danych

### Struktura tabel:

1. **users** - Użytkownicy (klienci, administratorzy)
2. **categories** - Kategorie produktów
3. **products** - Produkty
4. **orders** - Zamówienia
5. **order_items** - Pozycje zamówień
6. **cart_items** - Koszyk zakupowy
7. **favorites** - Ulubione produkty

---

## 🔧 Zaawansowane Funkcje SQL

### Widoki (Views):

1. **sales_report** - Raport sprzedaży z podsumowaniem zamówień
2. **product_stats** - Statystyki produktów (sprzedaż, przychód)
3. **top_products** - Najlepiej sprzedające się produkty
4. **user_order_history** - Historia zamówień użytkowników

### Wyzwalacze (Triggers):

1. **update_stock_on_order_insert** - Automatyczne zmniejszanie stanu magazynowego
2. **restore_stock_on_order_delete** - Przywracanie stanu magazynowego po usunięciu
3. **restore_stock_on_order_cancel** - Przywracanie stanu magazynowego po anulowaniu

### Funkcje (Functions):

1. **calculate_order_total(order_id)** - Obliczanie całkowitej wartości zamówienia
2. **is_product_available(product_id, quantity)** - Sprawdzanie dostępności produktu

---

## 📚 Dokumentacja

Projekt zawiera pełną dokumentację:

1. **DOKUMENTACJA.md** - Pełna dokumentacja techniczna
2. **SQL_FEATURES.md** - Opis zaawansowanych funkcji SQL
3. **INSTRUKCJA_WDROŻENIA.md** - Instrukcja wdrożenia na serwerze
4. **README.md** - Ten plik

---

## 👤 Autor

**Michał Nurzyński**
- Email: admin@bmcodex.pl
- GitHub: [@bmcodex](https://github.com/bmcodex)

---

## 🔗 Linki

- **Repozytorium GitHub:** https://github.com/bmcodex/bmcodex-sklep

---

## 📝 Dane Testowe

**Administrator:**
- Email: `admin@bmcodex.com`
- Hasło: `admin123`

**Klient testowy:**
- Email: `customer@example.com`
- Hasło: `customer123`

---

**Ostatnia aktualizacja:** 03 listopada 2025

**Status projektu:** ✅ Gotowy do wdrożenia
