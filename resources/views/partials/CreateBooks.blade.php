<!-- Modal Create Book -->
<div class="modal fade" id="createBookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                   <form id="createBookForm">
                        <input type="text" name="book_name" class="form-control mb-2" placeholder="Nama Buku">
                        <input type="text" name="author" class="form-control mb-2" placeholder="Author">
                        <input type="date" name="published_date" class="form-control mb-2">
                        <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>

                        <button type="button" class="btn btn-primary" onclick="storeBook()">
                            Simpan
                        </button>
                    </form>

                    <div id="errorMsg" class="text-danger mt-2"></div>

                </div>
        </div>
    </div>
</div>

<script>
function storeBook() {
    const form = document.getElementById('createBookForm');
    const errorMsg = document.getElementById('errorMsg');

    fetch('/api/books', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            book_name: form.book_name.value,
            author: form.author.value,
            published_date: form.published_date.value,
            description: form.description.value
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.message) {
            errorMsg.innerText = data.message;
            return;
        }

        location.reload(); // refresh tabel
    })
    .catch(() => {
        errorMsg.innerText = 'Gagal menyimpan data';
    });
}
</script>
