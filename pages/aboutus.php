<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - GlobeReport</title>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bangla:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <style>
  /* General Styles */
  body {
    font-family: 'Noto Sans Bangla', sans-serif;
    margin: 0;
    padding: 0;
    line-height: 1.6;
    background-color: #f9f9f9;
    color: #333;
  }

  a {
    text-decoration: none;
    color: inherit;
  }

  .container {
    max-width: 1100px;
    margin: auto;
    padding: 20px;
  }

  h1,
  h2,
  h3 {
    color: #222;
  }

  /* Header Section */
  .about-header {
    text-align: center;
    padding: 50px 20px 30px 20px;
    background-color: #0077b6;
    color: #fff;
  }

  .about-header h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
  }

  .about-header p {
    font-size: 1.2rem;
    margin: 0;
  }

  /* Content Sections */
  .about-content {
    display: flex;
    flex-wrap: wrap;
    margin-top: 40px;
    gap: 40px;
  }

  .about-text {
    flex: 1 1 500px;
  }

  .about-text h2 {
    margin-bottom: 15px;
  }

  .about-text p {
    margin-bottom: 15px;
  }

  .about-image {
    flex: 1 1 400px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .about-image img {
    max-width: 100%;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
  }

  /* Team Section */
  .team-section {
    margin-top: 60px;
    text-align: center;
  }

  .team-section h2 {
    margin-bottom: 40px;
  }

  .team-members {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
  }

  .team-member {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    width: 200px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }

  .team-member img {
    width: 100%;
    border-radius: 50%;
    margin-bottom: 15px;
  }

  .team-member h3 {
    margin: 0;
    font-size: 1.1rem;
  }

  .team-member p {
    font-size: 0.9rem;
    color: #555;
    margin-top: 5px;
  }

  /* Footer */
  footer {
    margin-top: 60px;
    background-color: #0077b6;
    color: #fff;
    padding: 20px 0;
    text-align: center;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .about-content {
      flex-direction: column;
    }
  }
  </style>
</head>

<body>
  <!-- Header Section -->
  <section class="about-header">
    <h1>About GlobeReport</h1>
    <p>Your trusted source for unbiased global news</p>
  </section>

  <!-- Main Content -->
  <div class="container">
    <div class="about-content">
      <div class="about-text">
        <h2>Our Mission</h2>
        <p>At GlobeReport, our mission is to deliver news from every corner of the world quickly, accurately, and
          without bias. We believe in empowering readers with the information they need to make informed decisions.</p>

        <h2>Our Vision</h2>
        <p>We aim to be the most reliable and trusted news platform globally, offering in-depth reporting, factual
          analysis, and comprehensive coverage of major events.</p>
      </div>

      <div class="about-image">
        <img
          src="https://images.unsplash.com/photo-1581091215367-3eaf6b05c7d8?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxfDB8MXxyYW5kb218MHx8bmV3c3xlbnwwfHx8fDE2OTE4Mjg1NTI&ixlib=rb-4.0.3&q=80&w=400"
          alt="About GlobeReport">
      </div>
    </div>

    <!-- Team Section -->
    <div class="team-section">
      <h2>Meet Our Team</h2>
      <div class="team-members">
        <div class="team-member">
          <img src="../images/WhatsApp Image 2025-12-18 at 20.57.36.jpeg" alt="Team Member">
          <h3>Md. Mehadi Hasan</h3>
          <p>Full stack developer| project owner</p>
        </div>
        <div class="team-member">
          <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Team Member">
          <h3>Nibir Hasan Munna</h3>
          <p>Full stack developer | Project owner</p>
        </div>

      </div>
    </div>
  </div>

  <footer>
    &copy; 2025 GlobeReport. All rights reserved.
  </footer>
</body>

</html>