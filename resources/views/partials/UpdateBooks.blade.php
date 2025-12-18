<!-- Modal Edit Book -->
<div class="modal fade" id="editBookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Description</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form id="editBookForm">
                    <input type="hidden" name="id">

                    <textarea
                        name="description"
                        class="form-control mb-3"
                        rows="4"
                        placeholder="Description"
                    ></textarea>

                    <button type="button" class="btn btn-warning" onclick="updateBook()">
                        Update
                    </button>
                </form>

                <div id="editErrorMsg" class="text-danger mt-2"></div>

            </div>

        </div>
    </div>
</div>

<script>
let editBookId = null;

function openEditModal(id, description) {
    editBookId = id;

    const form = document.getElementById('editBookForm');
    form.description.value = description;

    const modal = new bootstrap.Modal(
        document.getElementById('editBookModal')
    );
    modal.show();
}

function updateBook() {
    const form = document.getElementById('editBookForm');
    const errorMsg = document.getElementById('editErrorMsg');

    fetch(`/api/books/${editBookId}`, {
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            description: form.description.value
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.message) {
            errorMsg.innerText = data.message;
            return;
        }

        location.reload();
    })
    .catch(() => {
        errorMsg.innerText = 'Gagal mengupdate data';
    });
}
</script>
