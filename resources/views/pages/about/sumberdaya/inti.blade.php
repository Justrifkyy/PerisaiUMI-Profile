<div class="mb-20" data-aos="fade-up">
    <h2 class="title-yellow">PEMBINA</h2>
    <div class="flex justify-center flex-wrap gap-6">
        @forelse($pembina as $member)
        <div class="profile-card w-[240px]">
            <img src="{{ asset('storage/' . $member->photo) }}" class="profile-img" alt="{{ $member->name }}">
            <div class="profile-overlay">
                <div class="profile-name">{{ $member->name }}</div>
                <span class="profile-role">{{ $member->position ?? 'Pembina' }}</span>
                @if($member->linkedin_url)
                <a href="{{ $member->linkedin_url }}" target="_blank" class="profile-linkedin" title="LinkedIn Profile"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                @endif
            </div>
        </div>
        @empty
        <p class="text-gray-400">Belum ada pembina.</p>
        @endforelse
    </div>
</div>

<div class="mb-24 py-10" data-aos="fade-up">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto items-center">
        @php
            $bendahara = $inti->where('position', 'Bendahara')->first();
            $ketua = $inti->where('position', 'Ketua Umum')->first();
            $sekretaris = $inti->where('position', 'Sekretaris')->first();
        @endphp
        
        @if($bendahara)
        <div class="mt-12 md:mt-0">
            <h2 class="title-yellow !text-2xl !mb-4">BENDAHARA</h2>
            <div class="flex justify-center">
                <div class="profile-card w-[210px]">
                    <img src="{{ asset('storage/' . $bendahara->photo) }}" class="profile-img" alt="{{ $bendahara->name }}">
                    <div class="profile-overlay">
                        <div class="profile-name">{{ $bendahara->name }}</div>
                        <span class="profile-role">{{ strtoupper($bendahara->position) }}</span>
                        @if($bendahara->linkedin_url)
                        <a href="{{ $bendahara->linkedin_url }}" target="_blank" class="profile-linkedin"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @if($ketua)
        <div class="-mt-16 md:-mt-24 relative z-20"> 
            <h2 class="title-yellow !text-4xl !mb-4 drop-shadow-[0_0_10px_rgba(255,193,7,0.5)]">KETUA UMUM</h2>
            <div class="flex justify-center">
                <div class="profile-card w-[260px] border-[#FFC107] border-2 shadow-[0_15px_40px_rgba(255,193,7,0.3)]">
                    <img src="{{ asset('storage/' . $ketua->photo) }}" class="profile-img" alt="{{ $ketua->name }}">
                    <div class="profile-overlay">
                        <div class="profile-name">{{ $ketua->name }}</div>
                        <span class="profile-role">{{ strtoupper($ketua->position) }}</span>
                        @if($ketua->linkedin_url)
                        <a href="{{ $ketua->linkedin_url }}" target="_blank" class="profile-linkedin"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @if($sekretaris)
        <div class="mt-12 md:mt-0">
            <h2 class="title-yellow !text-2xl !mb-4">SEKRETARIS</h2>
            <div class="flex justify-center">
                <div class="profile-card w-[210px]">
                    <img src="{{ asset('storage/' . $sekretaris->photo) }}" class="profile-img" alt="{{ $sekretaris->name }}">
                    <div class="profile-overlay">
                        <div class="profile-name">{{ $sekretaris->name }}</div>
                        <span class="profile-role">{{ strtoupper($sekretaris->position) }}</span>
                        @if($sekretaris->linkedin_url)
                        <a href="{{ $sekretaris->linkedin_url }}" target="_blank" class="profile-linkedin"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>