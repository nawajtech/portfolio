@extends('layouts.app')

@section('content')
<nav class="nav-header" role="banner">
    <div class="nav-logo">
        <a href="#home" class="nav-logo-link" aria-label="Nawaj Sharif - Home">
            @if(isset($logo) && $logo)
                <img src="{{ $logo }}" alt="Nawaj Sharif" class="nav-logo-img" width="40" height="40">
            @else
                <span class="nav-logo-text">NS</span>
            @endif
        </a>
    </div>
    <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#testimonials">Testimonials</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
</nav>

<section class="hero" id="home">
    <h1 class="hero-anim hero-anim-1">Nawaj <span>Sharif</span></h1>
    <h3 class="hero-anim hero-anim-2">Senior Software Developer</h3>
    <p class="hero-anim hero-anim-3">Building scalable web applications, APIs and modern backend systems.</p>
    <div class="hero-btns hero-anim hero-anim-4">
        <a href="#projects" class="btn btn-primary">View Projects</a>
        <a href="#contact" class="btn btn-outline">Contact Me</a>
    </div>
</section>

<section id="about">
    <h2 class="section-title reveal-in">About Me</h2>
    <p class="section-intro reveal-in delay-1">A bit about my background and what I do.</p>
    <div class="reveal-in delay-1 about-content">
        <p class="about-p">I am Nawaj Sharif, a Senior Software Developer with over 5 years of experience in building web applications, backend systems, and scalable APIs. I specialize in PHP, Laravel, and MySQL, focusing on developing efficient, reliable, and well-structured backend solutions.</p>
        <p class="about-p">Throughout my career, I have successfully designed and developed multiple projects independently, handling everything from requirement analysis and database design to backend development, API integration, and deployment. This experience has strengthened my ability to deliver complete solutions and solve complex technical challenges.</p>
        <p class="about-p">I am passionate about writing clean code, building scalable systems, and continuously learning modern technologies such as React, Python, FastAPI, and Docker to expand my development capabilities.</p>
        <p class="about-p">I believe in building software that not only works but adds real value to users and businesses. My goal is to grow as a full-stack and system-focused engineer, capable of designing high-performance, scalable, and future-ready applications.</p>
        <div class="about-vision">
            <p class="about-vision-line">I don’t just write code — I design solutions.</p>
            <p class="about-vision-line">I don’t just follow trends — I build for the future.</p>
            <p class="about-vision-line about-vision-last">My vision is to create impactful, scalable systems that solve real-world problems and make technology more meaningful.</p>
        </div>
    </div>
</section>

<section id="experience">
    <h2 class="section-title reveal-in">Experience</h2>
    <p class="section-intro reveal-in delay-1">Companies I’ve worked with and recognition.</p>
    <div class="experience-wrap reveal-in delay-1">
        <div class="experience-card">
            <span class="experience-icon" aria-hidden="true"><i class="fa-solid fa-building"></i></span>
            <h3 class="experience-company">Sundew</h3>
            <p class="experience-desc">Worked with Sundew on software development and delivery.</p>
        </div>
        <div class="experience-card">
            <span class="experience-icon" aria-hidden="true"><i class="fa-solid fa-building"></i></span>
            <h3 class="experience-company">Notebrains</h3>
            <p class="experience-desc">Single-handed project delivery, client handling, client demos, and end-to-end solutions at Notebrains.</p>
        </div>
        <div class="experience-card experience-card-featured">
            <span class="experience-icon" aria-hidden="true"><i class="fa-solid fa-building"></i></span>
            <h3 class="experience-company">Coactive IT Solutions Pvt Ltd (SAP Partner)</h3>
            <p class="experience-desc">Delivering enterprise solutions and technical excellence. Team handling, team management, and client meetings.</p>
            <div class="experience-badge">
                <i class="fa-solid fa-trophy" aria-hidden="true"></i>
                <span>Best Employee of the Year 2025</span>
            </div>
        </div>
    </div>
</section>

<section id="skills">
    <h2 class="section-title reveal-in">Skills</h2>
    <p class="section-intro reveal-in delay-1">Technologies and tools I work with.</p>
    <div class="skills-wrap reveal-in delay-1">
        <div class="skills-category">
            <h3 class="skills-category-title reveal-in delay-2">Backend</h3>
            <div class="skills-grid">
                <div class="skill-card reveal-in delay-2"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-php"></i></span><span class="skill-card-name">PHP</span></div>
                <div class="skill-card reveal-in delay-3"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-laravel"></i></span><span class="skill-card-name">Laravel</span></div>
                <div class="skill-card reveal-in delay-4"><span class="skill-card-icon" aria-hidden="true"><i class="fa-solid fa-plug"></i></span><span class="skill-card-name">REST API</span></div>
                <div class="skill-card reveal-in delay-4"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-python"></i></span><span class="skill-card-name">Python</span></div>
                <div class="skill-card reveal-in delay-5"><span class="skill-card-icon" aria-hidden="true"><i class="fa-solid fa-bolt"></i></span><span class="skill-card-name">FastAPI</span></div>
                <div class="skill-card reveal-in delay-5"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-node-js"></i></span><span class="skill-card-name">Node.js</span></div>
            </div>
        </div>
        <div class="skills-category">
            <h3 class="skills-category-title reveal-in delay-3">Frontend</h3>
            <div class="skills-grid">
                <div class="skill-card reveal-in delay-3"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-html5"></i></span><span class="skill-card-name">HTML</span></div>
                <div class="skill-card reveal-in delay-4"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-css3-alt"></i></span><span class="skill-card-name">CSS</span></div>
                <div class="skill-card reveal-in delay-5"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-js"></i></span><span class="skill-card-name">JavaScript</span></div>
                <div class="skill-card reveal-in delay-5"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-react"></i></span><span class="skill-card-name">React</span></div>
                <div class="skill-card reveal-in delay-6"><span class="skill-card-icon" aria-hidden="true"><i class="fa-solid fa-forward"></i></span><span class="skill-card-name">Next.js</span></div>
            </div>
        </div>
        <div class="skills-category">
            <h3 class="skills-category-title reveal-in delay-4">Database</h3>
            <div class="skills-grid">
                <div class="skill-card reveal-in delay-4"><span class="skill-card-icon" aria-hidden="true"><i class="fa-solid fa-database"></i></span><span class="skill-card-name">MySQL</span></div>
                <div class="skill-card reveal-in delay-5"><span class="skill-card-icon" aria-hidden="true"><i class="fa-solid fa-database"></i></span><span class="skill-card-name">PostgreSQL</span></div>
                <div class="skill-card reveal-in delay-5"><span class="skill-card-icon" aria-hidden="true"><i class="fa-solid fa-leaf"></i></span><span class="skill-card-name">MongoDB</span></div>
            </div>
        </div>
        <div class="skills-category">
            <h3 class="skills-category-title reveal-in delay-5">DevOps</h3>
            <div class="skills-grid">
                <div class="skill-card reveal-in delay-5"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-docker"></i></span><span class="skill-card-name">Docker</span></div>
                <div class="skill-card reveal-in delay-6"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-linux"></i></span><span class="skill-card-name">Linux</span></div>
                <div class="skill-card reveal-in delay-6"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-git-alt"></i></span><span class="skill-card-name">Git</span></div>
                <div class="skill-card reveal-in delay-6"><span class="skill-card-icon" aria-hidden="true"><i class="fa-brands fa-aws"></i></span><span class="skill-card-name">Amazon AWS</span></div>
            </div>
        </div>
    </div>
</section>

<section id="projects">
    <h2 class="section-title reveal-in">Projects</h2>
    <p class="section-intro reveal-in delay-1">A selection of projects I’ve built or contributed to.</p>
    <div class="projects-grid">
        <div class="project-card reveal-in delay-1" role="button" tabindex="0" onclick="window.open('https://laundryking.co.in/','_blank')" onkeydown="if(event.key==='Enter')window.open('https://laundryking.co.in/','_blank')" aria-label="Open LaundryKing project">
            <span class="project-card-icon" aria-hidden="true"><i class="fa-solid fa-shirt"></i></span>
            <h3 class="project-card-title">LaundryKing</h3>
            <p class="project-card-desc">Built the admin panel and backend system for LaundryKing platform and supported mobile application functionality.</p>
            <div class="project-card-actions">
                <a href="https://laundryking.co.in/" target="_blank" rel="noopener noreferrer" class="project-card-btn" onclick="event.stopPropagation()">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                <a href="https://play.google.com/store/apps/details?id=com.laundryking.customer&hl=en" target="_blank" rel="noopener noreferrer" class="project-card-btn project-card-btn-secondary" onclick="event.stopPropagation()">Get the App <i class="fa-brands fa-google-play"></i></a>
            </div>
        </div>
        <a href="https://publishergrowth.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-2" aria-label="Open PublishersGrowth project">
            <span class="project-card-icon" aria-hidden="true"><i class="fa-solid fa-newspaper"></i></span>
            <h3 class="project-card-title">PublishersGrowth</h3>
            <p class="project-card-desc">Digital publishing and ad technology platform.</p>
            <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        </a>
        <a href="https://boho6cur.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-3" aria-label="Open Boho6 project">
            <span class="project-card-icon" aria-hidden="true"><i class="fa-solid fa-bag-shopping"></i></span>
            <h3 class="project-card-title">Boho6</h3>
            <p class="project-card-desc">E-commerce fashion platform for modern apparel.</p>
            <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        </a>
        <a href="https://dev.travclicks.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-3" aria-label="Open TravClicks project">
            <span class="project-card-icon" aria-hidden="true"><i class="fa-solid fa-plane"></i></span>
            <h3 class="project-card-title">TravClicks</h3>
            <p class="project-card-desc">Travel booking and management platform.</p>
            <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        </a>
        <a href="https://educorium.notebrains.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-4" aria-label="Open Educorium project">
            <span class="project-card-icon" aria-hidden="true"><i class="fa-solid fa-graduation-cap"></i></span>
            <h3 class="project-card-title">Educorium</h3>
            <p class="project-card-desc">Online education and course management platform.</p>
            <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        </a>
        <a href="https://glenresidency.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-4" aria-label="Open Glen Residency project">
            <span class="project-card-icon" aria-hidden="true"><i class="fa-solid fa-hotel"></i></span>
            <h3 class="project-card-title">Glen Residency</h3>
            <p class="project-card-desc">Luxury residency and hotel in Chinchinim, South Goa—rooms, restaurant & bar, pool, and travel services.</p>
            <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        </a>
        <a href="https://cur-vip.com/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-4" aria-label="Open Cur VIP project">
            <span class="project-card-icon" aria-hidden="true"><i class="fa-solid fa-ticket"></i></span>
            <h3 class="project-card-title">Cur VIP</h3>
            <p class="project-card-desc">VIP Curacao—exclusive discounts and deals across the island for dining, retail, and experiences.</p>
            <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        </a>
        <a href="https://rubista.in/" target="_blank" rel="noopener noreferrer" class="project-card reveal-in delay-4" aria-label="Open Rubista project">
            <span class="project-card-icon" aria-hidden="true"><i class="fa-solid fa-globe"></i></span>
            <h3 class="project-card-title">Rubista</h3>
            <p class="project-card-desc">Web platform and digital solutions at rubista.in.</p>
            <span class="project-card-btn">Open Project <i class="fa-solid fa-arrow-up-right-from-square"></i></span>
        </a>
    </div>
</section>

<section id="testimonials">
    <h2 class="section-title reveal-in">Testimonials</h2>
    <p class="section-intro reveal-in delay-1">What clients and colleagues say about working with me.</p>
    <div class="testimonials-wrap reveal-in delay-1">
        <blockquote class="testimonial-card">
            <p class="testimonial-quote">Deep appreciation for your dedication to Publishergrowth.com. You addressed major changes promptly and played an instrumental role in the platform’s overhaul—your work has made a lasting impact. Wishing you every success; upwards and onwards!</p>
            <footer class="testimonial-meta">
                <cite class="testimonial-role">Abhishek Dey · Client (PublishersGrowth)</cite>
            </footer>
        </blockquote>
        <blockquote class="testimonial-card">
            <p class="testimonial-quote">Nawaj delivered our Rubista platform on time and with a clear, easy-to-use backend. The site is fast, reliable, and his support during and after launch was excellent. We’re very happy with the outcome and would recommend working with him.</p>
            <footer class="testimonial-meta">
                <cite class="testimonial-role">Tanbir Ikbal · Client (Rubista)</cite>
            </footer>
        </blockquote>
        <blockquote class="testimonial-card">
            <p class="testimonial-quote">He owns the full flow from requirements to deployment and communicates clearly with stakeholders. The APIs he built are stable in production and easy for the frontend team to integrate.</p>
            <footer class="testimonial-meta">
                <cite class="testimonial-role">Team Lead</cite>
            </footer>
        </blockquote>
    </div>
</section>

<section id="contact" class="contact-section">
    <h2 class="section-title reveal-in">Contact Me</h2>
    <p class="contact-subtitle reveal-in delay-1">Have a project in mind or want to work together? Drop a message and I’ll get back to you.</p>
    <div class="contact-wrapper reveal-in delay-1">
        @if(session('success'))
        <div class="form-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
        <div class="form-errors">
            <ul>
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
        @endif
        <div class="contact-form-card">
            <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                @csrf
                <div class="contact-field">
                    <label for="contact-name">Your Name</label>
                    <input id="contact-name" type="text" name="name" placeholder="e.g. John Doe" value="{{ old('name') }}" required autocomplete="name">
                </div>
                <div class="contact-field">
                    <label for="contact-email">Email</label>
                    <input id="contact-email" type="email" name="email" placeholder="john@example.com" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="contact-field">
                    <label for="contact-subject">Subject</label>
                    <input id="contact-subject" type="text" name="subject" placeholder="What’s this about?" value="{{ old('subject') }}" required>
                </div>
                <div class="contact-field contact-field-message">
                    <label for="contact-message">Message</label>
                    <textarea id="contact-message" name="message" rows="6" placeholder="Tell me about your project or question…" required>{{ old('message') }}</textarea>
                </div>
                <div class="contact-submit-wrap">
                    <button class="btn btn-primary contact-submit-btn" type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>

<footer role="contentinfo" class="site-footer">
    <p class="footer-tagline">Designed & built by Nawaj Sharif</p>
    
    <div class="footer-socials">
        <a href="https://wa.me/919002160272" target="_blank" rel="noopener" aria-label="WhatsApp" title="WhatsApp">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        </a>
        <a href="https://facebook.com/nawaj.sharif.677045" target="_blank" rel="noopener" aria-label="Facebook" title="Facebook">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </a>
        <a href="https://www.linkedin.com/in/nawaj-sharif-16634a1b1/" target="_blank" rel="noopener" aria-label="LinkedIn" title="LinkedIn">
            <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
        </a>
        <a href="https://github.com/nawajtech" target="_blank" rel="noopener" aria-label="GitHub" title="GitHub">
            <i class="fa-brands fa-github" aria-hidden="true"></i>
        </a>
        <a href="mailto:sunnysarif68@gmail.com" aria-label="Email (Gmail)" title="Gmail: sunnysarif68@gmail.com">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        </a>
        <a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram" title="Instagram">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
    </div>
    <p class="footer-copy">© 2026 Nawaj Sharif | Senior Software Developer</p>
</footer>
@endsection
