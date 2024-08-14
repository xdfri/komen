document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('commentForm');
  const commentsSection = document.getElementById('commentsSection');

  form.addEventListener('submit', (event) => {
      event.preventDefault();

      const nameInput = document.getElementById('name');
      const commentInput = document.getElementById('comment');

      const name = nameInput.value.trim();
      const comment = commentInput.value.trim();

      if (name && comment) {
          const now = new Date();
          const commentTime = now.toLocaleTimeString();
          const commentDate = now.toLocaleDateString();

          // iki gwe
          const commentElement = document.createElement('div');
          commentElement.classList.add('bg-gray-50', 'p-4', 'mb-4', 'border', 'border-gray-200', 'rounded-lg', 'shadow-sm');
          commentElement.innerHTML = `
              <div class="flex items-center mb-2">
                  <div class="flex-shrink-0">
                      <img src="https://via.placeholder.com/40" alt="User Avatar" class="w-10 h-10 rounded-full border border-gray-300">
                  </div>
                  <div class="ml-3">
                      <p class="text-lg font-semibold text-gray-900">${name}</p>
                      <p class="text-sm text-gray-600">Komentar Pada Tanggal ${commentDate} at ${commentTime}</p>
                  </div>
              </div>
              <p class="text-gray-800">${comment}</p>
          `;

          commentsSection.appendChild(commentElement);

          // Clear the form fields
          nameInput.value = '';
          commentInput.value = '';
      }
  });
});