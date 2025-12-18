<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::insert([
            [
                'book_name' => 'Laravel Fundamental',
                'author' => 'Taylor Otwell',
                'description' => 'Buku dasar untuk memahami framework Laravel dari nol.',
                'published_date' => '2022-01-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'Mastering PHP',
                'author' => 'Rasmus Lerdorf',
                'description' => 'Pembahasan mendalam mengenai bahasa pemrograman PHP.',
                'published_date' => '2021-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'Panduan menulis kode yang bersih, rapi, dan mudah dipelihara.',
                'published_date' => '2019-09-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'Design Patterns',
                'author' => 'Erich Gamma',
                'description' => 'Pola desain klasik dalam pengembangan perangkat lunak.',
                'published_date' => '2018-03-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'book_name' => 'Web Security Basics',
                'author' => 'OWASP',
                'description' => 'Dasar-dasar keamanan aplikasi web untuk developer.',
                'published_date' => '2020-11-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
