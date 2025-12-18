<!-- Modal Delete Book -->
<div class="modal fade" id="deleteBookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold text-danger">
                    Hapus Buku
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <p class="mb-1">Yakin ingin menghapus buku:</p>
                <strong id="deleteBookName"></strong>
            </div>

            <div class="modal-footer justify-content-center">
                <button
                    class="btn btn-secondary btn-sm"
                    data-bs-dismiss="modal"
                >
                    Batal
                </button>
                <button
                    class="btn btn-danger btn-sm"
                    onclick="deleteBook()"
                >
                    Hapus
                </button>
            </div>

        </div>
    </div>
</div>

<script>
let deleteBookId = null;

function openDeleteModal(id, name) {
    deleteBookId = id;
    document.getElementById('deleteBookName').innerText = name;

    const modal = new bootstrap.Modal(
        document.getElementById('deleteBookModal')
    );
    modal.show();
}

function deleteBook() {
    fetch(`/api/books/${deleteBookId}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(() => {
        location.reload();
    })
    .catch(() => {
        alert('Gagal menghapus data');
    });
}
</script>
