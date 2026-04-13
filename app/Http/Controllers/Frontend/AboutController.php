<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Member;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function sejarah()
    {
        return view('pages.about.sejarah');
    }

    public function visiMisi()
    {
        // Ambil semua departemen aktif dengan visi & misi
        $departments = Department::active()->ordered()->get();

        return view('pages.about.visi-misi', compact('departments'));
    }

    public function struktur()
    {
        // Menarik semua struktur pengurus dari database
        $pembina = Member::where('hierarchy', 'pembina')->active()->ordered()->get();
        $inti = Member::where('hierarchy', 'inti')->active()->ordered()->get();
        $kadep = Member::where('hierarchy', 'kadep')->active()->ordered()->with('department')->get();
        $staf = Member::where('hierarchy', 'staf')->active()->ordered()->with('department')->get();

        return view('pages.about.struktur', compact('pembina', 'inti', 'kadep', 'staf'));
    }

    public function bagan()
    {
        // Bagan Organisasi - menampilkan struktur pengurus dalam format bagan/diagram
        $pembina = Member::where('hierarchy', 'pembina')->active()->ordered()->get();
        $inti = Member::where('hierarchy', 'inti')->active()->ordered()->get();
        $kadep = Member::where('hierarchy', 'kadep')->active()->ordered()->with('department')->get();
        $staf = Member::where('hierarchy', 'staf')->active()->ordered()->with('department')->get();

        return view('pages.about.bagan', compact('pembina', 'inti', 'kadep', 'staf'));
    }

    public function sumberDaya()
    {
        // Tarik semua members aktif dikelompokkan per hierarchy
        $pembina = Member::where('hierarchy', 'pembina')->active()->ordered()->get();
        $inti = Member::where('hierarchy', 'inti')->active()->ordered()->get();
        $kadep = Member::where('hierarchy', 'kadep')->active()->ordered()->with('department')->get();
        $staf = Member::where('hierarchy', 'staf')->active()->ordered()->with('department')->get();

        return view('pages.about.sumberdaya', compact('pembina', 'inti', 'kadep', 'staf'));
    }

    public function departemenDetail($slug = null)
    {
        // Ambil departemen berdasarkan slug
        $department = Department::where('slug', $slug)->active()->firstOrFail();

        // Ambil members departemen ini
        $members = $department->members()->active()->ordered()->get();

        // Ambil work programs departemen
        $workPrograms = $department->workPrograms()->active()->ordered()->get();

        return view('pages.about.detail-departemen', compact('department', 'members', 'workPrograms'));
    }
}
