<section style="position:relative; padding-top: 100px; padding-bottom: 40px; min-height: 100vh; display: flex; align-items: center;">
    
    <div class="deco-star twinkle-1" style="top:100px; left:5%;"></div>
    <div class="deco-star sm twinkle-2" style="top:160px; left:9%;"></div>
    <div class="deco-star lg twinkle-3" style="top:80px; right:6%;"></div>
    <div class="deco-star sm twinkle-4" style="top:200px; right:12%;"></div>
    <div class="deco-star twinkle-5" style="bottom:120px; left:3%;"></div>
    <div class="deco-star sm twinkle-6" style="bottom:200px; right:8%;"></div>

    <div style="position:absolute; top:-100px; right:-100px; width:500px; height:500px; background:radial-gradient(circle, rgba(255,193,7,0.07) 0%, transparent 70%); border-radius:50%; pointer-events:none;"></div>

    <div class="section-wrap" style="padding-top: 0; padding-bottom: 0; width: 100%;">
        <div class="hero-grid">
            <div>
                <p class="hero-label">Unit Kegiatan Mahasiswa</p>
                <h1 class="hero-title">Pusat Pengembangan<br>Riset Mahasiswa</h1>
                <h2 class="hero-subtitle">Universitas Muslim Indonesia</h2>
                <p class="hero-desc">
                    UKM Perisai (Pusat Pengembangan Riset Mahasiswa) adalah wadah mahasiswa untuk berekspresi dan berinovasi dalam bidang penalaran.
                </p>
                <a href="{{ route('contact') }}" class="btn-primary">Contact Us</a>
            </div>
            <div class="hero-img-wrap">
                <div class="hero-img-glow"></div>
                <img src="{{ asset('assets/maskot.png') }}" alt="Maskot Perisai UMI" class="hero-img">
            </div>
        </div>

        <div class="scroll-indicator" style="position:relative; margin-top:60px; left:auto; transform:none; bottom:auto; display:inline-flex;">
            <div class="scroll-line"></div>
        </div>
    </div>
</section>