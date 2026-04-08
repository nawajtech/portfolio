<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nawaj Sharif - Senior Software Developer. Building scalable web applications and APIs.">
    <title>@yield('title', 'Nawaj Sharif | Senior Software Developer')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @unless(request()->routeIs('home'))
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:Arial, Helvetica, sans-serif}
        body{background:#0f172a;color:#e5e7eb;line-height:1.6}
        nav,.nav-header{display:flex;justify-content:space-between;align-items:center;padding:20px 8%;background:#020617;position:sticky;top:0;z-index:50;border-bottom:1px solid rgba(99,102,241,0.1)}
        nav h2{color:#6366f1}
        nav a{text-decoration:none;color:#e5e7eb;font-size:15px}
        nav a:hover{color:#6366f1}
        .nav-logo{flex-shrink:0}
        .nav-logo-link{display:inline-flex;align-items:center;justify-content:center;text-decoration:none;color:#6366f1;font-weight:700;transition:opacity .25s ease,transform .25s ease}
        .nav-logo-link:hover{color:#818cf8;opacity:0.95;transform:scale(1.02)}
        .nav-logo-text{font-size:1.5rem;letter-spacing:0.05em}
        .nav-logo-img{display:block;border-radius:8px;object-fit:cover}
        .nav-links{display:flex;gap:25px;list-style:none}
        .hero{height:90vh;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;padding:20px;background:linear-gradient(rgba(2,6,23,.9),rgba(2,6,23,.9)),url('https://images.unsplash.com/photo-1498050108023-c5249f4df085');background-size:cover;background-position:center}
        .hero h1{font-size:60px;margin-bottom:10px}
        .hero span{color:#6366f1}
        .hero p{margin:15px 0 30px;color:#cbd5f5}
        .hero-btns{display:flex;gap:15px;flex-wrap:wrap;justify-content:center}
        .btn{padding:12px 28px;border-radius:25px;border:none;cursor:pointer;font-size:14px;text-decoration:none;display:inline-block}
        .btn-primary{background:#6366f1;color:white}
        .btn-primary:hover{background:#5558e3}
        .btn-outline{border:1px solid #6366f1;background:transparent;color:#6366f1}
        .btn-outline:hover{background:rgba(99,102,241,.1)}
        section{padding:80px 10%}
        .section-title{text-align:center;font-size:32px;margin-bottom:12px}
        .section-intro{text-align:center;color:#94a3b8;font-size:0.9375rem;max-width:560px;margin:0 auto 2rem;line-height:1.5}
        .about-content{max-width:800px;margin:0 auto;text-align:center}
        .about-p{margin-bottom:1rem}
        .about-p:last-of-type{margin-bottom:1.5rem}
        .about-vision{margin-top:1.5rem;padding:1.25rem 1.5rem;text-align:left;max-width:520px;margin-left:auto;margin-right:auto;border-left:3px solid #6366f1;background:rgba(99,102,241,0.06);border-radius:0 10px 10px 0}
        .about-vision-line{margin-bottom:0.5rem;font-size:0.9375rem;color:#cbd5e1;line-height:1.5}
        .about-vision-last{margin-bottom:0}
        /* Experience section */
        .experience-wrap{display:grid;grid-template-columns:1fr;gap:1.5rem;max-width:900px;margin:0 auto}
        @media (min-width:640px){.experience-wrap{grid-template-columns:repeat(2,1fr)}}
        @media (min-width:900px){.experience-wrap{grid-template-columns:repeat(3,1fr);gap:1.75rem}}
        .experience-card{background:rgba(30,41,59,0.7);backdrop-filter:blur(12px);border:1px solid rgba(99,102,241,0.2);border-radius:16px;padding:1.5rem;box-shadow:0 4px 24px rgba(0,0,0,0.2),inset 0 1px 0 rgba(255,255,255,0.04);transition:transform .3s ease,border-color .3s ease,box-shadow .3s ease}
        .experience-card:hover{transform:translateY(-4px);border-color:rgba(99,102,241,0.35);box-shadow:0 12px 32px rgba(99,102,241,0.1)}
        .experience-card-featured{border-color:rgba(99,102,241,0.3);background:rgba(30,41,59,0.85)}
        .experience-icon{display:flex;align-items:center;justify-content:center;width:48px;height:48px;border-radius:12px;background:linear-gradient(135deg,rgba(99,102,241,0.25),rgba(168,85,247,0.2));color:#6366f1;font-size:1.25rem;margin-bottom:1rem}
        .experience-company{font-size:1.0625rem;font-weight:700;color:#f1f5f9;margin-bottom:0.5rem;line-height:1.3}
        .experience-desc{font-size:0.875rem;color:#94a3b8;line-height:1.5;margin-bottom:0}
        .experience-badge{display:inline-flex;align-items:center;gap:0.5rem;margin-top:1rem;padding:0.5rem 0.75rem;background:rgba(234,179,8,0.15);border:1px solid rgba(234,179,8,0.35);border-radius:8px;color:#fde047;font-size:0.8125rem;font-weight:600}
        .experience-badge i{font-size:0.875rem}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:25px}
        .card{background:#1e293b;padding:25px;border-radius:10px;transition:.3s}
        .card:hover{transform:translateY(-8px)}
        /* Projects section - clickable cards */
        .projects-grid{display:grid;grid-template-columns:1fr;gap:1.5rem;max-width:1280px;margin:0 auto}
        @media (min-width:640px){.projects-grid{grid-template-columns:repeat(2,1fr)}}
        @media (min-width:1024px){.projects-grid{grid-template-columns:repeat(3,1fr);gap:1.75rem}}
        @media (min-width:1280px){.projects-grid{grid-template-columns:repeat(4,1fr);gap:2rem}}
        .project-card{display:block;text-decoration:none;color:inherit;background:rgba(30,41,59,0.7);backdrop-filter:blur(10px);border:1px solid rgba(99,102,241,0.2);border-radius:16px;padding:1.5rem;box-shadow:0 4px 24px rgba(0,0,0,0.2),inset 0 1px 0 rgba(255,255,255,0.04);transition:transform .35s ease,box-shadow .35s ease,border-color .35s ease;cursor:pointer}
        .project-card:hover{transform:translateY(-8px);border-color:rgba(99,102,241,0.45);box-shadow:0 16px 48px rgba(99,102,241,0.12),0 0 32px rgba(168,85,247,0.08)}
        .project-card:focus{outline:2px solid #6366f1;outline-offset:2px}
        .project-card-icon{display:flex;align-items:center;justify-content:center;width:56px;height:56px;border-radius:14px;background:linear-gradient(135deg,rgba(99,102,241,0.25),rgba(168,85,247,0.2));color:#6366f1;font-size:1.5rem;margin-bottom:1rem;transition:transform .3s ease}
        .project-card:hover .project-card-icon{transform:scale(1.08)}
        .project-card-title{font-size:1.2rem;font-weight:700;margin-bottom:0.5rem;color:#f1f5f9}
        .project-card-desc{font-size:0.9rem;color:#94a3b8;line-height:1.5;margin-bottom:1rem}
        .project-card-stack{font-size:0.75rem;color:#64748b;margin-bottom:1rem;line-height:1.4}
        .project-card-btn{display:inline-flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;border-radius:9999px;background:linear-gradient(135deg,#6366f1,#7c3aed);color:#fff;font-size:0.875rem;font-weight:600;transition:opacity .3s,transform .3s;text-decoration:none}
        .project-card:hover .project-card-btn{opacity:1}
        .project-card-btn i{font-size:0.75rem}
        .project-card-actions{display:flex;flex-wrap:wrap;gap:0.5rem;margin-top:0.25rem}
        .project-card-btn-secondary{background:transparent;border:1px solid rgba(99,102,241,0.5);color:#a5b4fc}
        .project-card-btn-secondary:hover{background:rgba(99,102,241,0.15);color:#c7d2fe}
        .project-card-link-wrap{display:block;text-decoration:none;color:inherit}
        .project-card-link-wrap:focus{outline:2px solid #6366f1;outline-offset:2px}
        /* Testimonials section */
        .testimonials-wrap{display:grid;grid-template-columns:1fr;gap:1.5rem;max-width:1000px;margin:0 auto;align-items:stretch}
        @media (min-width:768px){.testimonials-wrap{grid-template-columns:repeat(3,1fr);gap:1.75rem}}
        .testimonial-card{margin:0;padding:1.5rem;background:rgba(30,41,59,0.7);backdrop-filter:blur(12px);border:1px solid rgba(99,102,241,0.2);border-radius:16px;box-shadow:0 4px 24px rgba(0,0,0,0.2),inset 0 1px 0 rgba(255,255,255,0.04);transition:transform .3s ease,border-color .3s ease,box-shadow .3s ease;display:flex;flex-direction:column}
        .testimonial-card:hover{border-color:rgba(99,102,241,0.35);box-shadow:0 12px 32px rgba(99,102,241,0.1)}
        .testimonial-quote{font-size:0.9375rem;color:#cbd5e1;line-height:1.6;margin:0 0 1rem;flex:1}
        .testimonial-meta{margin:0;padding-top:0.75rem;border-top:1px solid rgba(99,102,241,0.15);margin-top:auto}
        .testimonial-role{font-size:0.8125rem;font-weight:600;color:#6366f1;font-style:normal}
        /* Skills section - animated cards */
        .skills-wrap{max-width:1200px;margin:0 auto}
        .skills-category{margin-bottom:2rem}
        .skills-category:last-child{margin-bottom:0}
        .skills-category-title{font-size:1rem;font-weight:600;color:#94a3b8;margin-bottom:1rem;padding-left:2px;letter-spacing:0.05em;text-transform:uppercase}
        .skills-grid{display:grid;grid-template-columns:repeat(1,1fr);gap:1rem}
        @media (min-width:480px){.skills-grid{grid-template-columns:repeat(2,1fr)}}
        @media (min-width:768px){.skills-grid{grid-template-columns:repeat(3,1fr);gap:1.25rem}}
        @media (min-width:1024px){.skills-grid{grid-template-columns:repeat(4,1fr);gap:1.5rem}}
        .skill-card{display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:120px;padding:1.5rem 1rem;background:rgba(30,41,59,0.6);backdrop-filter:blur(12px);border:1px solid rgba(99,102,241,0.2);border-radius:16px;box-shadow:0 4px 24px rgba(0,0,0,0.2),inset 0 1px 0 rgba(255,255,255,0.05);transition:transform 0.3s ease,box-shadow 0.3s ease,border-color 0.3s ease}
        .skill-card:hover{transform:translateY(-6px);border-color:rgba(99,102,241,0.5);box-shadow:0 12px 40px rgba(99,102,241,0.15),0 0 30px rgba(168,85,247,0.1)}
        .skill-card-icon{font-size:2rem;margin-bottom:0.75rem;color:#6366f1;transition:transform 0.3s ease}
        .skill-card:hover .skill-card-icon{transform:scale(1.1)}
        .skill-card-name{font-size:0.9375rem;font-weight:600;color:#e5e7eb}
        .reveal-in.delay-5{transition-delay:.5s}
        .reveal-in.delay-6{transition-delay:.6s}
        .reveal-in.delay-7{transition-delay:.7s}
        /* Contact section - larger, card-based UI */
        .contact-section{padding:5rem 10%;padding-bottom:6rem}
        @media (min-width:768px){.contact-section{padding:6rem 10%;padding-bottom:7rem}}
        .contact-subtitle{text-align:center;max-width:520px;margin:0 auto 2.5rem;color:#94a3b8;font-size:1rem;line-height:1.6}
        @media (min-width:768px){.contact-subtitle{font-size:1.0625rem;margin-bottom:3rem}}
        .contact-wrapper{max-width:600px;margin:0 auto}
        .contact-form-card{background:rgba(30,41,59,0.7);backdrop-filter:blur(12px);border:1px solid rgba(99,102,241,0.2);border-radius:20px;padding:2rem;box-shadow:0 4px 24px rgba(0,0,0,0.2),inset 0 1px 0 rgba(255,255,255,0.04);transition:border-color .3s ease,box-shadow .3s ease}
        .contact-form-card:focus-within{border-color:rgba(99,102,241,0.45);box-shadow:0 0 24px rgba(99,102,241,0.12)}
        @media (min-width:640px){.contact-form-card{padding:2.5rem 2.75rem}}
        .contact-form{display:flex;flex-direction:column;gap:1.25rem}
        .contact-field label{display:block;margin-bottom:0.5rem;font-size:0.875rem;font-weight:600;color:#cbd5e1}
        .contact-field input,.contact-field textarea{width:100%;padding:0.875rem 1rem;border:1px solid rgba(99,102,241,0.25);border-radius:12px;background:rgba(15,23,42,0.8);color:#f1f5f9;font-size:1rem;line-height:1.5;transition:border-color .25s ease,box-shadow .25s ease}
        .contact-field input::placeholder,.contact-field textarea::placeholder{color:#64748b}
        .contact-field input:focus,.contact-field textarea:focus{border-color:#6366f1;box-shadow:0 0 0 3px rgba(99,102,241,0.25);outline:none}
        .contact-field-message textarea{min-height:140px;resize:vertical}
        .contact-submit-wrap{margin-top:0.5rem}
        .contact-submit-btn{width:100%;padding:0.875rem 1.5rem;font-size:1rem;font-weight:600;border-radius:12px}
        @media (min-width:480px){.contact-submit-btn{width:auto;min-width:180px}}
        .form-success{margin-bottom:1.25rem;padding:1rem 1.25rem;background:rgba(34,197,94,0.15);border:1px solid rgba(34,197,94,0.4);border-radius:12px;color:#86efac;font-size:0.9375rem}
        .form-errors{margin-bottom:1.25rem;padding:1rem 1.25rem;background:rgba(239,68,68,0.12);border:1px solid rgba(239,68,68,0.4);border-radius:12px;color:#fca5a5;font-size:0.9375rem}
        .form-errors ul{margin:0;padding-left:1.25rem;line-height:1.5}
        footer,.site-footer{text-align:center;padding:28px 20px;background:#020617;margin-top:40px;font-size:14px;color:#94a3b8;border-top:1px solid rgba(99,102,241,0.08)}
        .footer-tagline{margin-bottom:12px;font-size:0.8125rem;color:#64748b}
        .footer-socials{display:flex;justify-content:center;flex-wrap:wrap;gap:14px;margin-bottom:15px}
        .footer-socials a{display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:50%;background:#1e293b;color:#e5e7eb;transition:.3s;font-size:1.1rem}
        .footer-socials a:hover{color:#6366f1;transform:translateY(-3px)}
        .footer-socials a i{font-size:1.1rem}
        @keyframes slideFromTop{
            from{opacity:0;transform:translateY(-50px)}
            to{opacity:1;transform:translateY(0)}
        }
        @keyframes slideFromTopShort{
            from{opacity:0;transform:translateY(-30px)}
            to{opacity:1;transform:translateY(0)}
        }
        .hero-anim{opacity:0;animation:slideFromTop .8s ease-out forwards}
        .hero-anim-1{animation-delay:.15s}
        .hero-anim-2{animation-delay:.35s}
        .hero-anim-3{animation-delay:.5s}
        .hero-anim-4{animation-delay:.65s}
        .hero-anim-5{animation-delay:.85s}
        .hero-anim-6{animation-delay:1.05s}
        .reveal-in{opacity:0;transform:translateY(-40px);transition:opacity .7s ease-out,transform .7s ease-out}
        .reveal-in.visible{opacity:1;transform:translateY(0)}
        .reveal-in.delay-1{transition-delay:.1s}
        .reveal-in.delay-2{transition-delay:.2s}
        .reveal-in.delay-3{transition-delay:.3s}
        .reveal-in.delay-4{transition-delay:.4s}
        .btn{transition:transform .3s,background .3s,color .3s}
        .btn:hover{transform:translateY(-3px)}
        @media (max-width:768px){.nav-links{display:none}.hero h1{font-size:36px}}
    </style>
    @endunless
    @stack('styles')
</head>
<body>
    @yield('content')

    @unless(request()->routeIs('home'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash) {
                var target = document.querySelector(window.location.hash);
                if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
            var reveals = document.querySelectorAll('.reveal-in');
            function reveal() {
                reveals.forEach(function(el) {
                    var top = el.getBoundingClientRect().top;
                    if (top < window.innerHeight - 60) el.classList.add('visible');
                });
            }
            window.addEventListener('scroll', reveal);
            reveal();
        });
    </script>
    @endunless
    @stack('scripts')
</body>
</html>
