<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5.3 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">
    <div class="container py-4">

        <!-- Header -->
        <div class="mb-3">
            <h4 class="fw-bold mb-3">📚 Manajemen Buku</h4>

            <div class="row align-items-center g-2">
                <!-- Tombol Tambah -->
                <div class="col-md-4 col-12">
                    <button
                        class="btn btn-primary btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#createBookModal"
                    >
                        Tambah Buku
                    </button>
                </div>

                <!-- Search & Reset -->
                <div class="col-md-8 col-12">
                    <div class="row g-2 justify-content-end">
                        <div class="col-md-6 col-12">
                            <div class="input-group">
                                <input
                                    type="text"
                                    id="searchInput"
                                    class="form-control"
                                    placeholder="Cari nama buku atau deskripsi..."
                                >
                                <button
                                    class="btn btn-primary"
                                    type="button"
                                    onclick="searchBook()"
                                >
                                    Search
                                </button>
                            </div>
                        </div>

                        <div class="col-md-auto col-12">
                            <button
                                class="btn btn-outline-secondary w-100"
                                onclick="resetSearch()"
                            >
                                Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @include('partials.CreateBooks')
        </div>

        <!-- Card -->
        <div class="card shadow-sm">
            <div class="card-body">

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Buku</th>
                                <th>Author</th>
                                <th>Tanggal Terbit</th>
                                <th>Description</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="bookTableBody">
                                @forelse ($books as $index => $book)
                                    <tr>
                                        <td class="text-center">
                                            {{ $books->firstItem() + $index }}
                                        </td>
                                        <td>{{ $book->book_name }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td class="text-center">{{ $book->published_date }}</td>
                                        <td>{{ Str::limit($book->description, 50) }}</td>
                                        <td class="text-center">
                                            <button
                                                class="btn btn-warning btn-sm"
                                                onclick="openEditModal({{ $book->id }}, `{{ addslashes($book->description) }}`)"
                                            >
                                                Edit
                                            </button>
                                            @include('partials.UpdateBooks')
                                            <button
                                                class="btn btn-danger btn-sm"
                                                onclick="openDeleteModal({{ $book->id }}, '{{ addslashes($book->book_name) }}')"
                                            >
                                                Hapus
                                            </button>
                                            @include('partials.DeleteBooks')
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            Data buku belum tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-end">
                    {{ $books->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>

    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function searchBook() {
    const keyword = document.getElementById('searchInput').value;

    fetch(`/api/books/search?q=${encodeURIComponent(keyword)}`)
        .then(res => res.json())
        .then(data => renderBookTable(data))
        .catch(err => console.error(err));
}

function resetSearch() {
    document.getElementById('searchInput').value = '';
    searchBook();
}

function renderBookTable(books) {
    const tbody = document.getElementById('bookTableBody');
    tbody.innerHTML = '';

    if (books.length === 0) {
        tbody.innerHTML = `
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data buku tidak ditemukan
                </td>
            </tr>
        `;
        return;
    }

    books.forEach((book, index) => {
        const desc = book.description
            ? book.description.substring(0, 50) + (book.description.length > 50 ? '...' : '')
            : '-';

        tbody.innerHTML += `
            <tr>
                <td class="text-center">${index + 1}</td>
                <td>${book.book_name}</td>
                <td>${book.author}</td>
                <td class="text-center">${book.published_date}</td>
                <td>${desc}</td>
                <td class="text-center">
                    <button
                        class="btn btn-warning btn-sm"
                        onclick="openEditModal(${book.id}, \`${escapeHtml(book.description ?? '')}\`)"
                    >
                        Edit
                    </button>
                    <button
                        class="btn btn-danger btn-sm"
                        onclick="openDeleteModal(${book.id}, '${escapeHtml(book.book_name)}')"
                    >
                        Hapus
                    </button>
                </td>
            </tr>
        `;
    });
}

/* Hindari error quote/XSS */
function escapeHtml(text) {
    return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}
</script>




