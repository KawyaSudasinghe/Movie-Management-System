document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.delete-link').forEach(link => {
        link.addEventListener('click', (event) => {
            if (!confirm('Are you sure you want to delete this movie?')) {
                event.preventDefault();
            }
        });
    });

    const ratingInputs = document.querySelectorAll('input[name="rating"]');
    ratingInputs.forEach(input => {
        input.addEventListener('input', () => {
            if (Number(input.value) < 0) input.value = 0;
            if (Number(input.value) > 10) input.value = 10;
        });
    });
});