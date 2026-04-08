@extends('layouts.app')

@section('content')
<style>
    :root {
        --bg: #08101f;
        --bg-soft: #0f172a;
        --card: rgba(255, 255, 255, 0.06);
        --card-strong: rgba(255, 255, 255, 0.08);
        --card-border: rgba(255, 255, 255, 0.12);
        --text: #eef4ff;
        --muted: #c4cde3;
        --primary: #6ea8fe;
        --primary-strong: #4f8cff;
        --accent: #8b5cf6;
        --success: #22c55e;
        --shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
        --shadow-lg: 0 28px 80px rgba(0, 0, 0, 0.4);
        --radius: 24px;
        --container: 1180px;
        --nav-height: 86px;
        --focus-ring: rgba(110, 168, 254, 0.55);
        --focus-ring-offset: #050a14;
        --section-y: clamp(52px, 6vw, 76px);
        --card-pad: 22px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    ::selection {
        background: rgba(110, 168, 254, 0.35);
        color: #fff;
    }

    .skip-link {
        position: absolute;
        left: -9999px;
        top: 0;
        z-index: 10000;
        padding: 12px 20px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary), var(--primary-strong));
        color: #071120;
        font-weight: 700;
        font-size: 0.95rem;
        box-shadow: 0 8px 24px rgba(79, 140, 255, 0.45);
        transition: transform 0.2s ease;
    }

    .skip-link:focus {
        left: 16px;
        top: 16px;
        outline: 3px solid var(--focus-ring);
        outline-offset: 3px;
    }

    body {
        font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        font-size: 1.0625rem;
        line-height: 1.65;
        background:
            radial-gradient(circle at top left, rgba(110, 168, 254, 0.14), transparent 28%),
            radial-gradient(circle at top right, rgba(139, 92, 246, 0.14), transparent 28%),
            linear-gradient(180deg, #050a14 0%, #09111f 100%);
        color: var(--text);
        overflow-x: hidden;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    img {
        max-width: 100%;
        display: block;
    }

    section[id] {
        scroll-margin-top: 96px;
    }

    section[id]:not(#home) {
        border-top: 1px solid rgba(255, 255, 255, 0.055);
    }

    @media (prefers-reduced-motion: reduce) {
        html {
            scroll-behavior: auto;
        }

        .reveal-in {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }

        .btn,
        .service-card,
        .experience-card,
        .project-card,
        .testimonial-card,
        .stat-card,
        .contact-link-card,
        .skill-card,
        .hero-card,
        .footer-socials a {
            transition: none !important;
        }

        .btn:hover,
        .service-card:hover,
        .experience-card:hover,
        .project-card:hover,
        .testimonial-card:hover,
        .stat-card:hover,
        .contact-link-card:hover,
        .skill-card:hover,
        .footer-socials a:hover {
            transform: none !important;
        }
    }

    .container {
        width: min(var(--container), calc(100% - 28px));
        margin: 0 auto;
    }

    .section {
        padding: var(--section-y) 0;
        position: relative;
    }

    .section-label {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.1);
        color: #d8e5ff;
        font-size: 0.92rem;
        margin-bottom: 12px;
    }

    .section-title {
        font-size: clamp(2rem, 5vw, 2.8rem);
        line-height: 1.1;
        margin-bottom: 10px;
        font-weight: 800;
        letter-spacing: -0.03em;
    }

    .section-intro,
    .contact-subtitle {
        max-width: 42rem;
        color: var(--muted);
        font-size: 1.0625rem;
        line-height: 1.75;
        margin-bottom: 1.5rem;
    }

    .contact-subtitle {
        margin-bottom: 1.35rem;
    }

    .glass {
        background: var(--card);
        backdrop-filter: blur(14px);
        border: 1px solid var(--card-border);
        box-shadow: var(--shadow);
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 20px;
        border-radius: 999px;
        border: 1px solid transparent;
        font-weight: 700;
        transition: 0.3s ease;
        cursor: pointer;
        white-space: nowrap;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--primary-strong));
        color: #071120;
        box-shadow: 0 16px 30px rgba(79, 140, 255, 0.35);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 36px rgba(79, 140, 255, 0.45);
    }

    .btn-outline {
        border-color: rgba(255,255,255,0.16);
        color: var(--text);
        background: rgba(255,255,255,0.04);
    }

    .btn-outline:hover {
        transform: translateY(-2px);
        border-color: rgba(255,255,255,0.3);
        background: rgba(255,255,255,0.08);
    }

    .btn:focus-visible,
    .nav-toggle:focus-visible,
    .nav-links a:focus-visible,
    .project-card-btn:focus-visible,
    .footer-socials a:focus-visible,
    .contact-link-card:focus-visible {
        outline: 2px solid var(--focus-ring);
        outline-offset: 3px;
    }

    .contact-field input:focus-visible,
    .contact-field textarea:focus-visible {
        outline: 2px solid var(--focus-ring);
        outline-offset: 0;
    }

    a.project-card:focus-visible {
        outline: 2px solid var(--focus-ring);
        outline-offset: 4px;
        border-radius: var(--radius);
    }

    .nav-header {
        position: sticky;
        top: 0;
        z-index: 999;
        width: 100%;
        background: rgba(6, 10, 20, 0.78);
        backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .nav-inner {
        position: relative;
        width: min(var(--container), calc(100% - 28px));
        margin: 0 auto;
        min-height: var(--nav-height);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .nav-logo-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .nav-logo-img,
    .nav-logo-text {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        object-fit: cover;
        object-position: center 22%;
    }

    .nav-logo-text {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary), var(--accent));
        color: #fff;
        box-shadow: 0 10px 24px rgba(79, 140, 255, 0.32);
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 16px;
        list-style: none;
    }

    .nav-links a {
        color: #dce5fb;
        font-size: 0.96rem;
        font-weight: 600;
        position: relative;
        transition: 0.25s ease;
    }

    .nav-links a:hover,
    .nav-links a.active {
        color: #fff;
    }

    .nav-links a::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -8px;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--primary), var(--accent));
        transition: 0.25s ease;
    }

    .nav-links a:hover::after,
    .nav-links a.active::after {
        width: 100%;
    }

    .nav-toggle {
        display: none;
        width: 46px;
        height: 46px;
        border-radius: 14px;
        border: 1px solid rgba(255,255,255,0.12);
        background: rgba(255,255,255,0.06);
        color: #fff;
        cursor: pointer;
    }

    .hero {
        position: relative;
        padding: calc(var(--nav-height) + 32px) 0 52px;
        padding-left: max(0px, env(safe-area-inset-left));
        padding-right: max(0px, env(safe-area-inset-right));
        min-height: calc(100vh - 40px);
        min-height: calc(100dvh - 40px);
        display: flex;
        align-items: center;
        overflow: hidden;
        background-color: #050a14;
        background-image:
            linear-gradient(
                105deg,
                rgba(5, 10, 22, 0.97) 0%,
                rgba(5, 12, 26, 0.9) 35%,
                rgba(6, 16, 36, 0.72) 58%,
                rgba(4, 10, 24, 0.5) 100%
            ),
            url("{{ asset('images/hero-tech-bg.jpg') }}");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
    }

    .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
        background-size: 28px 28px;
        mask-image: linear-gradient(180deg, rgba(0, 0, 0, 0.65) 0%, rgba(0, 0, 0, 0.2) 55%, transparent 100%);
        pointer-events: none;
        z-index: 0;
    }

    .hero .container {
        position: relative;
        z-index: 1;
    }

    .hero-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.12fr) minmax(300px, 0.88fr);
        gap: clamp(18px, 3vw, 32px);
        align-items: start;
    }

    .hero-content {
        min-width: 0;
    }

    .hero-title {
        font-size: clamp(2.5rem, 5.5vw, 4.7rem);
        line-height: 1.04;
        font-weight: 900;
        letter-spacing: -0.045em;
        margin-bottom: 14px;
        max-width: 700px;
    }

    .hero-title span {
        background: linear-gradient(135deg, #ffffff, #afccff, #b89aff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        max-width: 720px;
        color: var(--muted);
        font-size: 1.08rem;
        line-height: 1.9;
        margin-bottom: 20px;
    }

    .hero-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 11px;
        margin-bottom: 18px;
    }

    .hero-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
    }

    .hero-badge,
    .tech-pill {
        padding: 10px 14px;
        border-radius: 999px;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        color: #d8e5ff;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .project-meta span {
        padding: 6px 11px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.07);
        color: #9eb0d4;
        font-size: 0.8125rem;
        font-weight: 600;
    }

    .hero-card,
    .about-content,
    .about-side-card,
    .service-card,
    .skills-category,
    .experience-card,
    .project-card,
    .testimonial-card,
    .contact-form-card,
    .contact-link-card,
    .stat-card,
    .skill-highlight-card {
        background: var(--card);
        border: 1px solid var(--card-border);
        box-shadow: var(--shadow);
        border-radius: var(--radius);
    }

    .hero-card {
        padding: var(--card-pad);
        position: relative;
        overflow: hidden;
        min-width: 0;
        margin-top: 0;
    }

    .hero-card::before {
        content: "";
        position: absolute;
        right: -40px;
        top: -40px;
        width: 160px;
        height: 160px;
        background: radial-gradient(circle, rgba(139,92,246,0.22), transparent 70%);
        pointer-events: none;
    }

    .profile-mini {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .profile-avatar {
        width: 72px;
        height: 72px;
        border-radius: 22px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
        border: 2px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.4);
        background: linear-gradient(135deg, var(--primary), var(--accent));
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center 22%;
    }

    .profile-mini h3 {
        font-size: 1.2rem;
        margin-bottom: 4px;
    }

    .profile-mini p {
        color: var(--muted);
        line-height: 1.65;
        font-size: 0.98rem;
    }

    .info-list {
        display: grid;
        gap: 9px;
    }

    .info-item {
        display: flex;
        gap: 12px;
        padding: 13px 14px;
        border-radius: 16px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .info-item i {
        color: var(--primary);
        margin-top: 2px;
        flex-shrink: 0;
        font-size: 1rem;
        opacity: 0.95;
    }

    .info-item strong {
        display: block;
        margin-bottom: 3px;
        font-size: 0.8125rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #c8d7f5;
    }

    .info-item span {
        color: var(--muted);
        line-height: 1.62;
        font-size: 0.9375rem;
    }

    .stats-grid,
    .services-grid,
    .experience-wrap,
    .skills-highlight-grid,
    .testimonials-wrap,
    .contact-grid,
    .projects-grid {
        display: grid;
        gap: 18px;
    }

    .stats-grid {
        grid-template-columns: repeat(4, 1fr);
        margin-top: 28px;
    }

    .stat-card {
        padding: 20px 18px;
        text-align: center;
        transition: transform 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease;
    }

    .stat-card h3 {
        font-size: 2rem;
        font-weight: 900;
        margin-bottom: 8px;
        font-variant-numeric: tabular-nums;
        letter-spacing: -0.02em;
        background: linear-gradient(135deg, #ffffff 0%, #b8d4ff 50%, #c9b8ff 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .stat-card p {
        color: var(--muted);
        line-height: 1.75;
        font-size: 0.95rem;
    }

    .about-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.12fr) minmax(300px, 0.88fr);
        gap: clamp(18px, 3vw, 32px);
        align-items: start;
    }

    .about-content {
        max-width: 58ch;
    }

    .about-side-card {
        position: sticky;
        top: calc(var(--nav-height) + 16px);
    }

    .about-content,
    .about-side-card,
    .service-card,
    .skills-category,
    .experience-card,
    .project-card,
    .testimonial-card,
    .contact-form-card,
    .contact-link-card,
    .skill-highlight-card {
        padding: var(--card-pad);
    }

    .about-p {
        color: var(--muted);
        line-height: 1.78;
        margin-bottom: 1.15rem;
        font-size: 1.04rem;
    }

    .about-vision {
        margin-top: 16px;
        padding: 18px;
        border-radius: 18px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .about-vision-line {
        line-height: 1.85;
        margin-bottom: 8px;
    }

    .about-vision-last {
        margin-bottom: 0;
        color: var(--muted);
    }

    .about-side-card h3,
    .experience-company {
        font-size: 1.28rem;
        margin-bottom: 14px;
        font-weight: 800;
    }

    .about-side-card ul {
        list-style: none;
        display: grid;
        gap: 10px;
    }

    .about-side-card li {
        display: flex;
        gap: 10px;
        color: var(--muted);
        line-height: 1.75;
    }

    .about-side-card li i {
        color: var(--success);
        margin-top: 5px;
        flex-shrink: 0;
    }

    .services-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        align-items: stretch;
    }

    .service-card,
    .experience-card,
    .testimonial-card {
        transition: transform 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease;
    }

    .service-card {
        display: flex;
        flex-direction: column;
        min-height: 240px;
        height: 100%;
    }

    .service-card p {
        flex: 1;
        margin-top: 0;
    }

    .service-card:hover {
        box-shadow: var(--shadow-lg);
    }

    .service-card i,
    .experience-icon,
    .project-card-icon {
        width: 56px;
        height: 56px;
        border-radius: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, rgba(110,168,254,0.18), rgba(139,92,246,0.14));
        border: 1px solid rgba(255,255,255,0.08);
        color: #deebff;
        margin-bottom: 14px;
        font-size: 1.15rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .service-card:hover i {
        transform: scale(1.06);
        box-shadow: 0 8px 20px rgba(110, 168, 254, 0.15);
    }

    .service-card h3 {
        min-height: 2.6em;
        font-size: 1.15rem;
        margin-bottom: 12px;
        line-height: 1.35;
        font-weight: 800;
        color: #f0f4ff;
    }

    .service-card p,
    .experience-desc,
    .project-card-desc,
    .testimonial-quote {
        color: var(--muted);
        line-height: 1.85;
    }

    .skills-highlight-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        margin-bottom: 22px;
        align-items: stretch;
    }

    .skill-highlight-card {
        display: flex;
        flex-direction: column;
        min-height: 120px;
    }

    .skill-highlight-card h4 {
        font-size: 0.8125rem;
        margin-bottom: 11px;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: #a8b8d8;
    }

    .tech-strip {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: auto;
    }

    #skills.section {
        background:
            radial-gradient(ellipse 80% 50% at 50% 0%, rgba(110, 168, 254, 0.06), transparent 55%),
            linear-gradient(180deg, rgba(255, 255, 255, 0.02) 0%, transparent 40%);
    }

    .skills-wrap {
        display: grid;
        gap: 20px;
    }

    .skills-category {
        padding: 22px;
    }

    .skills-category-title {
        font-size: 0.8125rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #9eb0d4;
        margin-bottom: 14px;
        padding-bottom: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        gap: 11px;
    }

    @media (min-width: 720px) {
        .skills-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    .skill-card {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
        gap: 10px;
        padding: 12px 14px;
        min-height: 0;
        border-radius: 16px;
        background: rgba(255,255,255,0.04);
        border: 1px solid rgba(255,255,255,0.08);
        transition: 0.25s ease;
    }

    .skill-card:hover,
    .service-card:hover,
    .experience-card:hover,
    .project-card:hover,
    .testimonial-card:hover,
    .contact-link-card:hover,
    .stat-card:hover {
        transform: translateY(-4px);
        border-color: rgba(255,255,255,0.16);
    }

    .skill-card-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.06);
        color: #dce7ff;
        font-size: 1.08rem;
        flex-shrink: 0;
    }

    .skill-card-name {
        font-weight: 700;
        font-size: 0.98rem;
    }

    .experience-wrap {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        align-items: stretch;
    }

    .experience-card {
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }

    .experience-desc {
        flex: 1;
    }

    .experience-card-featured {
        background: linear-gradient(180deg, rgba(110,168,254,0.08), rgba(255,255,255,0.05));
        border-color: rgba(110,168,254,0.28);
    }

    .experience-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: auto;
        padding: 10px 14px;
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.1);
        font-weight: 700;
        align-self: flex-start;
    }

    .projects-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        align-items: stretch;
    }

    .project-card {
        display: flex;
        flex-direction: column;
        gap: 0;
        position: relative;
        overflow: hidden;
        transition: transform 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease;
        cursor: pointer;
    }

    .project-card:hover {
        box-shadow: var(--shadow-lg);
    }

    .project-card:hover .project-card-icon {
        transform: scale(1.05);
    }

    .project-card .project-card-icon {
        transition: transform 0.3s ease;
    }

    .project-card::after {
        content: "";
        position: absolute;
        right: -30px;
        bottom: -30px;
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, rgba(139,92,246,0.16), transparent 68%);
        pointer-events: none;
    }

    .project-card-title {
        font-size: 1.3rem;
        font-weight: 800;
        letter-spacing: -0.025em;
        color: #f5f8ff;
        line-height: 1.28;
        margin-bottom: 10px;
    }

    .project-card-desc {
        margin-bottom: 14px;
        font-size: 1rem;
        line-height: 1.72;
    }

    .project-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        margin-bottom: 16px;
    }

    .project-card-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: auto;
    }

    .project-card-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 15px;
        border-radius: 999px;
        font-size: 0.92rem;
        font-weight: 700;
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.1);
        color: #fff;
        transition: 0.25s ease;
    }

    .project-card-btn:hover {
        background: rgba(255,255,255,0.12);
    }

    .testimonials-wrap {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        align-items: stretch;
    }

    .testimonial-card {
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 100%;
    }

    .testimonial-card::before {
        content: "“";
        position: absolute;
        top: 18px;
        right: 20px;
        font-size: 4rem;
        line-height: 1;
        color: rgba(255,255,255,0.08);
        font-weight: 900;
    }

    .testimonial-quote {
        margin-bottom: 0;
        position: relative;
        z-index: 1;
        flex: 1;
        font-size: 1.02rem;
        line-height: 1.72;
    }

    .testimonial-meta {
        margin-top: auto;
        padding-top: 0.95rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .testimonial-role {
        color: #e8eeff;
        font-style: normal;
        font-weight: 700;
        font-size: 0.9375rem;
    }

    .contact-grid {
        grid-template-columns: minmax(260px, 0.95fr) minmax(0, 1.05fr);
        gap: 20px 28px;
        align-items: stretch;
    }

    .contact-quick-links {
        display: grid;
        gap: 14px;
    }

    .contact-link-card {
        display: flex;
        align-items: center;
        gap: 14px;
        transition: transform 0.28s ease, border-color 0.28s ease, box-shadow 0.28s ease;
    }

    .contact-link-card:hover {
        box-shadow: var(--shadow-lg);
    }

    .contact-link-icon {
        width: 52px;
        height: 52px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        color: #e0ecff;
        flex-shrink: 0;
    }

    .contact-link-card strong {
        display: block;
        margin-bottom: 4px;
        color: #fff;
    }

    .contact-link-card span span {
        color: var(--muted);
        line-height: 1.7;
        font-size: 0.95rem;
    }

    .contact-form {
        display: grid;
        gap: 14px;
    }

    .contact-form .btn-primary {
        width: 100%;
        min-height: 48px;
        padding: 14px 22px;
        font-size: 1.03rem;
    }

    .contact-field {
        display: grid;
        gap: 6px;
    }

    .contact-field label {
        color: var(--muted);
        font-size: 0.95rem;
        font-weight: 600;
    }

    .contact-field input,
    .contact-field textarea {
        width: 100%;
        border: 1px solid rgba(255,255,255,0.2);
        background: rgba(255,255,255,0.07);
        color: #fff;
        border-radius: 16px;
        padding: 12px 14px;
        outline: none;
        font-size: 0.98rem;
        transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }

    .contact-field textarea {
        resize: vertical;
        min-height: 120px;
        line-height: 1.6;
    }

    .contact-field input:focus,
    .contact-field textarea:focus {
        border-color: rgba(110,168,254,0.45);
        box-shadow: 0 0 0 4px rgba(110,168,254,0.10);
    }

    .contact-field input::placeholder,
    .contact-field textarea::placeholder {
        color: #8f9ab8;
    }

    .form-success,
    .form-errors {
        margin-bottom: 14px;
        padding: 12px 14px;
        border-radius: 16px;
        font-size: 0.95rem;
    }

    .form-success {
        background: rgba(34,197,94,0.12);
        border: 1px solid rgba(34,197,94,0.24);
        color: #c9f7d7;
    }

    .form-errors {
        background: rgba(239,68,68,0.10);
        border: 1px solid rgba(239,68,68,0.20);
        color: #ffd0d0;
    }

    .form-errors ul {
        padding-left: 18px;
    }

    .site-footer {
        padding: 28px 16px 36px;
        border-top: 1px solid rgba(255,255,255,0.08);
        text-align: center;
        margin-top: 16px;
    }

    .footer-tagline,
    .footer-copy {
        color: var(--muted);
    }

    .footer-socials {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        flex-wrap: wrap;
        margin: 14px 0;
    }

    .footer-socials a {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.08);
        color: #f3f6ff;
        transition: 0.25s ease;
    }

    .footer-socials a:hover {
        transform: translateY(-3px);
        background: rgba(255,255,255,0.1);
    }

    .reveal-in {
        opacity: 0;
        transform: translateY(18px);
        transition: opacity 0.55s ease, transform 0.55s ease;
    }

    .reveal-in.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    .delay-1 { transition-delay: .08s; }
    .delay-2 { transition-delay: .14s; }
    .delay-3 { transition-delay: .20s; }
    .delay-4 { transition-delay: .26s; }
    .delay-5 { transition-delay: .32s; }
    .delay-6 { transition-delay: .38s; }

    @media (max-width: 1180px) {
        .hero-grid,
        .about-grid,
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .about-side-card {
            position: static;
        }

        .hero {
            min-height: auto;
        }

        .hero-card {
            max-width: 780px;
        }

        .stats-grid,
        .skills-highlight-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .services-grid,
        .experience-wrap,
        .testimonials-wrap {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .projects-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 900px) {
        .services-grid,
        .experience-wrap,
        .testimonials-wrap {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 860px) {
        .nav-toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .nav-links {
            position: absolute;
            top: calc(100% + 10px);
            left: 16px;
            right: 16px;
            display: none;
            flex-direction: column;
            align-items: flex-start;
            gap: 14px;
            padding: 18px;
            background: rgba(7, 11, 22, 0.96);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 22px;
            box-shadow: var(--shadow);
        }

        .nav-links.open {
            display: flex;
        }

        .nav-links a {
            display: block;
            width: 100%;
            padding: 12px 10px;
            border-radius: 12px;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background: rgba(255, 255, 255, 0.06);
        }

        .nav-links a::after {
            display: none;
        }

        .section {
            padding: 56px 0;
        }

        .hero {
            padding-top: calc(var(--nav-height) + 28px);
            background-position: center 35%;
        }

        .stats-grid,
        .skills-highlight-grid,
        .skills-grid {
            grid-template-columns: 1fr;
        }

        .about-content,
        .about-side-card,
        .service-card,
        .skills-category,
        .experience-card,
        .project-card,
        .testimonial-card,
        .contact-form-card,
        .contact-link-card,
        .skill-highlight-card,
        .hero-card {
            padding: 18px;
        }

        .hero-title {
            font-size: clamp(2.2rem, 9vw, 3.3rem);
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .profile-mini {
            align-items: flex-start;
        }
    }

    @media (max-width: 560px) {
        .container {
            width: min(var(--container), calc(100% - 24px));
        }

        .hero-btns,
        .project-card-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn,
        .project-card-btn {
            width: 100%;
        }

        .hero-badges,
        .project-meta,
        .tech-strip {
            gap: 8px;
        }
    }
</style>

<a href="#main-content" class="skip-link">Skip to main content</a>

<nav class="nav-header" aria-label="Primary">
    <div class="nav-inner">
        <div class="nav-logo">
            <a href="#home" class="nav-logo-link" aria-label="Nawaj Sharif - Home">
                @if(isset($logo) && $logo)
                    <img src="{{ $logo }}" alt="Nawaj Sharif" class="nav-logo-img" width="46" height="46">
                @else
                    <img src="{{ asset('images/nawaj-portrait.png') }}" alt="Nawaj Sharif" class="nav-logo-img" width="46" height="46">
                @endif
            </a>
        </div>

        <button type="button" class="nav-toggle" id="navToggle" aria-label="Open menu" aria-expanded="false" aria-controls="navMenu">
            <i class="fa-solid fa-bars" aria-hidden="true"></i>
        </button>

        <ul class="nav-links" id="navMenu" role="list">
            <li><a href="#home" class="active" aria-current="page">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </div>
</nav>

<main id="main-content" tabindex="-1">
<section class="hero" id="home">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <span class="section-label reveal-in">
                    <i class="fa-solid fa-circle-check"></i> Available for freelance and full-time opportunities
                </span>

                <h1 class="hero-title reveal-in delay-1">
                    Hi, I’m Nawaj <span>Sharif</span><br>
                    Backend Developer
                </h1>

                <p class="hero-subtitle reveal-in delay-2">
                    I specialize in backend development and logic building. I build scalable web applications,
                    admin panels, APIs, and business platforms that are reliable, structured, and ready for real-world use.
                    My focus is on clean code, strong backend architecture, and practical solutions that support business growth.
                </p>

                <div class="hero-btns reveal-in delay-3">
                    <a href="#projects" class="btn btn-primary">
                        <i class="fa-solid fa-briefcase"></i> View Projects
                    </a>
                    <a href="#contact" class="btn btn-outline">
                        <i class="fa-solid fa-paper-plane"></i> Let’s Work Together
                    </a>
                </div>

                <div class="hero-badges reveal-in delay-4">
                    <span class="hero-badge">4+ Years Experience</span>
                    <span class="hero-badge">Backend & Logic Building</span>
                    <span class="hero-badge">Laravel, PHP & MySQL</span>
                    <span class="hero-badge">API & Admin Systems</span>
                </div>
            </div>

            <div class="hero-card glass reveal-in delay-3">
                <div class="profile-mini">
                    <div class="profile-avatar">
                        <img src="{{ asset('images/nawaj-portrait.png') }}" alt="" width="72" height="72" decoding="async">
                    </div>
                    <div>
                        <h3>Nawaj Sharif</h3>
                        <p>Software Developer focused on backend systems, business logic, scalable APIs, and practical platform development.</p>
                    </div>
                </div>

                <div class="info-list">
                    <div class="info-item">
                        <i class="fa-solid fa-code"></i>
                        <div>
                            <strong>Core Stack</strong>
                            <span>PHP, Laravel, MySQL, REST APIs, JavaScript, AWS, Docker</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="fa-solid fa-briefcase"></i>
                        <div>
                            <strong>Specialized In</strong>
                            <span>Backend development, logic building, admin panels, booking systems, APIs, and business platforms</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <i class="fa-solid fa-bolt"></i>
                        <div>
                            <strong>Currently Growing</strong>
                            <span>React, Python, FastAPI, Docker, deployment workflows, and modern system design</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stats-grid reveal-in delay-4">
            <div class="stat-card glass">
                <h3>4+</h3>
                <p>Years of professional experience in software development and backend delivery</p>
            </div>
            <div class="stat-card glass">
                <h3>8+</h3>
                <p>Client and product projects built or contributed to across multiple industries</p>
            </div>
            <div class="stat-card glass">
                <h3>Core</h3>
                <p>Strong focus on backend development, business logic, structure, and maintainability</p>
            </div>
            <div class="stat-card glass">
                <h3>2025</h3>
                <p>Recognized as Best Employee of the Year for ownership, quality, and delivery</p>
            </div>
        </div>
    </div>
</section>

<section id="about" class="section">
    <div class="container">
        <span class="section-label reveal-in">About Me</span>
        <h2 class="section-title reveal-in delay-1">I build dependable backend systems with clean logic and real purpose</h2>
        <p class="section-intro reveal-in delay-2">
            A short introduction about who I am, what I specialize in, and how I approach software development.
        </p>

        <div class="about-grid">
            <div class="about-content reveal-in delay-2">
                <p class="about-p">
                    I’m Nawaj Sharif, a Software Developer with 4+ years of experience in building web applications,
                    backend systems, admin panels, and scalable APIs. My main strength is backend development and logic building,
                    where I focus on creating structured, reliable, and maintainable solutions.
                </p>
                <p class="about-p">
                    Over the years, I have worked on multiple projects from requirement understanding and database design
                    to backend development, API integration, business flow implementation, client communication, and deployment support.
                    I enjoy solving complex requirements with clean logic and practical execution.
                </p>
                <p class="about-p">
                    I continue to grow my skills in React, Python, FastAPI, Docker, and modern deployment practices
                    so I can build even stronger and more complete systems in the future.
                </p>

                <div class="about-vision">
                    <p class="about-vision-line">I believe good software starts with strong logic.</p>
                    <p class="about-vision-line">I focus on backend clarity, maintainability, and business value.</p>
                    <p class="about-vision-line about-vision-last">
                        My goal is to build systems that are scalable, useful, and dependable for long-term growth.
                    </p>
                </div>
            </div>

            <div class="about-side-card reveal-in delay-3">
                <h3>What I can help with</h3>
                <ul>
                    <li><i class="fa-solid fa-check"></i> Custom Laravel application development</li>
                    <li><i class="fa-solid fa-check"></i> Backend architecture and business logic implementation</li>
                    <li><i class="fa-solid fa-check"></i> REST API development and integration</li>
                    <li><i class="fa-solid fa-check"></i> Booking systems and admin panel development</li>
                    <li><i class="fa-solid fa-check"></i> Database design and backend optimization</li>
                    <li><i class="fa-solid fa-check"></i> Structured solutions for real business workflows</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="services" class="section">
    <div class="container">
        <span class="section-label reveal-in">Services</span>
        <h2 class="section-title reveal-in delay-1">What I do best</h2>
        <p class="section-intro reveal-in delay-2">
            These are the areas where I can contribute most effectively for products, clients, and business systems.
        </p>

        <div class="services-grid">
            <div class="service-card reveal-in delay-2">
                <i class="fa-solid fa-server"></i>
                <h3>Backend Development</h3>
                <p>
                    I build structured and scalable backend systems using Laravel and PHP with a strong focus on performance,
                    maintainability, and clean project structure.
                </p>
            </div>

            <div class="service-card reveal-in delay-3">
                <i class="fa-solid fa-diagram-project"></i>
                <h3>Logic Building</h3>
                <p>
                    I design and implement business logic that keeps applications practical, reliable, and aligned with real workflow requirements.
                </p>
            </div>

            <div class="service-card reveal-in delay-4">
                <i class="fa-solid fa-plug-circle-bolt"></i>
                <h3>API & Admin Systems</h3>
                <p>
                    I develop REST APIs, admin panels, and internal business tools that support operations, automation, and platform growth.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="experience" class="section">
    <div class="container">
        <span class="section-label reveal-in">Experience</span>
        <h2 class="section-title reveal-in delay-1">Professional journey and recognition</h2>
        <p class="section-intro reveal-in delay-2">
            Companies I’ve worked with and the value I delivered through ownership, logic building, execution, and backend development.
        </p>

        <div class="experience-wrap">
            <div class="experience-card reveal-in delay-2">
                <span class="experience-icon"><i class="fa-solid fa-building"></i></span>
                <h3 class="experience-company">Sundew</h3>
                <p class="experience-desc">
                    Contributed to software development and delivery across client-focused projects with emphasis on structured implementation,
                    clean execution, and dependable technical support.
                </p>
            </div>

            <div class="experience-card reveal-in delay-3">
                <span class="experience-icon"><i class="fa-solid fa-building"></i></span>
                <h3 class="experience-company">Notebrains</h3>
                <p class="experience-desc">
                    Handled project delivery with strong ownership, including requirement understanding, development, demos,
                    client communication, and complete end-to-end execution.
                </p>
            </div>

            <div class="experience-card experience-card-featured reveal-in delay-4">
                <span class="experience-icon"><i class="fa-solid fa-building"></i></span>
                <h3 class="experience-company">Coactive IT Solutions Pvt. Ltd. (SAP Partner)</h3>
                <p class="experience-desc">
                    Delivering enterprise-focused solutions while managing backend development, business logic, client meetings,
                    project coordination, and technical execution with a business-first mindset.
                </p>
                <div class="experience-badge">
                    <i class="fa-solid fa-trophy"></i>
                    <span>Best Employee of the Year 2025</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section">
    <div class="container">
        <span class="section-label reveal-in">Skills</span>
        <h2 class="section-title reveal-in delay-1">Technologies I use to build strong backend products</h2>
        <p class="section-intro reveal-in delay-2">
            My strongest capabilities are around backend systems, business logic, APIs, admin panels, and practical development workflows.
        </p>

        <div class="skills-highlight-grid reveal-in delay-2">
            <div class="skill-highlight-card">
                <h4>Core Skills</h4>
                <div class="tech-strip">
                    <span class="tech-pill">Laravel</span>
                    <span class="tech-pill">PHP</span>
                    <span class="tech-pill">MySQL</span>
                    <span class="tech-pill">REST API</span>
                </div>
            </div>

            <div class="skill-highlight-card">
                <h4>Specialized Focus</h4>
                <div class="tech-strip">
                    <span class="tech-pill">Backend Development</span>
                    <span class="tech-pill">Logic Building</span>
                    <span class="tech-pill">Admin Panels</span>
                    <span class="tech-pill">Booking Systems</span>
                </div>
            </div>

            <div class="skill-highlight-card">
                <h4>Growing With</h4>
                <div class="tech-strip">
                    <span class="tech-pill">Python</span>
                    <span class="tech-pill">FastAPI</span>
                    <span class="tech-pill">Docker</span>
                    <span class="tech-pill">AWS</span>
                </div>
            </div>
        </div>

        <div class="skills-wrap">
            <div class="skills-category reveal-in delay-2">
                <h3 class="skills-category-title">Backend</h3>
                <div class="skills-grid">
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-php"></i></span><span class="skill-card-name">PHP</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-laravel"></i></span><span class="skill-card-name">Laravel</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-solid fa-plug"></i></span><span class="skill-card-name">REST API</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-python"></i></span><span class="skill-card-name">Python</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-solid fa-bolt"></i></span><span class="skill-card-name">FastAPI</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-node-js"></i></span><span class="skill-card-name">Node.js</span></div>
                </div>
            </div>

            <div class="skills-category reveal-in delay-3">
                <h3 class="skills-category-title">Frontend</h3>
                <div class="skills-grid">
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-html5"></i></span><span class="skill-card-name">HTML</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-css3-alt"></i></span><span class="skill-card-name">CSS</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-js"></i></span><span class="skill-card-name">JavaScript</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-react"></i></span><span class="skill-card-name">React</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-solid fa-forward"></i></span><span class="skill-card-name">Next.js</span></div>
                </div>
            </div>

            <div class="skills-category reveal-in delay-4">
                <h3 class="skills-category-title">Database & Tools</h3>
                <div class="skills-grid">
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-solid fa-database"></i></span><span class="skill-card-name">MySQL</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-solid fa-database"></i></span><span class="skill-card-name">PostgreSQL</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-solid fa-leaf"></i></span><span class="skill-card-name">MongoDB</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-docker"></i></span><span class="skill-card-name">Docker</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-linux"></i></span><span class="skill-card-name">Linux</span></div>
                    <div class="skill-card"><span class="skill-card-icon"><i class="fa-brands fa-aws"></i></span><span class="skill-card-name">Amazon AWS</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="projects" class="section">
    <div class="container">
        <span class="section-label reveal-in">Projects</span>
        <h2 class="section-title reveal-in delay-1">Selected work across different industries</h2>
        <p class="section-intro reveal-in delay-2">
            A few projects I’ve built or contributed to, with focus on backend development, business logic, admin systems, and delivery.
        </p>

        <div class="projects-grid">
            <div class="project-card reveal-in delay-2" role="button" tabindex="0" onclick="window.open('https://laundryking.co.in/','_blank')" onkeydown="if(event.key==='Enter')window.open('https://laundryking.co.in/','_blank')" aria-label="Open LaundryKing project">
                <span class="project-card-icon"><i class="fa-solid fa-shirt"></i></span>
                <h3 class="project-card-title">LaundryKing</h3>
                <p class="project-card-desc">
                    Built the admin panel and backend system for the LaundryKing platform while supporting mobile app functionality
                    and core operational workflows.
                </p>
                <div class="project-meta">
                    <span>Laravel</span>
                    <span>Admin Panel</span>
                    <span>Backend Logic</span>
                </div>
                <div class="project-card-actions">
                    <a href="https://laundryking.co.in/" target="_blank" rel="noopener noreferrer" class="project-card-btn" onclick="event.stopPropagation()">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    <a href="https://play.google.com/store/apps/details?id=com.laundryking.customer&hl=en" target="_blank" rel="noopener noreferrer" class="project-card-btn" onclick="event.stopPropagation()">Get the App <i class="fa-brands fa-google-play"></i></a>
                </div>
            </div>

            <a href="https://publishergrowth.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-3" aria-label="Open PublishersGrowth project">
                <span class="project-card-icon"><i class="fa-solid fa-newspaper"></i></span>
                <h3 class="project-card-title">PublishersGrowth</h3>
                <p class="project-card-desc">
                    Digital publishing and ad-tech platform where I contributed to platform improvements, backend delivery,
                    and business-side functional enhancements.
                </p>
                <div class="project-meta">
                    <span>Publishing</span>
                    <span>Platform Support</span>
                    <span>Backend Work</span>
                </div>
                <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            </a>

            <a href="https://boho6cur.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-4" aria-label="Open Boho6 project">
                <span class="project-card-icon"><i class="fa-solid fa-bag-shopping"></i></span>
                <h3 class="project-card-title">Boho6</h3>
                <p class="project-card-desc">
                    E-commerce fashion platform built to support modern product showcase, shopping flow,
                    and a cleaner digital experience.
                </p>
                <div class="project-meta">
                    <span>E-commerce</span>
                    <span>Fashion</span>
                    <span>Web Platform</span>
                </div>
                <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            </a>

            <a href="https://dev.travclicks.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-2" aria-label="Open TravClicks project">
                <span class="project-card-icon"><i class="fa-solid fa-plane"></i></span>
                <h3 class="project-card-title">TravClicks</h3>
                <p class="project-card-desc">
                    Travel booking and management platform with multiple modules for business operations,
                    service management, and booking workflows.
                </p>
                <div class="project-meta">
                    <span>Travel</span>
                    <span>Booking System</span>
                    <span>Management Platform</span>
                </div>
                <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            </a>

            <a href="https://educorium.notebrains.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-3" aria-label="Open Educorium project">
                <span class="project-card-icon"><i class="fa-solid fa-graduation-cap"></i></span>
                <h3 class="project-card-title">Educorium</h3>
                <p class="project-card-desc">
                    Education and course management platform built to support digital learning,
                    structured access, and student-side administration.
                </p>
                <div class="project-meta">
                    <span>Education</span>
                    <span>Course Platform</span>
                    <span>User Management</span>
                </div>
                <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            </a>

            <a href="https://glenresidency.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-4" aria-label="Open Glen Residency project">
                <span class="project-card-icon"><i class="fa-solid fa-hotel"></i></span>
                <h3 class="project-card-title">Glen Residency</h3>
                <p class="project-card-desc">
                    Hospitality website for a luxury residency in South Goa featuring stay, dining,
                    and related guest experience information.
                </p>
                <div class="project-meta">
                    <span>Hospitality</span>
                    <span>Hotel Website</span>
                    <span>Brand Presence</span>
                </div>
                <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            </a>

            <a href="https://cur-vip.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-2" aria-label="Open Cur VIP project">
                <span class="project-card-icon"><i class="fa-solid fa-ticket"></i></span>
                <h3 class="project-card-title">Cur VIP</h3>
                <p class="project-card-desc">
                    Exclusive discount and deal platform connecting users to dining, retail,
                    and premium lifestyle experiences in Curaçao.
                </p>
                <div class="project-meta">
                    <span>Offers Platform</span>
                    <span>Tourism</span>
                    <span>Digital Product</span>
                </div>
                <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            </a>

            <a href="https://rubista.in/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-3" aria-label="Open Rubista project">
                <span class="project-card-icon"><i class="fa-solid fa-globe"></i></span>
                <h3 class="project-card-title">Rubista</h3>
                <p class="project-card-desc">
                    Business web platform delivered with focus on reliability, usability,
                    and a clean backend structure for easier ongoing management.
                </p>
                <div class="project-meta">
                    <span>Business Website</span>
                    <span>Clean Delivery</span>
                    <span>Backend Support</span>
                </div>
                <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
            </a>
        </div>
    </div>
</section>

<section id="testimonials" class="section">
    <div class="container">
        <span class="section-label reveal-in">Testimonials</span>
        <h2 class="section-title reveal-in delay-1">What people say about working with me</h2>
        <p class="section-intro reveal-in delay-2">
            Feedback from clients and colleagues based on ownership, delivery, communication, and technical quality.
        </p>

        <div class="testimonials-wrap">
            <blockquote class="testimonial-card reveal-in delay-2">
                <p class="testimonial-quote">
                    Deep appreciation for your dedication to Publishergrowth.com. You addressed major changes promptly and
                    played an instrumental role in the platform’s overhaul—your work has made a lasting impact.
                    Wishing you every success; upwards and onwards!
                </p>
                <footer class="testimonial-meta">
                    <cite class="testimonial-role">Abhishek Dey · Client (PublishersGrowth)</cite>
                </footer>
            </blockquote>

            <blockquote class="testimonial-card reveal-in delay-3">
                <p class="testimonial-quote">
                    Nawaj delivered our Rubista platform on time and with a clear, easy-to-use backend. The site is fast,
                    reliable, and his support during and after launch was excellent. We’re very happy with the outcome
                    and would recommend working with him.
                </p>
                <footer class="testimonial-meta">
                    <cite class="testimonial-role">Tanbir Ikbal · Client (Rubista)</cite>
                </footer>
            </blockquote>

            <blockquote class="testimonial-card reveal-in delay-4">
                <p class="testimonial-quote">
                    He takes ownership from requirement understanding to deployment and communicates clearly with both clients
                    and internal teams. His backend logic and implementation are practical, stable, and easy to work with.
                </p>
                <footer class="testimonial-meta">
                    <cite class="testimonial-role">Team Lead</cite>
                </footer>
            </blockquote>
        </div>
    </div>
</section>

<section id="contact" class="section contact-section">
    <div class="container">
        <span class="section-label reveal-in">Contact</span>
        <h2 class="section-title reveal-in delay-1">Let’s build something valuable together</h2>
        <p class="contact-subtitle reveal-in delay-2">
            Looking for a developer to build backend systems, APIs, admin panels, or business logic-driven platforms?
            Let’s discuss your project.
        </p>

        <div class="contact-grid">
            <div class="contact-quick-links reveal-in delay-2">
                <a href="mailto:sunnysarif68@gmail.com" class="contact-link-card">
                    <span class="contact-link-icon"><i class="fa-solid fa-envelope"></i></span>
                    <span>
                        <strong>Email</strong>
                        <span>sunnysarif68@gmail.com</span>
                    </span>
                </a>

                <a href="https://wa.me/919002160272" target="_blank" rel="noopener" class="contact-link-card">
                    <span class="contact-link-icon"><i class="fa-brands fa-whatsapp"></i></span>
                    <span>
                        <strong>WhatsApp</strong>
                        <span>Direct message for quick discussion</span>
                    </span>
                </a>

                <a href="https://www.linkedin.com/in/nawaj-sharif-16634a1b1/" target="_blank" rel="noopener" class="contact-link-card">
                    <span class="contact-link-icon"><i class="fa-brands fa-linkedin-in"></i></span>
                    <span>
                        <strong>LinkedIn</strong>
                        <span>Connect professionally and view profile</span>
                    </span>
                </a>

                <a href="https://github.com/nawajtech" target="_blank" rel="noopener" class="contact-link-card">
                    <span class="contact-link-icon"><i class="fa-brands fa-github"></i></span>
                    <span>
                        <strong>GitHub</strong>
                        <span>Explore code, projects, and development work</span>
                    </span>
                </a>
            </div>

            <div class="contact-form-card reveal-in delay-3">
                @if(session('success'))
                    <div class="form-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="form-errors">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                    @csrf

                    <div class="contact-field">
                        <label for="contact-name">Your Name</label>
                        <input id="contact-name" type="text" name="name" placeholder="e.g. John Doe" value="{{ old('name') }}" required autocomplete="name">
                    </div>

                    <div class="contact-field">
                        <label for="contact-email">Email Address</label>
                        <input id="contact-email" type="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" required autocomplete="email">
                    </div>

                    <div class="contact-field">
                        <label for="contact-subject">Subject</label>
                        <input id="contact-subject" type="text" name="subject" placeholder="Tell me about your project" value="{{ old('subject') }}" required>
                    </div>

                    <div class="contact-field">
                        <label for="contact-message">Message</label>
                        <textarea id="contact-message" name="message" rows="6" placeholder="Share your project idea, requirement, or business need..." required>{{ old('message') }}</textarea>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-paper-plane"></i> Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</main>

<footer role="contentinfo" class="site-footer">
    <p class="footer-tagline">Designed & built by Nawaj Sharif</p>

    <div class="footer-socials">
        <a href="https://wa.me/919002160272" target="_blank" rel="noopener" aria-label="WhatsApp" title="WhatsApp">
            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
        </a>
        <a href="https://www.linkedin.com/in/nawaj-sharif-16634a1b1/" target="_blank" rel="noopener" aria-label="LinkedIn" title="LinkedIn">
            <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
        </a>
        <a href="https://github.com/nawajtech" target="_blank" rel="noopener" aria-label="GitHub" title="GitHub">
            <i class="fa-brands fa-github" aria-hidden="true"></i>
        </a>
        <a href="mailto:sunnysarif68@gmail.com" aria-label="Email" title="Email">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        </a>
        <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram" title="Instagram">
            <i class="fa-brands fa-instagram" aria-hidden="true"></i>
        </a>
    </div>

    <p class="footer-copy">© 2026 Nawaj Sharif | Backend Developer</p>
</footer>

<script>
    const mainContent = document.getElementById('main-content');
    document.querySelector('.skip-link')?.addEventListener('click', () => {
        window.setTimeout(() => mainContent?.focus({ preventScroll: true }), 0);
    });

    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');

    const setMenuOpen = (open) => {
        if (!navMenu || !navToggle) return;
        navMenu.classList.toggle('open', open);
        navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        navToggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
    };

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', () => {
            setMenuOpen(!navMenu.classList.contains('open'));
        });

        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => setMenuOpen(false));
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && navMenu.classList.contains('open')) {
                setMenuOpen(false);
                navToggle.focus();
            }
        });

        document.addEventListener('click', (e) => {
            if (!navMenu.classList.contains('open')) return;
            const inner = navToggle.closest('.nav-inner');
            if (inner && !inner.contains(e.target)) {
                setMenuOpen(false);
            }
        });
    }

    const revealItems = document.querySelectorAll('.reveal-in');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, { threshold: 0.12 });

    revealItems.forEach(item => observer.observe(item));

    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-links a');

    const activateNavLink = () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 140;
            const sectionHeight = section.offsetHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            link.removeAttribute('aria-current');
            if (link.getAttribute('href') === '#' + current) {
                link.classList.add('active');
                link.setAttribute('aria-current', 'page');
            }
        });
    };

    window.addEventListener('scroll', activateNavLink);
    activateNavLink();
</script>
@endsection