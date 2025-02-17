<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeleMines - Premium Mining Products</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <script src="../JS/main.js" defer></script>
    <style>
        /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

/* Hero Banner Section */
.hero-banner {
    position: relative;
    width: 100%;
    height: 100vh;
    background-image: url('../assets/images/hero-banner.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background 1s ease-in-out;
}

.hero-banner:hover {
    background-image: url('../assets/images/hero-banner-hover.jpg');
}

.hero-text {
    text-align: center;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

.hero-text h1 {
    font-size: 4rem;
    margin-bottom: 20px;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-weight: bold;
}

.hero-text p {
    font-size: 1.8rem;
    margin-bottom: 30px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

.cta-button {
    background-color: #1abc9c;
    color: #fff;
    padding: 15px 30px;
    font-size: 1.2rem;
    text-transform: uppercase;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    display: inline-block;
}

.cta-button:hover {
    background-color: #16a085;
    transform: scale(1.05);
}

/* Premium Mines Section */
.premium-mines {
    padding: 60px 20px;
    text-align: center;
    background-color: #ebf1f2;
}

.premium-mines h2 {
    font-size: 3rem;
    margin-bottom: 50px;
    color: #333;
    text-transform: uppercase;
}

.premium-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    justify-items: center;
}

.premium-card {
    background-color: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 320px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
}

.premium-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
}

.premium-card img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    margin-bottom: 20px;
    transition: transform 0.3s ease;
}

.premium-card:hover img {
    transform: scale(1.1);
}

.premium-card h3 {
    font-size: 2rem;
    margin-bottom: 15px;
}

.premium-card p {
    font-size: 1.1rem;
    color: #777;
    margin-bottom: 20px;
}

.premium-card .price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #e74c3c;
    margin-bottom: 20px;
}

.premium-card .cta-button {
    background-color: #1abc9c;
    color: #fff;
    padding: 12px 30px;
    text-decoration: none;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: uppercase;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.premium-card .cta-button:hover {
    background-color: #16a085;
}

/* Inspirational Quotes Section */
.inspirational-quotes {
    padding: 60px 20px;
    background-color: #fff;
    text-align: center;
}

.inspirational-quotes h2 {
    font-size: 3rem;
    margin-bottom: 50px;
    color: #333;
    text-transform: uppercase;
}

.quote-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    justify-items: center;
}

.quote-card {
    background-color: #f5f5f5;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 350px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.quote-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
}

.quote-card .quote {
    font-size: 1.6rem;
    font-style: italic;
    color: #555;
    margin-bottom: 20px;
}

.quote-card .author {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
}

/* Responsive Media Queries */
@media (max-width: 768px) {
    .premium-grid, .quote-grid {
        grid-template-columns: 1fr;
    }

    .premium-card, .quote-card {
        margin-bottom: 20px;
    }

    .premium-card .cta-button {
        font-size: 1rem;
        padding: 8px 20px;
    }

    .premium-mines h2, .inspirational-quotes h2 {
        font-size: 2rem;
    }

    .quote-card .quote {
        font-size: 1.2rem;
    }
}
/* Testimonials Section */
.testimonials {
    padding: 80px 20px;
    background: linear-gradient(135deg, #f4f4f4, #dfe6e9);
    text-align: center;
    border-bottom: 5px solid #1abc9c;
}

.testimonials h2 {
    font-size: 3.5rem;
    margin-bottom: 50px;
    color: #333;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    position: relative;
}

.testimonials h2::after {
    content: '';
    position: absolute;
    width: 60px;
    height: 5px;
    background-color: #1abc9c;
    left: 50%;
    transform: translateX(-50%);
    bottom: -15px;
}

/* Testimonial Grid */
.testimonial-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    justify-items: center;
}

.testimonial-card {
    background: linear-gradient(145deg, #fff, #f4f4f4);
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 320px;
    transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
    position: relative;
    overflow: hidden;
    transform: scale(0.95);
}

.testimonial-card:hover {
    transform: scale(1.05);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    filter: brightness(1.1);
}

/* Card Animation */
.testimonial-card .quote {
    font-size: 1.4rem;
    font-style: italic;
    color: #555;
    margin-bottom: 25px;
    line-height: 1.6;
    position: relative;
    animation: fadeInUp 0.7s ease-out;
}

.testimonial-card .quote::before {
    content: "“";
    font-size: 3.5rem;
    position: absolute;
    top: -10px;
    left: -20px;
    color: #1abc9c;
}

.testimonial-card .quote::after {
    content: "”";
    font-size: 3.5rem;
    position: absolute;
    bottom: -10px;
    right: -20px;
    color: #1abc9c;
}

.testimonial-card .customer-name {
    font-size: 1.3rem;
    font-weight: bold;
    color: #333;
    margin-top: 15px;
    text-transform: capitalize;
    letter-spacing: 1px;
    position: relative;
    animation: fadeInUp 1s ease-out;
}

.testimonial-card .customer-name::before {
    content: "- ";
    color: #e74c3c;
    font-weight: bold;
}

.testimonial-card .customer-photo {
    border-radius: 50%;
    width: 80px;
    height: 80px;
    margin-bottom: 15px;
    transition: transform 0.3s ease;
}

.testimonial-card:hover .customer-photo {
    transform: rotate(360deg);
}

/* Card Flip Effect */
.testimonial-card .card-flip {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    border-radius: 20px;
    transform: rotateY(180deg);
    transform-origin: center;
    backface-visibility: hidden;
    padding: 30px;
    transition: transform 0.6s ease-in-out;
}

.testimonial-card:hover .card-flip {
    transform: rotateY(0);
}

.testimonial-card .card-flip p {
    font-size: 1.2rem;
    font-style: normal;
    color: #fff;
    line-height: 1.6;
}

/* Responsive Media Queries */
@media (max-width: 768px) {
    .testimonial-grid {
        grid-template-columns: 1fr;
    }

    .testimonials h2 {
        font-size: 2.5rem;
    }

    .testimonial-card .quote {
        font-size: 1.2rem;
    }

    .testimonial-card .customer-name {
        font-size: 1rem;
    }
}

/* Keyframe Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
/* Hero Banner Section */
.hero-banner {
    position: relative;
    width: 100%;
    height: 100vh;
    background: linear-gradient(to bottom right, #0d3b4e, #1abc9c); /* Gradient background */
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    text-align: center;
    overflow: hidden;
    padding: 0 20px;
    box-sizing: border-box;
    animation: fadeIn 1s ease-out;
}

/* Overlay */
.hero-banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
}

/* Hero Text */
.hero-text {
    position: relative;
    z-index: 2;
    max-width: 900px;
    width: 100%;
}

.hero-text h1 {
    font-size: 4rem;
    font-weight: bold;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 20px;
    color: #fff;
    animation: slideIn 1s ease-out;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6); /* Enhanced text shadow */
}

.hero-text p {
    font-size: 1.6rem;
    margin-bottom: 30px;
    color: rgba(255, 255, 255, 0.8);
    animation: slideIn 1.5s ease-out;
    font-family: 'Georgia', serif; /* Elegant serif font */
}

/* Marquee Text */
.hero-text .marquee {
    font-size: 1.4rem;
    font-weight: bold;
    letter-spacing: 1px;
    color: #f39c12;
    padding: 10px 0;
    background-color: #2c3e50;
    animation: marqueeEffect 10s linear infinite;
    margin-bottom: 20px;
    text-transform: uppercase;
    border-radius: 5px;
}

@keyframes marqueeEffect {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

/* Call-to-Action Button */
.cta-button {
    padding: 15px 30px;
    font-size: 1.2rem;
    font-weight: bold;
    background-color: #e74c3c; /* Bold red color */
    color: #fff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    text-transform: uppercase;
    box-shadow: 0 10px 30px rgba(231, 76, 60, 0.3); /* Button shadow for depth */
}

.cta-button:hover {
    background-color: #c0392b; /* Darker red shade on hover */
    transform: translateY(-5px);
}

/* Animation Keyframes */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideIn {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* Responsive Media Query */
@media (max-width: 768px) {
    .hero-banner {
        height: 80vh;
    }

    .hero-text h1 {
        font-size: 2.5rem;
    }

    .hero-text p {
        font-size: 1.2rem;
    }

    .cta-button {
        padding: 12px 24px;
        font-size: 1rem;
    }
}



    </style>
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <!-- Hero Banner Section -->
    <section class="hero-banner">
        <div class="hero-text">
            <h1>Unlock the Earth’s Richest Treasures</h1>
            <p>Explore the finest, rarest, and most valuable mines in the world.</p>
            <button class="cta-button">Shop Now</button>
        </div>
    </section>

    <!-- Premium Mines Section -->
    <section class="premium-mines">
        <h2>Premium & Rare Mines</h2>
        <div class="premium-grid">
            <div class="premium-card">
                <img src="../assets/images/diamond-mine.jpg" alt="Diamond Mine">
                <h3>Diamond Mine</h3>
                <p>The rarest and most valuable gems. Unlock the treasure of the earth.</p>
                <p class="price">$1,000,000 per carat</p>
                <button class="cta-button">Explore Now</button>
            </div>
            <div class="premium-card">
                <img src="../assets/images/gold-mine.jpg" alt="Gold Mine">
                <h3>Gold Mine</h3>
                <p>Shining brilliance beneath the surface. A classic symbol of wealth.</p>
                <p class="price">$500,000 per ton</p>
                <button class="cta-button">Explore Now</button>
            </div>
            <div class="premium-card">
                <img src="../assets/images/platinum-mine.jpg" alt="Platinum Mine">
                <h3>Platinum Mine</h3>
                <p>Rare, strong, and precious. The epitome of luxury.</p>
                <p class="price">$800,000 per ton</p>
                <button class="cta-button">Explore Now</button>
            </div>
        </div>
    </section>

    <!-- Inspirational Quotes Section -->
    <section class="inspirational-quotes">
        <h2>Words of Wisdom</h2>
        <div class="quote-grid">
            <div class="quote-card">
                <p class="quote">"The future belongs to those who believe in the beauty of their dreams." – Eleanor Roosevelt</p>
                <p class="author">- Eleanor Roosevelt</p>
            </div>
            <div class="quote-card">
                <p class="quote">"Success is not final, failure is not fatal: It is the courage to continue that counts." – Winston Churchill</p>
                <p class="author">- Winston Churchill</p>
            </div>
            <div class="quote-card">
                <p class="quote">"Opportunities don't happen. You create them." – Chris Grosser</p>
                <p class="author">- Chris Grosser</p>
            </div>
        </div>
    </section>
    <!-- Testimonials Section -->
<section class="testimonials">
    <h2>What Our Customers Say</h2>
    <div class="testimonial-grid">
        <div class="testimonial-card">
            <p>"The Diamond Mine investment has been a life-changing experience. Highly recommend!"</p>
            <p class="customer-name">John Doe</p>
        </div>
        <div class="testimonial-card">
            <p>"Investing in the Gold Mine was the best decision I've made. Worth every penny!"</p>
            <p class="customer-name">Jane Smith</p>
        </div>
        <div class="testimonial-card">
            <p>"If you're looking for luxury, the Platinum Mine is where you want to be."</p>
            <p class="customer-name">Mark Lee</p>
        </div>
    </div>
</section>


    <script>
        // Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
});

// Animate Premium Cards on scroll
const premiumCards = document.querySelectorAll('.premium-card');

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
        }
    });
}, { threshold: 0.5 });

premiumCards.forEach(card => {
    observer.observe(card);
});

// CSS Animation (In the CSS section, add the following class)
.premium-card.show {
    animation: fadeInUp 0.5s ease-in-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    </script>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
