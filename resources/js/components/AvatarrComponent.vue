<template>
<div class="container">
  <section class="services">
    <div class="container">
      <h2>Our Services</h2>
      <p>
        We offer a wide range of services to help you grow your business and
        achieve your goals. Our services include:
      </p>
      <div class="services">
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-laptop-code"></i>
          </div>
          <div class="service-info">
            <h3>Web Development</h3>
            <p>
              We build custom websites and web applications that are tailored to
              your specific needs and goals.
            </p>
          </div>
        </div>
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-mobile-alt"></i>
          </div>
          <div class="service-info">
            <h3>Mobile Development</h3>
            <p>
              We create mobile apps that are intuitive, engaging, and easy to
              use, helping you reach and engage with your target audience
              wherever they are.
            </p>
          </div>
        </div>
        <div class="service">
          <div class="service-icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <div class="service-info">
            <h3>Digital Marketing</h3>
            <p>
              We help you drive traffic, generate leads, and increase sales
              through our comprehensive digital marketing strategies that are
              tailored to your specific goals and target audience.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- Hero Section -->
    <section class="hero-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>Welcome to Our Website</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed volutpat felis et neque viverra, eu aliquam lacus vehicula. Sed rhoncus, nisi vel auctor fringilla.</p>
            <a href="#" class="btn btn-primary btn-lg">Learn More</a>
          </div>
          <div class="col-md-6">
            <img src="https://via.placeholder.com/600x400" class="img-fluid" alt="Hero Image">
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="feature-item">
              <i class="fas fa-laptop"></i>
              <h3>Responsive Design</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed volutpat felis et neque viverra.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-item">
              <i class="fas fa-globe"></i>
              <h3>Global Coverage</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed volutpat felis et neque viverra.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="feature-item">
              <i class="fas fa-cogs"></i>
              <h3>Customizable</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed volutpat felis et neque viverra.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

</template>

<script>
export default {};
</script>

<style>
.services {
  padding: 4rem 0;
  background-color: #f8f8f8;
}

.services h2 {
  text-align: center;
  margin-bottom: 2rem;
}

.services p {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 2rem;
}

.services .service {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 1rem;
  max-width: 400px;
  margin: 0 auto;
}

.services .service-icon {
  font-size: 3rem;
  margin-bottom: 1rem;
}

.services .service h3 {
  font-size: 2rem;
  margin-bottom: 1rem;
}

.services .service p {
  text-align: center;
  margin-bottom: 1rem;
}
</style>