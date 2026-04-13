<div class="mb-20" data-aos="fade-up">
    <h2 class="title-yellow !text-5xl mb-12">DEPARTEMEN</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
        
        @php
            use App\Models\Department;
            $departments = Department::active()->ordered()->get();
        @endphp

        @forelse($departments as $department)
        <a href="{{ route('about.departemen.detail', $department->slug) }}" class="dept-card block">
            <div class="dept-title">{{ strtoupper(Str::limit($department->name, 12)) }}</div>
            <img src="{{ asset('storage/' . $department->group_photo) }}" class="dept-img" alt="{{ $department->name }}">
            <span class="btn-pelajari">Pelajari</span>
        </a>
        @empty
        <p class="text-gray-400 col-span-full">Belum ada departemen.</p>
        @endforelse

    </div>
</div>