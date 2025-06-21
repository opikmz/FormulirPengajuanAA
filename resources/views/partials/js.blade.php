<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto close alert dalam 3 detik (3000 ms)
  setTimeout(function () {
    let alert = bootstrap.Alert.getOrCreateInstance(document.getElementById('allert'));
    alert.close();
  }, 3000);
</script>
