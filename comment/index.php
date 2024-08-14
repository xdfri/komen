<?php

include("koneksi.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Comment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
      <!-- Comment Form -->
      <div class="mb-6">
          <h2 class="text-2xl font-bold mb-4">Testing Forum Komen </h2>
          <form id="commentForm" class="space-y-4">
              <div>
                  <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nama</label>
                  <input type="text" id="name" name="name" placeholder="Nama Kamu..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
              </div>
              <div>
                  <label for="comment" class="block text-gray-700 text-sm font-semibold mb-2">Komenan Anda</label>
                  <textarea id="comment" name="comment" rows="4" placeholder="Monggo Ndang Comment" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
              </div>
              <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Kirim</button>
          </form>
      </div>

      <div id="commentsSection" class="mt-6">
          <h2 class="text-2xl font-bold mb-4">Comments</h2>
          <!-- Comments will be loaded here -->
      </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const commentForm = document.getElementById('commentForm');
        const commentsSection = document.getElementById('commentsSection');

        // Fetch and display comments
        function loadComments() {
            fetch('comments.php')
                .then(response => response.json())
                .then(comments => {
                    commentsSection.innerHTML = '<h2 class="text-2xl font-bold mb-4">Comments</h2>';
                    comments.forEach(comment => {
                        const commentDiv = document.createElement('div');
                        commentDiv.className = 'mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg';
                        commentDiv.innerHTML = `
                            <p class="text-gray-800 font-semibold">${comment.name}</p>
                            <p class="text-gray-600">${comment.comment}</p>
                            <p class="text-gray-400 text-sm mt-2">${new Date(comment.created_at).toLocaleString()}</p>
                        `;
                        commentsSection.appendChild(commentDiv);
                    });
                });
        }

        loadComments(); // Load comments on page load

        commentForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(commentForm);

            fetch('comments.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(() => {
                commentForm.reset();
                loadComments(); // Reload comments after submission
            });
        });
    });
  </script>

</body>
</html>
