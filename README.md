# Definisi

*Live scoring challenge* adalah sebuah aplikasi lomba berbasis web, didalamnya terdapat soal yang diberikan oleh admin dan peserta akan berlomba untuk menjawab soal sebanyak banyaknya dan akan diberikan poin untuk setiap jawaban yang benar. Poin masing-masing peserta diakumulasi sehingga terdapat sistem ranking.

## Analisa Kebutuhan Software
- Linux Ubuntu 18.04 64-bit
- Apache2 Webserver
- PHP 7.2 dan ekstensi (BCMath PHP Extension, Ctype PHP Extension, Fileinfo PHP extension, JSON PHP Extension, Mbstring PHP Extension, OpenSSL PHP Extension, PDO PHP Extension, Tokenizer PHP Extension, XML PHP Extension)
- MySql Database Server
- Visual Code Text Editor
- Composer
- Crontab

## Analisa Kebutuhan Pengguna
### Admin :
- Login
- Menambah, menghapus, mengedit, melihat soal
- Melihat live score peserta
- Memulai sesi 
- Menginput batas waktu sesi
- Menghapus semua soal dan peserta
- Mengekspor data peserta ke dalam bentuk PDF

### Peserta :
- Login
- Register
- Melihat live score peserta
- Melihat soal
- Menginput jawaban
- Melihat waktu mundur

## Diagram Use Case
![Use Case](https://lh3.googleusercontent.com/pw/ACtC-3d8WQxVtkGhByOYKboUHm3dCQmwqAACWfh9q1cJXBDAbWStgAcHHFrxeMv4aUEkdcTBO5hc5KIxASmZ18PKUwgaCJ0M6-Zce_9_BkAjuszNjDWh7XJTyGKeqo2rEMR8xdMkZW_Mi24kb39p5CtkfbtS=w982-h469-no?authuser=0)

## Desain Database
![enter image description here](https://lh3.googleusercontent.com/e1dKcVvwsGKqY1j4yjoc6CfSyA7LoPXENDBQjf2AEypuVKGbcnYUoQjqgscDeE-pWsOtEdufyCLD5ak7sep1kPq7U-EZdTxmZe3LyjlMugYIlSk4QJjBBQHVqnO5Wx3FXKGdeYHHzM1MYqWdmvXVpv8TIW2Z5AxL3aE0Idpq7-1Voz661MnZ30SdXgYj5axN8o1myFA6alNNHn51rcHOtSU-gzhXAV4Yav7jQYmGYX0v0UuxVBQjvVFNPBdp9TWEH0t1F_IIWA-vrm2pixEZ7aHmLfH3jZ-HwfkLDSTjMZSQNt9sTgjbsMudgVNl7BCSGW-yQWdeUas1KnifA_6j3H0_5ouahvfzsGaka4tevNieyEYPD-1YdgqVTPYeFEvFJhFXg5iI0oQzMcmFyyiMdbHYD_lc3dx-HS__F7I0aF_OM20YirUXJP7uwGSC3Nf5u9gzuCzazEJ-ZM6QxAdNe2BJ9LLrZd6pxhILdQAHilRAUtu9wp6r2ubDdU-3Ylnc3H6i9OmTw1E1Vl5_mR3NNtF_Y_BLgpDTg31mUzs7LNLQ3PBWHWWZQMgr3og8B6rNiCyQlutNJMwMGyaVQu4hNj-ZiszvI6yB-tBFk3BSm17kCLlEajGWqh17fpHsFTTW5QwbzFLRIVRfzuLH7daQl5gXNByD2ijX10UmEQKK1rXjDOlYFrmijPgGBC8N=w728-h484-no?authuser=0)

## Crontab
![enter image description here](https://lh3.googleusercontent.com/Vqs7OIrieMDZmLqDAmOuqyD7CP3QoiOxxJVo9V32GlNvgTnl6f2OyKuFyPVbhMF5391BjnkiZSMMItsk2S2MP4C5Dnt9QkFxbmCeZgQiB3N8IaWlPPeCbj6c90mljeiHnuZFDhPgqXhLmy7dPxmcaWP4DpVBN2okESJNnwsfzr370M5B9g9V3t_aZWQXtr05lzcZTAJDxq2t-iF3-v95rd3S432duvin9ePhz7pZZiWoYZtkSHKlbosbvtGFWsk0_0L8c5MsfwWVtFvzgDSDZ2bl-mFFew0kxWkAaHqwGPYE7L8vHRI-EojBAjsdR8A4SwG4CU-4JbfNS4utG7MmJre984RLLHOPlDDFlez2rnPAeAuaoZvdGYj87a6z4S0Be4rsbWK3N1ZnrSaw2dpbP_l30nObDrryovvEO0wXuZBtLM5MQVp0k_sRFh6M6TjkEux6v6G6oLQfmWt7R4YFJ_v-auQMTxCDExI1SiG6PNqp5TOM5ee1enI8hpNCh4m_m-vmmnKdNcwaxow_9BdwTEgB8OSU3XNsnNsa4pFJPIXEAQeN7NmsU0dUTgr8wPR53peH4E56m1dGG8sAcESXkUDUaNlyBIbUM9f9sim-zEOGRcp8qS_o9NfIdarfsExJUyohVTYjk2W1VP9Ac5D5diRdmXwsTOUZZCDLDiVNvTyuSpHG3N0jAuoq0FDE=w1360-h356-no?authuser=0)

# Instalasi
## Install framework laravel
Install laravel di [web laravel](https://laravel.com/docs/7.x#installing-laravel)
## Migrate 
membuat tabel otomatis 

    php artisan migrate
## Seed
menambah user **admin** 
|email|password|
|--|--|
|`admin@admin.com`|admin|

jalankan `php artisan db:seed`
## Crontab
 1. edit file `crontab -e`
 2. tambahkan `* * * * * php /wmc/artisan schedule:run` di akhir baris
 3. save file `CTRL + X`
