<script src="../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 6,
    spaceBetween: 1,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>

<?php require('./components/footer.php') ?>

</body>

</html>