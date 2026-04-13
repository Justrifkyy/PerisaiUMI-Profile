<section style="position:relative;">
    <div class="deco-star twinkle-1" style="bottom:60px; left:4%;"></div>
    <div class="deco-star sm twinkle-4" style="top:30px; right:7%;"></div>

    <div style="position:absolute; bottom:-80px; left:-80px; width:400px; height:400px; background:radial-gradient(circle, rgba(255,193,7,0.06) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>

    <div class="section-wrap">
        <div class="reveal" style="margin-bottom:60px; position:relative; z-index:10; text-align:center;">
            <h2 class="member-section-title">
                PERISAI <span class="text-yellow">Statistics</span>
            </h2>
        </div>

        <div class="stats-grid">
            @forelse($statistics as $stat)
                <div class="stat-card {{ $loop->even ? 'light' : 'dark' }} reveal reveal-delay-{{ $loop->iteration }}">
                    <div>
                        <div class="stat-label">{{ $stat->label }}</div>
                        <div class="stat-period">{{ $stat->description ?? 'Statistics' }}</div>
                        <a href="{{ route('about.sumberdaya') }}" class="stat-link">
                            <span class="stat-link-icon">›</span>
                            Lihat Detail
                        </a>
                    </div>
                    <div class="stat-number" data-target="{{ (int)$stat->value }}">{{ $stat->value }}</div>
                </div>
            @empty
                <p style="color:#555; text-align:center; grid-column:1/-1; padding:40px 0;">Belum ada statistik saat ini.</p>
            @endforelse
        </div>
    </div>
</section>