<section style="position:relative;">
    <div class="deco-star twinkle-2" style="top:20px; left:6%;"></div>
    <div class="deco-star sm twinkle-5" style="bottom:80px; right:4%;"></div>

    <div class="section-wrap">
        <div class="section-header reveal">
            <div class="section-divider"></div>
            <h2 class="section-title-yellow">PERISAI NEWS</h2>
        </div>

        <div class="news-grid">
            @forelse($latestNews as $news)
                <div class="news-card reveal reveal-delay-{{ $loop->iteration }}">
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" loading="lazy">
                    <div class="news-overlay"></div>
                    <div class="news-content">
                        <div class="news-cat">{{ $news->category ?? 'Berita' }}</div>
                        <h3 class="news-title">{{ $news->title }}</h3>
                        <p class="news-desc">{{ $news->description }}</p>
                    </div>
                </div>
            @empty
                <p style="color:#555; text-align:center; grid-column:1/-1; padding:40px 0;">Belum ada berita terbaru saat ini.</p>
            @endforelse
        </div>

        <div style="text-align:right; margin-top:32px; position:relative; z-index:10;" class="reveal">
            <a href="{{ route('activity.index') }}" style="color:#fff; font-weight:800; text-decoration:none; font-size:1rem; transition:color 0.2s;" 
               onmouseover="this.style.color='#FFC107'" onmouseout="this.style.color='#fff'">
                Pelajari Selengkapnya →
            </a>
        </div>
    </div>
</section>