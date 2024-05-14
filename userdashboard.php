<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Where to?</title>
  <link rel="stylesheet" href="userdashboard.css">
</head>
<body>
  <div class="content-wrapper">
    <header>
      <div class="logo">
        <a href="userdashboard.php">
          <img src="logo.png" alt="Company Logo">
        </a>
      </div>
      <div class="topbuttons">
        <a href="aboutus.html" class="about-us">About Us</a>
        <a href="help.html" class="help">Help</a>
        <div class="dp profile">
          <img id="userIcon" src="dp.jpg" alt="account" onclick="toggleDropdown()">
          <div class="dropdown-content">
            <a href="cancel.html">Cancel Ticket</a>
            <a href="changetraveldate.html">Change Travel Date</a>
            <a href="showticket.html">Show My Ticket</a>
            <a href="logoutpage.html">Sign Out</a>
          </div>
        </div>
      </div>
    </header>
    <h1>PLAN YOUR ROUTE</h1>
    <main>
      <div class="search-container">
        <form action="search-results.php" method="post">
          <div class="search-bar">
            <input type="text" name="from" placeholder="From" required>
            <input type="text" name="to" placeholder="To" required>
            <label for="date-picker">Select a Date:</label>
            <input type="date" id="date-picker" name="date-picker">
            <button type="submit" class="search">Search</button>
          </div>
        </form>
      </div>
    </main>
  </div>
  <footer>
    <p>Why Where to? Our bus travel booking in Nepal, Mumbai Free travel bus offers bus tickets to explore travel destinations to make your journey convenient, comfortable, and enjoyable. Book your bus via reserve your bus tickets hassle-free with our simple booking process online and save your bookings.</p>
    <div class="footer-icons">
      <img src="email.png" alt="Email">
      <img src="insta.png" alt="Social">
    </div>
  </footer>
  <script src="dropdown.js"></script>
</body>
</html>
