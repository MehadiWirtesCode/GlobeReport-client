<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Subscription Offers</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="../jsFiles/subscription.js" defer></script>
  <style>
  /* Modern Fonts */
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

  :root {
    --bg-body: #f8fafc;
    --primary: #4f46e5;
    --primary-dark: #4338ca;
    --text-main: #0f172a;
    --text-muted: #64748b;
    --white: #ffffff;
    --success: #10b981;
    --danger: #ef4444;
    --warning: #f59e0b;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }

  body {
    background-color: var(--bg-body);
    color: var(--text-main);
    line-height: 1.5;
    padding: 2rem 1rem;
  }

  .container {
    max-width: 1152px;
    margin: 0 auto;
  }

  /* Header Section */
  .header {
    text-align: center;
    margin-bottom: 3rem;
  }

  .header h2 {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 0.75rem;
    letter-spacing: -0.025em;
  }

  .header p {
    color: var(--text-muted);
    max-width: 600px;
    margin: 0 auto;
  }

  /* Pricing Grid */
  .pricing-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 5rem;
  }

  .pricing-card {
    background: var(--white);
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 2rem;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    position: relative;
  }

  .pricing-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
  }

  /* Featured Card (Premium) */
  .pricing-card.featured {
    background: var(--primary);
    color: var(--white);
    transform: scale(1.05);
    border: none;
    box-shadow: 0 25px 50px -12px rgba(79, 70, 229, 0.2);
  }

  .badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    background: #f1f5f9;
    color: #475569;
    margin-bottom: 1rem;
  }

  .featured .badge {
    background: rgba(255, 255, 255, 0.2);
    color: var(--white);
  }

  .plan-name {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
  }

  .plan-desc {
    font-size: 0.875rem;
    color: var(--text-muted);
    margin-bottom: 2rem;
  }

  .featured .plan-desc {
    color: rgba(255, 255, 255, 0.7);
  }

  .price-box {
    margin-bottom: 2rem;
  }

  .price {
    font-size: 2.25rem;
    font-weight: 800;
  }

  .period {
    font-size: 0.875rem;
    color: var(--text-muted);
  }

  .featured .period {
    color: rgba(255, 255, 255, 0.6);
  }

  /* Features List */
  .features-list {
    list-style: none;
    margin-bottom: 2.5rem;
    flex-grow: 1;
  }

  .feature-item {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
    margin-bottom: 1rem;
    color: #475569;
  }

  .featured .feature-item {
    color: rgba(255, 255, 255, 0.9);
  }

  .feature-item svg {
    width: 20px;
    height: 20px;
    margin-right: 0.75rem;
    color: var(--success);
  }

  .featured .feature-item svg {
    color: #6ee7b7;
  }

  /* Buttons */
  .btn {
    width: 100%;
    padding: 1rem;
    border-radius: 16px;
    border: none;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.875rem;
  }

  .btn-dark {
    background: var(--text-main);
    color: var(--white);
  }

  .btn-white {
    background: var(--white);
    color: var(--primary);
  }

  .btn-amber {
    background: var(--warning);
    color: var(--white);
  }

  .btn:hover {
    opacity: 0.9;
    transform: scale(0.98);
  }



  /* Responsive */
  @media (max-width: 768px) {
    .pricing-card.featured {
      transform: scale(1);
      margin: 1rem 0;
    }
  }
  </style>
</head>

<body>

  <div class="container">

    <!-- SECTION 1: OFFERS -->
    <div class="header">
      <h2>Choose Your Membership Plan</h2>
      <p>Get unlimited access to premium news, investigative reports, and ad-free browsing experience.</p>
    </div>

    <div class="pricing-grid">
      <!-- Basic -->
      <div class="pricing-card">
        <span class="badge">Standard</span>
        <h3 class="plan-name">Basic Reader</h3>
        <p class="plan-desc">Perfect for casual news followers.</p>
        <div class="price-box">
          <span class="price">199 BDT</span>
          <span class="period">/month</span>
        </div>
        <ul class="features-list">
          <li class="feature-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            All Premium Articles
          </li>
          <li class="feature-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Weekly Newsletter
          </li>
        </ul>
        <button class="btn btn-dark" id="basic-subs">Buy Now</button>
      </div>

      <!-- Premium -->
      <div class="pricing-card featured">
        <span class="badge">Pro Access</span>
        <h3 class="plan-name">Premium Pack</h3>
        <p class="plan-desc">Deep dive into investigative journalism.</p>
        <div class="price-box">
          <span class="price">499 BDT</span>
          <span class="period">/month</span>
        </div>
        <ul class="features-list">
          <li class="feature-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Ads-Free Experience
          </li>
          <li class="feature-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Exclusive Live TV access
          </li>
          <li class="feature-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Archive Access (10 Years)
          </li>
        </ul>
        <button class="btn btn-white" id="premium-subs">Buy Now</button>
      </div>

      <!-- Gold -->
      <div class="pricing-card">
        <span class="badge" style="background: #fffbeb; color: #b45309;">Best Value</span>
        <h3 class="plan-name">Gold Annual</h3>
        <p class="plan-desc">Save big with our yearly commitment.</p>
        <div class="price-box">
          <span class="price">3999 BDT</span>
          <span class="period">/year</span>
        </div>
        <ul class="features-list">
          <li class="feature-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Everything in Premium
          </li>
          <li class="feature-item">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Invites to Web Events
          </li>
        </ul>
        <button class="btn btn-amber" id="gold-subs">Buy Now</button>
      </div>
    </div>

    <hr class="section-divider">



</body>

</html>
