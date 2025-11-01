# BMCODEX - Performance Without Limits

Profesjonalny sklep internetowy do sprzedaży części do tuningu samochodów, zbudowany w oparciu o Laravel 11.

## 🚀 Główne Cechy

### Dla Klientów:
- ✅ Przeglądanie katalogów produktów z filtrowaniem
- ✅ Zakupy bez rejestracji
- ✅ Rejestracja i logowanie
- ✅ Reset hasła
- ✅ Koszyk zakupów
- ✅ Historia zamówień
- ✅ Ulubione produkty
- ✅ Potwierdzenie zamówienia mailowe

### Dla Administratora:
- ✅ Zarządzanie produktami (CRUD)
- ✅ Zarządzanie kategoriami
- ✅ Zarządzanie zamówieniami
- ✅ Zarządzanie użytkownikami
- ✅ Raporty sprzedaży
- ✅ Statystyki

## 🛠️ Technologia

| Komponent | Technologia |
|-----------|-------------|
| Backend | Laravel 11 (PHP 8+) |
| Frontend | Blade Templates, HTML5, CSS3, JavaScript |
| Baza danych | MySQL 8+ |
| ORM | Eloquent |
| Autoryzacja | Laravel Auth |
| Walidacja | Laravel Validation |

## 📦 Zaawansowane Funkcje SQL

### Widoki (Views):
- `sales_report` - raport sprzedaży dziennej
- `product_stats` - statystyki produktów
- `top_products` - top 10 bestselerów
- `user_order_history` - historia zamówień użytkownika

### Wyzwalacze (Triggers):
- `update_stock_on_order_insert` - zmniejszenie stanu magazynowego
- `restore_stock_on_order_delete` - przywrócenie stanu
- `restore_stock_on_order_cancel` - przywrócenie przy anulowaniu

### Funkcje (Functions):
- `calculate_order_total()` - obliczenie wartości zamówienia
- `is_product_available()` - sprawdzenie dostępności

### Transakcje:
- Proces zamawiania w transakcji (atomowość)
- Gwarancja spójności danych

## 📋 Struktura Bazy Danych

```
users (id, role, first_name, last_name, email, password, phone, ...)
├── orders (id, user_id, total_price, status, ...)
│   └── order_items (id, order_id, product_id, quantity, price_per_item)
├── favorites (id, user_id, product_id)
└── cart_items (id, user_id, product_id, quantity)

categories (id, name, description)
└── products (id, category_id, name, price, stock, sku, ...)
    ├── order_items
    ├── favorites
    └── cart_items
```

## 🎨 Identyfikacja Wizualna

- **Kolory marki:**
  - Akcent: `#FF4500` (pomarańczowy - energetyczny, sportowy)
  - Tło: `#1A1A1A` (grafit/czarny - elegancki, techniczny)
- **Slogan:** Performance Without Limits
- **Branża:** Części do tuningu samochodów

## 🚀 Szybki Start

### Wymagania:
- PHP 8.0+
- MySQL 8.0+
- Composer
- Git

### Instalacja:

```bash
# 1. Klonowanie
git clone https://github.com/MichalNurzynski/bmcodex.git
cd bmcodex

# 2. Instalacja zależności
composer install

# 3. Konfiguracja
cp .env.example .env
# Edytuj .env - ustaw dane bazy danych

# 4. Klucz aplikacji
php artisan key:generate

# 5. Migracje
php artisan migrate

# 6. Seedery (dane testowe)
php artisan db:seed

# 7. Uruchomienie
php artisan serve
```

Aplikacja będzie dostępna na `http://localhost:8000`

## 👤 Dane Testowe

| Rola | Email | Hasło |
|------|-------|-------|
| Admin | admin@bmcodex.com | password123 |
| Klient | jan.kowalski@example.com | password123 |
| Klient | anna.nowak@example.com | password123 |

## 📁 Struktura Projektu

```
bmcodex/
├── app/
│   ├── Models/              # Modele Eloquent
│   └── Http/Controllers/    # Kontrolery
├── database/
│   ├── migrations/          # Migracje
│   ├── seeders/             # Seedery
│   └── bmcodex_schema.sql   # Pełny skrypt SQL
├── resources/
│   └── views/               # Szablony Blade
├── routes/
│   └── web.php              # Trasy
├── public/
│   └── images/              # Obrazy
├── DOKUMENTACJA.md          # Pełna dokumentacja
└── README_BMCODEX.md        # Ten plik
```

## 🔒 Bezpieczeństwo

- ✅ Haszowanie haseł (bcrypt)
- ✅ CSRF Protection
- ✅ SQL Injection Prevention (Eloquent ORM)
- ✅ XSS Protection (Blade escaping)
- ✅ Email Verification
- ✅ Password Reset Tokens
- ✅ Role-Based Access Control

## 📊 Raporty i Statystyki

### Dostępne raporty:
- Sprzedaż dzienna/tygodniowa/miesięczna
- Najpopularniejsze produkty
- Historia zamówień użytkownika
- Statystyki magazynowe

## 🔧 Konfiguracja

### Plik `.env`:
```env
APP_NAME=BMCODEX
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bmcodex_db
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

## 📝 Migracje

```bash
# Uruchomienie migracji
php artisan migrate

# Rollback ostatniej migracji
php artisan migrate:rollback

# Rollback wszystkich migracji
php artisan migrate:reset

# Refresh (rollback + migrate)
php artisan migrate:refresh

# Refresh + seed
php artisan migrate:refresh --seed
```

## 🌱 Seedery

```bash
# Uruchomienie wszystkich seederów
php artisan db:seed

# Uruchomienie konkretnego seedera
php artisan db:seed --class=UserSeeder
```

## 📧 Email

Aplikacja obsługuje wysyłanie emaili:
- Potwierdzenie rejestracji
- Reset hasła
- Potwierdzenie zamówienia
- Powiadomienia o statusie zamówienia

Skonfiguruj SMTP w `.env`

## 🧪 Testowanie

```bash
# Uruchomienie testów
php artisan test

# Testowanie konkretnej klasy
php artisan test --filter=OrderTest

# Testowanie z coverage
php artisan test --coverage
```

## 📚 Dokumentacja

Pełna dokumentacja techniczna znajduje się w pliku `DOKUMENTACJA.md`

Zawiera:
- Opis wszystkich tabel
- Dokumentacja widoków SQL
- Dokumentacja wyzwalaczy
- Opis wszystkich kontrolerów
- Opis wszystkich tras
- Instrukcje instalacji
- Troubleshooting

## 🤝 Kontakt

**Autor:** Michał Nurzyński  
**Email:** admin@bmcodex.com  
**GitHub:** https://github.com/MichalNurzynski/bmcodex

## 📄 Licencja

MIT License - zobacz plik LICENSE

## 🎯 Roadmap

- [ ] Integracja PayU (płatności online)
- [ ] System recenzji produktów
- [ ] Rekomendacje produktów
- [ ] SMS Notifications
- [ ] Google Analytics
- [ ] Mobile App
- [ ] Multilingual Support

---

**Ostatnia aktualizacja:** 30 października 2025

**Status:** ✅ Gotowe do wdrożenia
