document.addEventListener('DOMContentLoaded', () => {
  const seats = document.querySelectorAll('.seat');
  const availableCount = document.querySelector('.available-count');
  const selectedCount = document.querySelector('.selected-count');
  const bookedCount = document.querySelector('.booked-count');

  let available = 29;
  let selected = 0;
  let booked = 0;

  seats.forEach(seat => {
      // Add click event listener to each seat
      seat.addEventListener('click', () => {
          // Toggle between available and selected state
          if (seat.classList.contains('available')) {
              // If seat is available, change to selected
              seat.classList.remove('available');
              seat.classList.add('selected');
              available--;
              selected++;
          } else if (seat.classList.contains('selected')) {
              // If seat is selected, change to available
              seat.classList.remove('selected');
              seat.classList.add('available');
              available++;
              selected--;
          }
          // Update the counts
          updateCounts();
      });
  });

  // Function to update available, selected, and booked counts
  function updateCounts() {
      availableCount.textContent = available;
      selectedCount.textContent = selected;
      bookedCount.textContent = booked;
  }

  // Event listener for the booking button
  const bookButton = document.querySelector('.book');
  bookButton.addEventListener('click', () => {
      const selectedSeats = document.querySelectorAll('.selected');
      // Update selected seats to booked
      selectedSeats.forEach(seat => {
          seat.classList.remove('selected');
          seat.classList.add('booked');
          selected--;
          booked++;
          available--;
      });
      updateCounts();
  });
});