@extends('layouts.app')

@section('title', 'Beranda - PERISAI UMI')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@400;500;600;700;800;900&display=swap');

    :root {
        --yellow: #FFC107;
        --yellow-dark: #e6ac00;
        --black: #0a0a0a;
        --black-card: #111111;
        --black-card2: #1a1a1a;
        --gray: #888;
    }

    * { box-sizing: border-box; }

    .page-wrapper {
        background-color: var(--black);
        min-height: 100vh;
        overflow-x: hidden;
        font-family: 'Inter', sans-serif;
        position: relative;
    }

    /* ===== DECORATIVE ELEMENTS ===== */
    .deco-star {
        position: absolute;
        width: 14px;
        height: 14px;
        background: var(--yellow);
        clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%);
        filter: drop-shadow(0 0 8px #FFC107);
        pointer-events: none;
        z-index: 5;
    }
    .deco-star.sm { width: 8px; height: 8px; }
    .deco-star.lg { width: 20px; height: 20px; }

    .deco-circle {
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }

    .bg-lines {
        position: absolute;
        inset: 0;
        pointer-events: none;
        opacity: 0.12;
        z-index: 0;
    }

    /* ===== GLOW EFFECTS ===== */
    .glow-yellow { box-shadow: 0 0 40px rgba(255,193,7,0.18); }
    .text-yellow { color: var(--yellow); }
    .bg-yellow { background-color: var(--yellow); }
    .border-yellow { border-color: var(--yellow); }

    /* ===== SECTION BASE ===== */
    .section-wrap {
        position: relative;
        max-width: 1440px;
        margin: 0 auto;
        padding: 80px 24px;
    }

    /* ===== HERO SECTION ===== */
    .hero-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
        position: relative;
        z-index: 10;
    }

    .hero-label {
        color: #fff;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        margin-bottom: 10px;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.7s ease forwards 0.2s;
    }

    .hero-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(2.8rem, 5vw, 5rem);
        color: var(--yellow);
        line-height: 1.05;
        text-transform: uppercase;
        letter-spacing: 0.02em;
        margin-bottom: 8px;
        filter: drop-shadow(0 2px 24px rgba(255,193,7,0.25));
        opacity: 0;
        transform: translateY(25px);
        animation: fadeUp 0.7s ease forwards 0.35s;
    }

    .hero-subtitle {
        color: #fff;
        font-size: clamp(1rem, 2vw, 1.4rem);
        font-weight: 700;
        letter-spacing: 0.08em;
        margin-bottom: 24px;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.7s ease forwards 0.5s;
    }

    .hero-desc {
        color: #aaa;
        font-size: clamp(0.85rem, 1.5vw, 1rem);
        line-height: 1.8;
        max-width: 480px;
        margin-bottom: 36px;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.7s ease forwards 0.65s;
    }

    .btn-primary {
        display: inline-block;
        background: var(--yellow);
        color: #000;
        font-weight: 800;
        font-size: 0.9rem;
        padding: 14px 36px;
        border-radius: 14px;
        text-decoration: none;
        letter-spacing: 0.03em;
        transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
        box-shadow: 0 0 30px rgba(255,193,7,0.3);
        opacity: 0;
        transform: translateY(20px);
        animation: fadeUp 0.7s ease forwards 0.8s;
    }
    .btn-primary:hover {
        background: var(--yellow-dark);
        transform: translateY(-3px) scale(1.04);
        box-shadow: 0 8px 40px rgba(255,193,7,0.45);
    }

    /* HERO MASKOT */
    .hero-img-wrap {
        position: relative;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        opacity: 0;
        transform: translateX(30px);
        animation: fadeLeft 0.9s ease forwards 0.4s;
    }

    .hero-img-glow {
        position: absolute;
        width: 340px;
        height: 340px;
        background: radial-gradient(circle, rgba(255,193,7,0.25) 0%, transparent 70%);
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        pointer-events: none;
        animation: pulse-glow 3s ease-in-out infinite;
    }

    .hero-img {
        position: relative;
        max-width: 420px;
        width: 100%;
        z-index: 2;
        filter: drop-shadow(0 8px 40px rgba(255,193,7,0.2));
        animation: float 4s ease-in-out infinite;
    }

    /* ===== VIDEO SECTION ===== */
    .video-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
        position: relative;
        z-index: 10;
    }

    .video-frame {
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid #2a2a2a;
        box-shadow: 0 0 40px rgba(255,193,7,0.1);
        position: relative;
        transition: box-shadow 0.3s, transform 0.3s;
    }
    .video-frame:hover {
        box-shadow: 0 0 60px rgba(255,193,7,0.22);
        transform: translateY(-4px);
    }
    .video-frame iframe {
        width: 100%;
        aspect-ratio: 16/9;
        display: block;
    }

    .video-text { padding-left: 20px; }
    .section-eyebrow {
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 6px;
    }
    .section-title-yellow {
        font-family: 'Bebas Neue', sans-serif;
        color: var(--yellow);
        font-size: clamp(2.2rem, 4vw, 3.8rem);
        letter-spacing: 0.04em;
        line-height: 1;
        margin-bottom: 20px;
    }
    .section-desc {
        color: #aaa;
        font-size: clamp(0.85rem, 1.4vw, 1rem);
        line-height: 1.8;
        margin-bottom: 28px;
    }
    .btn-outline-yellow {
        display: inline-block;
        background: var(--yellow);
        color: #000;
        font-weight: 800;
        font-size: 0.85rem;
        padding: 12px 28px;
        border-radius: 12px;
        text-decoration: none;
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 0 24px rgba(255,193,7,0.25);
    }
    .btn-outline-yellow:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 30px rgba(255,193,7,0.4);
    }

    /* ===== PROGRAM SECTION ===== */
    .program-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: center;
        position: relative;
        z-index: 10;
    }

    /* Stacked Card */
    .card-stack {
        position: relative;
        height: 320px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .card-stack-layer {
        position: absolute;
        width: 75%;
        height: 85%;
        border-radius: 20px;
        transition: transform 0.4s;
    }
    .card-stack-layer:nth-child(1) {
        background: rgba(21,85,40,0.45);
        transform: rotate(-7deg) translateX(12px);
        border: 1px solid rgba(34,140,60,0.3);
    }
    .card-stack-layer:nth-child(2) {
        background: rgba(21,100,48,0.7);
        transform: rotate(-3deg) translateX(6px);
        border: 1px solid rgba(34,150,60,0.5);
    }
    .card-stack-main {
        position: relative;
        width: 75%;
        height: 85%;
        border-radius: 20px;
        background: linear-gradient(135deg, #1a6b35 0%, #0d4020 100%);
        border: 2px solid #2ea84a;
        padding: 24px;
        box-shadow: 0 16px 60px rgba(0,0,0,0.5);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 2;
        transition: transform 0.4s, box-shadow 0.4s;
    }
    .card-stack:hover .card-stack-layer:nth-child(1) { transform: rotate(-10deg) translateX(18px); }
    .card-stack:hover .card-stack-layer:nth-child(2) { transform: rotate(-5deg) translateX(10px); }
    .card-stack:hover .card-stack-main { transform: translateY(-6px); box-shadow: 0 24px 80px rgba(0,0,0,0.6); }

    .card-badge {
        background: rgba(0,0,0,0.35);
        color: #fff;
        font-size: 0.65rem;
        font-weight: 700;
        padding: 4px 10px;
        border-radius: 6px;
        display: inline-block;
    }
    .card-title {
        font-family: 'Bebas Neue', sans-serif;
        color: #fff;
        font-size: 1.9rem;
        letter-spacing: 0.06em;
        text-align: center;
        line-height: 1.15;
        margin-top: 8px;
    }
    .card-btn {
        background: var(--yellow);
        color: #000;
        font-size: 0.7rem;
        font-weight: 800;
        padding: 8px 20px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        display: block;
        margin: 0 auto;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card-btn:hover { transform: scale(1.05); box-shadow: 0 4px 20px rgba(255,193,7,0.4); }

    .program-text-title {
        font-family: 'Bebas Neue', sans-serif;
        color: var(--yellow);
        font-size: clamp(2rem, 3.5vw, 3rem);
        letter-spacing: 0.04em;
        margin-bottom: 4px;
    }
    .program-text-sub {
        color: #fff;
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .learn-link {
        color: var(--yellow);
        font-weight: 800;
        text-decoration: none;
        border-bottom: 2px solid var(--yellow);
        padding-bottom: 2px;
        font-size: 0.9rem;
        transition: color 0.2s, border-color 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .learn-link:hover { color: #fff; border-color: #fff; }

    /* ===== STATS SECTION ===== */
    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        position: relative;
        z-index: 10;
    }

    .stat-card {
        border-radius: 28px;
        padding: 40px 36px;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        border: 1px solid #2a2a2a;
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        overflow: hidden;
    }
    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 60px rgba(255,193,7,0.18);
    }
    .stat-card.dark { background: var(--black-card2); color: #fff; }
    .stat-card.light { background: var(--yellow); color: #000; }

    .stat-label {
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        margin-bottom: 6px;
    }
    .stat-period {
        font-size: 0.75rem;
        font-weight: 600;
        opacity: 0.75;
        margin-bottom: 28px;
        line-height: 1.5;
    }
    .stat-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.78rem;
        font-weight: 800;
        text-decoration: none;
        transition: opacity 0.2s;
    }
    .stat-link:hover { opacity: 0.7; }
    .stat-link-icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        font-weight: 900;
    }
    .stat-number {
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(4.5rem, 8vw, 7rem);
        line-height: 1;
        letter-spacing: -0.02em;
        counter-reset: num;
    }
    .stat-card.dark .stat-number { color: var(--yellow); }
    .stat-card.light .stat-number { color: #000; }
    .stat-card.dark .stat-link { color: var(--yellow); }
    .stat-card.dark .stat-link-icon { background: var(--yellow); color: #000; }
    .stat-card.light .stat-link { color: #000; }
    .stat-card.light .stat-link-icon { background: #000; color: var(--yellow); }

    /* ===== NEWS SECTION ===== */
    .news-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        position: relative;
        z-index: 10;
    }

    .news-card {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        aspect-ratio: 4/3;
        border: 1px solid #222;
        transition: transform 0.35s, box-shadow 0.35s;
        cursor: pointer;
    }
    .news-card:hover { transform: translateY(-6px); box-shadow: 0 20px 60px rgba(255,193,7,0.15); }
    .news-card img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .news-card:hover img { transform: scale(1.06); }
    .news-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.92) 0%, rgba(0,0,0,0.35) 50%, transparent 100%);
        transition: background 0.35s;
    }
    .news-card:hover .news-overlay { background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.5) 60%, rgba(0,0,0,0.1) 100%); }
    .news-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 28px;
    }
    .news-cat {
        color: var(--yellow);
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        margin-bottom: 8px;
    }
    .news-title {
        color: #fff;
        font-size: clamp(1.1rem, 2vw, 1.6rem);
        font-weight: 800;
        line-height: 1.25;
        margin-bottom: 8px;
        transition: color 0.2s;
    }
    .news-card:hover .news-title { color: var(--yellow); }
    .news-desc {
        color: #bbb;
        font-size: 0.8rem;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ===== SECTION HEADER ===== */
    .section-header {
        text-align: center;
        margin-bottom: 60px;
        position: relative;
        z-index: 10;
    }

    /* ===== ANIMATIONS ===== */
    @keyframes fadeUp {
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeLeft {
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-16px); }
    }
    @keyframes pulse-glow {
        0%, 100% { opacity: 0.5; transform: translate(-50%,-50%) scale(1); }
        50% { opacity: 1; transform: translate(-50%,-50%) scale(1.15); }
    }
    @keyframes spin-slow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    @keyframes twinkle {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.3; transform: scale(0.6); }
    }
    @keyframes drift {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        33% { transform: translateY(-8px) rotate(5deg); }
        66% { transform: translateY(4px) rotate(-3deg); }
    }
    @keyframes counter-anim {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Scroll reveal */
    .reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }
    .reveal-left {
        opacity: 0;
        transform: translateX(-40px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .reveal-left.visible {
        opacity: 1;
        transform: translateX(0);
    }
    .reveal-right {
        opacity: 0;
        transform: translateX(40px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }
    .reveal-right.visible {
        opacity: 1;
        transform: translateX(0);
    }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }
    .reveal-delay-4 { transition-delay: 0.4s; }

    /* Star twinkle delays */
    .twinkle-1 { animation: twinkle 2s ease-in-out infinite; }
    .twinkle-2 { animation: twinkle 2.8s ease-in-out infinite 0.5s; }
    .twinkle-3 { animation: twinkle 2.3s ease-in-out infinite 1s; }
    .twinkle-4 { animation: twinkle 3.1s ease-in-out infinite 1.5s; }
    .twinkle-5 { animation: twinkle 2s ease-in-out infinite 0.8s; }
    .twinkle-6 { animation: twinkle 2.6s ease-in-out infinite 0.3s; }

    /* ===== DIVIDER LINE ===== */
    .section-divider {
        width: 60px;
        height: 3px;
        background: var(--yellow);
        margin: 0 auto 20px;
        border-radius: 2px;
    }

    /* ===== MEMBER COUNT SECTION ===== */
    .member-section-title {
        color: #fff;
        font-size: clamp(1.5rem, 3.5vw, 2.5rem);
        font-weight: 900;
        text-align: center;
        margin-bottom: 60px;
        line-height: 1.3;
        position: relative;
        z-index: 10;
    }

    /* ===== CURSOR EFFECT ===== */
    .cursor-dot {
        width: 8px; height: 8px;
        background: var(--yellow);
        border-radius: 50%;
        position: fixed;
        top: 0; left: 0;
        pointer-events: none;
        z-index: 9999;
        transition: transform 0.1s;
        mix-blend-mode: difference;
    }
    .cursor-ring {
        width: 32px; height: 32px;
        border: 2px solid rgba(255,193,7,0.5);
        border-radius: 50%;
        position: fixed;
        top: 0; left: 0;
        pointer-events: none;
        z-index: 9998;
        transition: width 0.3s, height 0.3s, border-color 0.3s;
    }

    /* ===== SCROLL INDICATOR ===== */
    .scroll-indicator {
        position: absolute;
        bottom: 32px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        color: #555;
        font-size: 0.7rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        z-index: 10;
    }
    .scroll-line {
        width: 1px;
        height: 40px;
        background: linear-gradient(to bottom, #555, transparent);
        animation: scroll-down 1.8s ease-in-out infinite;
    }
    @keyframes scroll-down {
        0% { transform: scaleY(0); transform-origin: top; }
        50% { transform: scaleY(1); transform-origin: top; }
        51% { transform: scaleY(1); transform-origin: bottom; }
        100% { transform: scaleY(0); transform-origin: bottom; }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
        .hero-grid, .video-grid, .program-grid {
            grid-template-columns: 1fr;
            gap: 32px;
        }
        .hero-img-wrap { display: none; }
        .video-text { padding-left: 0; }
        .video-frame { order: 1; }
        .video-text { order: 2; }
        .program-grid .card-stack { order: 2; }
        .program-grid .program-text { order: 1; }
        .stats-grid { grid-template-columns: 1fr 1fr; }
        .news-grid { grid-template-columns: 1fr; }
        .section-wrap { padding: 60px 20px; }
    }

    @media (max-width: 640px) {
        .hero-title { font-size: 2.2rem; }
        .section-title-yellow { font-size: 2.2rem; }
        .stats-grid { grid-template-columns: 1fr; }
        .stat-card { padding: 28px 24px; }
        .stat-number { font-size: 4rem; }
        .card-stack { height: 260px; }
        .news-card { aspect-ratio: 3/2; }
        .section-wrap { padding: 48px 16px; }
    }
</style>

<div class="cursor-dot" id="cursorDot"></div>
<div class="cursor-ring" id="cursorRing"></div>

<div class="page-wrapper">

    <svg class="bg-lines" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
        <path d="M 80 150 Q 350 280 250 550 T 700 950" fill="transparent" stroke="#FFC107" stroke-width="1.5" stroke-dasharray="8 14"/>
        <path d="M 900 100 Q 1100 400 1000 700 T 1200 1400" fill="transparent" stroke="#FFC107" stroke-width="1.5" stroke-dasharray="8 14"/>
        <path d="M 400 1200 Q 700 1500 600 1900" fill="transparent" stroke="#FFC107" stroke-width="1.5" stroke-dasharray="8 14"/>
    </svg>

    @include('pages.home.sections.hero')
    @include('pages.home.sections.video')
    @include('pages.home.sections.program')
    @include('pages.home.sections.statistics')
    @include('pages.home.sections.news')

</div><script>
// ===== CUSTOM CURSOR =====
const dot = document.getElementById('cursorDot');
const ring = document.getElementById('cursorRing');
let mx = 0, my = 0, rx = 0, ry = 0;

document.addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    dot.style.left = mx - 4 + 'px';
    dot.style.top = my - 4 + 'px';
});

function animateRing() {
    rx += (mx - rx - 16) * 0.12;
    ry += (my - ry - 16) * 0.12;
    ring.style.left = rx + 'px';
    ring.style.top = ry + 'px';
    requestAnimationFrame(animateRing);
}
animateRing();

document.querySelectorAll('a, button').forEach(el => {
    el.addEventListener('mouseenter', () => {
        ring.style.width = '50px';
        ring.style.height = '50px';
        ring.style.borderColor = '#FFC107';
    });
    el.addEventListener('mouseleave', () => {
        ring.style.width = '32px';
        ring.style.height = '32px';
        ring.style.borderColor = 'rgba(255,193,7,0.5)';
    });
});

// ===== SCROLL REVEAL =====
const reveals = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

reveals.forEach(el => observer.observe(el));

// ===== COUNTER ANIMATION =====
function animateCounter(el, target, duration) {
    const start = performance.now();
    const update = (now) => {
        const elapsed = now - start;
        const progress = Math.min(elapsed / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const current = Math.floor(eased * target);
        el.textContent = current;
        if (progress < 1) requestAnimationFrame(update);
        else el.textContent = target;
    };
    requestAnimationFrame(update);
}

const statObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const target = parseInt(entry.target.dataset.target);
            if (!isNaN(target)) animateCounter(entry.target, target, 1400);
            statObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stat-number[data-target]').forEach(el => statObserver.observe(el));

// ===== PARALLAX STARS =====
document.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    document.querySelectorAll('.deco-star').forEach((star, i) => {
        const speed = (i % 3 + 1) * 0.08;
        star.style.transform = `translateY(${scrollY * speed}px)`;
    });
});

// ===== HIDE CURSOR ON MOBILE =====
if ('ontouchstart' in window) {
    dot.style.display = 'none';
    ring.style.display = 'none';
}
</script>

@endsection