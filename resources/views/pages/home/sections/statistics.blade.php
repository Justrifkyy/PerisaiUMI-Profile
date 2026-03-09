<section style="position:relative;">
    <div class="deco-star twinkle-1" style="bottom:60px; left:4%;"></div>
    <div class="deco-star sm twinkle-4" style="top:30px; right:7%;"></div>

    <div style="position:absolute; bottom:-80px; left:-80px; width:400px; height:400px; background:radial-gradient(circle, rgba(255,193,7,0.06) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>

    <div class="section-wrap">
        <div class="reveal" style="margin-bottom:60px; position:relative; z-index:10; text-align:center;">
            <h2 class="member-section-title">
                Lebih dari <span class="text-yellow">150+</span> Inovator Telah Bergabung
            </h2>
        </div>

        <div class="stats-grid">
            @foreach($statistics as $stat)
                <div class="stat-card {{ $loop->even ? 'light' : 'dark' }} reveal reveal-delay-{{ $loop->iteration }}">
                    <div>
                        <div class="stat-label">{{ $stat->label }}</div>
                        <div class="stat-period">{!! $stat->period !!}</div>
                        <a href="{{ route('about.sumberdaya') }}" class="stat-link">
                            <span class="stat-link-icon">›</span>
                            Lihat Profil
                        </a>
                    </div>
                    <div class="stat-number" data-target="{{ preg_replace('/[^0-9]/', '', $stat->number) }}">{{ $stat->number }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>