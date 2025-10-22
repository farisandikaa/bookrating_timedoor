document.addEventListener("DOMContentLoaded", () => {
    const authorSelect = document.getElementById("author_id");
    const bookSelect = document.getElementById("book_id");

    if (authorSelect) {
        authorSelect.addEventListener("change", () => {
            const authorId = authorSelect.value;
            bookSelect.innerHTML = '<option>Loading...</option>';

            fetch(`/api/authors/${authorId}/books`)
                .then(res => res.json())
                .then(data => {
                    bookSelect.innerHTML = '<option value="">-- Select Book --</option>';
                    data.forEach(book => {
                        const opt = document.createElement('option');
                        opt.value = book.id;
                        opt.textContent = book.name;
                        bookSelect.appendChild(opt);
                    });
                })
                .catch(() => {
                    bookSelect.innerHTML = '<option>Error loading books</option>';
                });
        });
    }
});
