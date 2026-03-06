<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function sejarah()
    {
        return view('pages.about.sejarah');
    }

    public function visiMisi()
    {
        return view('pages.about.visi-misi');
    }

    public function struktur()
    {
        // Menarik pengurus inti (yang tidak terikat ke departemen manapun)
        // Catatan: Pastikan kamu menyesuaikan logika ini dengan struktur databasemu nanti
        return view('pages.about.struktur');
    }

    public function departemen()
    {
        // Tarik semua departemen aktif beserta anggotanya (Eager Loading untuk performa)
        $departments = Department::active()->ordered()->with(['organizationalStructures' => function ($query) {
            $query->active()->ordered();
        }])->get();

        return view('pages.about.departemen', compact('departments'));
    }
}