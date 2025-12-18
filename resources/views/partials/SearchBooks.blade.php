<div class="row mb-3">
    <div class="col-md-5">
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

    <div class="col-md-7 text-end">
        <button
            class="btn btn-outline-secondary"
            onclick="resetSearch()"
        >
            Reset
        </button>
    </div>
</div>


<script>
function searchBook() {
    const keyword = document.getElementById('searchInput').value;

    fetch(`/api/books/search?keyword=${keyword}`, {
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(res => {
        renderTable(res.data);
    });
}

function resetSearch() {
    document.getElementById('searchInput').value = '';
    location.reload();
}
</script>
