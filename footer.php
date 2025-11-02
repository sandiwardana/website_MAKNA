<?php
// footer.php
?>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const splash = document.getElementById("splash");
    const body = document.body;

    setTimeout(() => {
      splash.style.display = "none";
      body.classList.remove("hidden");
    }, 3000);
  });
  document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("igOrderForm");
  if (!form) return;

  form.addEventListener("submit", function(e) {
    e.preventDefault();

    const name = document.getElementById("name").value;
    const product = document.getElementById("product").value;
    const notes = document.getElementById("notes").value;

    const message = `Halo! Saya ${name} ingin memesan produk ${product}. ${notes ? "Catatan: " + notes : ""}`;
    const encodedMessage = encodeURIComponent(message);

    // Gunakan link DM kamu langsung
    const instagramDM = `https://www.instagram.com/direct/t/17848169838578343`;
    const finalLink = `${instagramDM}?text=${encodedMessage}`;

    window.open(finalLink, "_blank");
  });
});
</script>
  </main>
  <footer class="site-footer">
    <div class="container footer-inner">
      <div>© <?php echo date('Y'); ?> MAKNA • Crafted in Indonesia</div>
      <div class="socials">Follow: <a href="#">@makna.official</a></div>
    </div>
  </footer>
</body>
</html>
