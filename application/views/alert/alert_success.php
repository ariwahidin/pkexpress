<script>
    Swal.fire({
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    }).then(() => {
        window.location.href = '<?= $direct ?>'
    })
</script>