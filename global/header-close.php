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

<!-- Chat -->
<div class="flex justify-end sticky inset-0 bg-transparent self-end">
  <a href="./page/chat.php"><i class="fa-solid fa-comment fa-flip-horizontal text-6xl text-accent m-6"></i></a>
</div>
<!-- Chat -->

<!-- Footer -->
<footer class="footer footer-center p-10 bg-[#e9e9e9] text-primary-content">
  <div>
    <img src="../assets/ubisoft.png" alt="" width="70">
    <p class="font-bold">Ubisoft Entertainment</p>
    <p>Copyright © 2023 - All right reserved</p>
  </div>
</footer>
<!-- Footer -->

</body>

</html>