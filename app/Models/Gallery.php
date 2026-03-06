<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * Atribut yang diizinkan untuk diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category',
        'order',
        'is_active',
        'is_featured',
        'taken_at',
    ];

    /**
     * Konversi tipe data secara otomatis.
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'taken_at' => 'datetime',
    ];

    /**
     * Scope: Hanya ambil galeri yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Hanya ambil galeri yang dijadikan sorotan (featured)
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope: Filter berdasarkan kategori
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope: Urutkan berdasarkan urutan (order) lalu tanggal diambil
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('taken_at', 'desc');
    }
}