<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    function removeEmployee(id) {
        if (confirm('Are you sure you want to delete this employee?')) {
            fetch(`/employees/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('Employee deleted successfully.');
                    window.location.href = "{{ route('employees.index') }}";
                } else {
                    return response.json().then(data => {
                        throw new Error(data.message || 'Something went wrong');
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting employee: ' + error.message);
            });
        }
    }

    function editEmployee(id) {
        window.location.href = `/employees/${id}`;
    }
</script>
