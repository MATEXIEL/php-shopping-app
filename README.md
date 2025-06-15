# 🛒 Ortak Alışveriş ve Harcama Paylaşım Uygulaması

Bursa Teknik Üniversitesi, Bilgisayar Mühendisliği bölümü, Web Tabanlı Programlama dersi kapsamında geliştirdiğim bu proje, kullanıcıların hesap oluşturup giriş yapabildiği ve ortak alışveriş listesi ile harcamalarını takip edebildiği temel bir PHP web uygulamasıdır. PHP, MySQL ve Bootstrap kullanılarak geliştirilmiştir.

## 🚀 Özellikler

- ✅ Kullanıcı kaydı ve giriş sistemi  
- 🧾 Alışveriş öğeleri ekleme, düzenleme ve silme  
- 💰 Kişi başına toplam harcamayı otomatik hesaplama  
- 🎨 Bootstrap 5 ve CSS ile biçimlendirilmiş 
- 🛡 PHP oturumları ile güvenli erişim  
- 📁 Yerel veya paylaşımlı sunucularda kolayca barındırılabilir  

---

## 📂 Klasör Yapısı

```
project(veya nasıl isimlendirmek isterseniz)/
│
├── index.php
├── register.php
├── login.php
├── logout.php
├── dashboard.php
├── add_item.php
├── edit_item.php
├── delete_item.php
├── db.php
├── styles.css
├── schema.sql
└── README.md
```

---

## 🛠️ Yerel Kurulum Talimatları

Aşağıdaki adımları izleyerek uygulamayı bilgisayarınızda çalıştırabilirsiniz:

### 1. Depoyu Klonlayın

```bash
git clone https://github.com/MATEXIEL/php-shopping-app.git
cd php-shopping-app
```

### 2. Veritabanını Oluşturun

- **phpMyAdmin** veya **MySQL Workbench** gibi bir araçla giriş yapın
- Yeni bir veritabanı oluşturun (örn: `shopping_app`)
- `schema.sql` dosyasını içe aktarın:

> _phpMyAdmin kullanıyorsanız_:  
> Veritabanınızı seçin → **İçe Aktar** → `schema.sql` dosyasını seçin → **Git**

### 3. `db.php` Dosyasını Düzenleyin

`db.php` dosyasını açın ve veritabanı bilgilerinizi girin, ben siteyi aynı zamanda IRL olarak da çalıştırdığım için `db.php` dosyasını aşağıdaki default değerler ile değiştirdim:

```php
<?php
$host = 'localhost';
$db   = 'shopping_app'; // veritabanı adınız
$user = 'root';         // kullanıcı adınız
$pass = '';             // şifreniz (varsayılan olarak boş olma ihtimali yüksek, space değil, direkt hiçbir giriş yapmamak yani)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
```

> 💡 **XAMPP** kullanıyorsanız Apache ve MySQL servislerinin açık olduğundan emin olun.

### 4. Uygulamayı Tarayıcıda Açın

- Proje klasörünü web sunucunuzun kök klasörüne yerleştirin:

  - **XAMPP için**: `htdocs/` klasörüne taşıyın
  - Örn: `C:/xampp/htdocs/project/`

- Tarayıcınızdan şu adrese gidin:

```
http://localhost/project/
```

---

## 🌐 Sunucuya Yükleme Notları (Eğer siz de siteyi canlıya almak isterseniz)

Uygulamayı bir **paylaşımlı hosting** ortamına yüklemek istiyorsanız:

- Tüm dosyaları `/public_html/` klasörüne yükleyin (veya orada görünen dosya ne ise, FileZilla kullanarak bakabilirsiniz.)
- `db.php` dosyasındaki şu alanları hosting sağlayıcınızdan aldığınız bilgilere göre güncelleyin:
  - `host`: genellikle IP adresi veya host adı olarak verilir
  - `db`: oluşturduğunuz veritabanı adı (örn: `shopping_app`)
  - `user`: veritabanı kullanıcı adınız
  - `pass`: veritabanı şifreniz (siz de çalışmanızı Github'da paylaşacak olursanız username ve password bilgilerinizi paylaşmadığınızdan emin olun)

Uygulamanıza şu şekilde ulaşabilirsiniz (veya örnektekinden farklı olarak sağlayıcınız size hangi adresi sağladıysa):

```
http://sunucu-ip-adresi/~kullaniciadi
```

---

## 📝 Lisans

Bu proje eğitim ve kişisel kullanım amaçlı lisanslanmıştır.  
İyileştirme, düzenleme ve paylaşım yapabilirsiniz.

---

## Projeyi Geliştirmede Kullanılanlar

Aşağıdaki teknolojilerle geliştirilmiştir:
- PHP
- MySQL
- Bootstrap 5
