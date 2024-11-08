document.getElementById('guestbookForm').onsubmit = async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    const response = await fetch('submit.php', {
        method: 'POST',
        body: formData
    });

    if (response.ok) {
        loadEntries();
        this.reset();
    } else {
        alert("Error submitting comment");
    }
};

async function loadEntries() {
    const response = await fetch('entries.php');
    const entries = await response.json();

    const entriesDiv = document.getElementById('entries');
    entriesDiv.innerHTML = '';
    entries.forEach(entry => {
        entriesDiv.innerHTML += `<div class="entry"><strong>${entry.name}</strong>: ${entry.comment}</div>`;
    });
}

loadEntries();