@extends('layouts.layout')

@section('header')
    <nav class="nav-bar">
        <div class="header-logo">
            <img src="{{ asset('assets/images/aria-kcs_logo.jpg') }}" alt="Logo" />
        </div>
        <div class="nav-div desktop">
            <li class="menu-icon">
                <a class="menu-btn"><i class="fa-solid fa-bars"></i></a>
            </li>
            <ul class="nav-list">
                <li class="nav-links">
                    <a href="#"> Home</a>
                </li>
                <li class="nav-links">
                    <a href="#about"> About</a>
                </li>
                <li class="nav-links">
                    <a href="#product"> Products</a>
                </li>
                <li class="nav-links">
                    <a href="#contact"> Contact</a>
                </li>
                <li class="nav-links">
                    <a href="{{route('admin')}}">Admin</a>
                </li>
            </ul>
        </div>

        <div class="side-bar mobile">
            <ul class="nav-list">
                <li class="close-sidebar">
                    <a class="closeBtn"><i class="fa-solid fa-xmark"></i></a>
                </li>
                <li class="nav-link">
                    <a href="#" onclick="autoClose()">
                        <i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-link">
                    <a href="#about" onclick="autoClose()"><i class="fas fa-info"></i> About</a>
                </li>
                <li class="nav-link">
                    <a href="#product" onclick="autoClose()"><i class="fab fa-product-hunt"></i> Products
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#contact" onclick="autoClose()"><i class="fas fa-headset"></i> Contact</a>
                </li>
                <li class="nav-link">
                    <a href="{{route('admin')}}"><i class="fa-solid fa-user-shield"></i> Admin</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection()

@section('main')
    <section class="carousel">
        <div class="carousel-item selected">
            <img src="{{ asset('assets/carousel_images/case.jpeg') }}" alt="case-image" />
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/carousel_images/gaming-keyboard-mouse.jpeg') }}" alt="gaming-keyboard-and-mouse" />

        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/carousel_images/laptop-gaming.jpeg') }}" alt="laptop-gaming" />

        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/carousel_images/screen-image.jpeg') }}" alt="screen-image" />

        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/carousel_images/setup.jpeg') }}" alt="great-gaming-setup" />
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/carousel_images/surface-image.jpeg') }}" alt="surface-laptop-image" />
        </div>

        <div class="carousel-nav">
            <button class="carousel-button selected"></button>
            <button class="carousel-button"></button>
            <button class="carousel-button"></button>
            <button class="carousel-button"></button>
            <button class="carousel-button"></button>
            <button class="carousel-button"></button>
        </div>

        <div class="thumb-nails">
            <div class="thumb-nail-item selected">
                <img src="{{ asset('assets/carousel_images/case.jpeg') }}" alt="case-image" />
            </div>
            <div class="thumb-nail-item">
                <img src="{{ asset('assets/carousel_images/gaming-keyboard-mouse.jpeg') }}"
                    alt="gaming-keyboard-and-mouse" />
            </div>
            <div class="thumb-nail-item">
                <img src="{{ asset('assets/carousel_images/laptop-gaming.jpeg') }}" alt="laptop-gaming" />
            </div>
            <div class="thumb-nail-item">
                <img src="{{ asset('assets/carousel_images/screen-image.jpeg') }}" alt="screen-image" />
            </div>
            <div class="thumb-nail-item">
                <img src="{{ asset('assets/carousel_images/setup.jpeg') }}" alt="great-gaming-setup" />
            </div>
            <div class="thumb-nail-item">
                <img src="{{ asset('assets/carousel_images/surface-image.jpeg') }}" alt="surface-laptop-image" />
            </div>
        </div>

        <div class="switch-btns">
            <button class="switch-btn left">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="switch-btn right">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>

    <div class="about-us" id="about">
        <div class="about-text">
            <h3>About Us</h3>
        </div>
        <div class="about-container">
            <div class="about-info">
                <h4>Welcome to Komail Computer Shop</h4>
                <p>
                    At Komail Computer Shop, we are passionate about providing the
                    best technology solutions for our customers. Whether you are a
                    gamer, a professional, or someone looking for reliable tech
                    products, we have something for everyone. Our mission is to
                    deliver high-quality products and exceptional customer service to
                    meet your needs. From the latest gaming setups to essential
                    computer accessories, we ensure that every product in our store
                    meets the highest standards of quality and performance. Visit us
                    to explore a wide range of products tailored to enhance your tech
                    experience.
                </p>
                <a href="#">Learn More</a>
            </div>
            <div class="logo-social">
                <div class="social-media">
                    <h4>Follow us on <span>youtube</span></h4>
                    <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i>Aria Tech</a>
                </div>
                <div class="you-tube">
                    <iframe width="100%" height="100%"
                        src="https://www.youtube.com/embed/fsb3kWZKOa8?si=Hu4GCVnYm6_-ABk3" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>


    <section class="product-section" id="product">
        <div class="title">
            <h3>Our Products</h3>
        </div>

        <div class="filter-nav">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="peripheral">
                peripheral device
            </button>
            <button class="filter-btn" data-filter="system">
                systems
            </button>
            <button class="filter-btn" data-filter="hardware">
                Internal hardwares
            </button>
            <button class="filter-btn" data-filter="software">
                Game and softwares
            </button>
        </div>
        <div class="product-menu">
            @php
                // Load products from database; fall back to static examples when none exist
                $dbProducts = \App\Models\Product::all();
            @endphp

            @forelse ($dbProducts as $product)
                <article class="card" data-category="{{ $product->category ?? 'peripheral' }}">
                    <div class="card-image">
                        @if ($product->image_url)
                            <img src="{{ asset('assets/images/products/' . $product->image_url) }}" alt="{{ $product->name }}" />
                        @else
                            <img src="{{ asset('assets/images/products/rgb-keyboard.jpeg') }}" alt="{{ $product->name }}" />
                        @endif
                    </div>

                    <div class="card-title">
                        <h5>{{ $product->name }}</h5>
                    </div>

                    <div class="card-description">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="price-btn">
                        <span class="price">price : {{ $product->price }}$</span>
                    </div>
                </article>
            @empty
                {{-- Original static sample products as fallback when database is empty --}}
                <article class="card" data-category="peripheral">
                    <div class="card-image">
                        <img src="{{ asset('assets/images/products/rgb-keyboard.jpeg') }}" alt="" />
                    </div>

                    <div class="card-title">
                        <h5>RGB Keyboard</h5>
                    </div>

                    <div class="card-description">
                        <p>RGB gaming keyboard for pro gamers</p>
                    </div>
                    <div class="price-btn">
                        <span class="price">price : 48$</span>
                        <span class="off-price">5%off</span>
                    </div>
                </article>

                <article class="card" data-category="peripheral">
                    <div class="card-image">
                        <img src="{{ asset('assets/images/products/ps5-joystick.jpeg') }}" alt="" />
                    </div>

                    <div class="card-title">
                        <h5>PS 5 Joystick</h5>
                    </div>

                    <div class="card-description">
                        <p>Original PS 5 joystick new and unboxed</p>
                    </div>
                    <div class="price-btn">
                        <span class="price"> 50$</span>
                        <span class="off-price">5%off</span>
                    </div>
                </article>

                <article class="card" data-category="peripheral">
                    <div class="card-image">
                        <img src="{{ asset('assets/images/products/Gamin-monitore.webp') }}" alt="" />
                    </div>

                    <div class="card-title">
                        <h5>Gaming Monitor</h5>
                    </div>

                    <div class="card-description">
                        <p>Gaming Monitors in different size and resolution</p>
                    </div>
                    <div class="price-btn">
                        <span class="price"> 50$</span>
                        <span class="off-price">5%off</span>
                    </div>
                </article>
            @endforelse
        </div>
    </section>


    <section class="contact-section" id="contact">
        <div class="contact-title">
            <h3>Contact Us</h3>
            <p>
                If you have any questions or need further information, please feel
                free to contact us.
            </p>
        </div>

        <div class="contact-info">
            <div class="info-list email">
                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                <span class="title">Email us</span>

                <a href="mailto:info@example.com"> info@example.com</a>
            </div>
            <div class="info-list phone">
                <span class="icon">
                    <i class="fa-solid fa-phone"></i>
                </span>
                <span class="title">Call us</span>

                <a href="tel:+93 700 000 000"> +93 700 000 000</a>
            </div>

            <div class="info-list address">
                <span class="icon">
                    <i class="fa-solid fa-location-dot"></i>
                </span>
                <span class="title">Our address</span>
                <address class="contact-address">Kabul, Afghanistan</address>
            </div>
        </div>

        <div class="contact-form">
            <div class="contact-header">
                <h4><i class="fas fa-paper-plane"></i> Send us message</h4>
                <p>Have a question? Send us a message and we’ll respond shortly.</p>
            </div>

            <div class="form-body">
                <form id="contactForm" action="#" method="post" novalidate>
                    <div class="form-element">
                        <label for="name">First Name</label>
                        <input type="text" name="user-name" id="name" placeholder="Your first name" required />
                    </div>

                    <div class="form-element">
                        <label for="email">Email</label>
                        <input type="email" name="user-email" id="email" placeholder="you@example.com" required />
                    </div>

                    <div class="form-element">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" placeholder="Subject (optional)" />
                    </div>

                    <div class="form-element">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="6" placeholder="Write your message..." required></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn submit">Send Message</button>
                        <button type="reset" class="btn reset">Reset</button>
                    </div>

                    <p class="form-feedback" aria-live="polite"></p>
                </form>
            </div>
        </div>
    </section>
@endsection()

@section('footer')
    <div class="footer-container">
        <div class="footer-about">
            <h4>About Us</h4>
            <p>
                Komail Computer Shop is dedicated to providing top-notch technology
                solutions for all your needs. From gaming setups to professional
                accessories, we have it all.
            </p>
        </div>

        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>

        <div class="footer-social">
            <h4>Follow Us</h4>
            <a href="https://instagram.com" target="_blank">
                <i class="fa-brands fa-instagram"></i>
                Instagram</a>
            <a href="https://facebook.com" target="_blank">
                <i class="fa-brands fa-facebook"></i>
                Facebook</a>
            <a href="https://tiktok.com" target="_blank">
                <i class="fa-brands fa-tiktok"></i>
                Tiktok</a>
        </div>
    </div>


    <div class="footer-bottom">
        <p>&copy; 2026 Komail Computer Shop. All rights reserved.</p>
    </div>
@endsection()
