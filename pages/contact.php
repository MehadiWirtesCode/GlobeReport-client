<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - GlobeReport</title>
  <link rel="stylesheet" href="cssFiles/footer.css">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;600;700&display=swap"
    rel="stylesheet">
  <style>
  body {
    font-family: 'Noto Sans Bengali', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
  }

  .contact-container {
    max-width: 1000px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
  }

  .contact-header {
    text-align: center;
    margin-bottom: 30px;
  }

  .contact-header h1 {
    margin: 0;
    font-size: 2em;
    color: #333;
  }

  .contact-header p {
    margin-top: 5px;
    color: #666;
  }

  .contact-content {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
  }

  .contact-form,
  .contact-info {
    flex: 1 1 400px;
  }

  .contact-form form {
    display: flex;
    flex-direction: column;
  }

  .contact-form input,
  .contact-form textarea {
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1em;
  }

  .contact-form button {
    padding: 12px;
    background-color: #0077cc;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1em;
    transition: 0.3s;
  }

  .contact-form button:hover {
    background-color: #005fa3;
  }

  .contact-info h3 {
    margin-top: 0;
    color: #333;
  }

  .contact-info p {
    color: #555;
    margin: 8px 0;
  }

  .contact-info i {
    color: #0077cc;
    margin-right: 10px;
  }

  /* Responsive */
  @media(max-width:768px) {
    .contact-content {
      flex-direction: column;
    }
  }
  </style>
</head>

<body>

  <div class="contact-container">
    <div class="contact-header">
      <h1>Contact Us</h1>
      <p>Have questions? Reach out to us and we will get back to you soon!</p>
    </div>

    <div class="contact-content">
      <!-- Form Section -->
      <div class="contact-form">
        <form id="contactForm">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <input type="text" name="subject" placeholder="Subject" required>
          <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>

      <!-- Info Section -->
      <div class="contact-info">
        <h3>Our Office</h3>
        <p><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</p>
        <p><i class="fas fa-phone-alt"></i> +880 1724953889</p>
        <p><i class="fas fa-envelope"></i> info@globereport.com</p>
        <p><i class="fas fa-globe"></i> www.globereport.com</p>
      </div>
    </div>
  </div>

  <!-- FontAwesome for icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"></script>

  <!-- Optional: handle form submission -->
  <script>
  const contactForm = document.getElementById('contactForm');
  contactForm.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Thank you! Your message has been sent.');
    contactForm.reset();
  });
  </script>

</body>

</html>