<div class="mb-32" data-aos="fade-up">
    <h2 class="title-yellow">STAF AHLI</h2>
    <div class="marquee-wrapper">
        <div class="marquee-content" style="animation-duration: 30s;">
            
            @forelse($staf as $member)
            <div class="profile-card w-[220px] shrink-0">
                <img src="{{ asset('storage/' . $member->photo) }}" class="profile-img" alt="{{ $member->name }}">
                <div class="profile-overlay">
                    <div class="profile-name">{{ $member->name }}</div>
                    <span class="profile-role">{{ strtoupper($member->position ?? 'Staf Ahli') }}</span>
                    @if($member->linkedin_url)
                    <a href="{{ $member->linkedin_url }}" target="_blank" class="profile-linkedin"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                    @endif
                </div>
            </div>
            @empty
            <p class="text-gray-400">Belum ada staf ahli.</p>
            @endforelse

            @forelse($staf as $member)
            <div class="profile-card w-[220px] shrink-0">
                <img src="{{ asset('storage/' . $member->photo) }}" class="profile-img" alt="{{ $member->name }}">
                <div class="profile-overlay">
                    <div class="profile-name">{{ $member->name }}</div>
                    <span class="profile-role">{{ strtoupper($member->position ?? 'Staf Ahli') }}</span>
                    @if($member->linkedin_url)
                    <a href="{{ $member->linkedin_url }}" target="_blank" class="profile-linkedin"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                    @endif
                </div>
            </div>
            @endforelse

        </div>
    </div>
</div>