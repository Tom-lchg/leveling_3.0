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

<div className="drawer drawer-end">
  <input id="my-drawer-4" type="checkbox" className="drawer-toggle" />
  <div className="drawer-content">
    <!-- Page content here -->
    <label htmlFor="my-drawer-4" className="drawer-button btn btn-primary">Open drawer</label>
  </div> 
  <div className="drawer-side">
    <label htmlFor="my-drawer-4" className="drawer-overlay"></label>
    <ul className="menu p-4 w-80 bg-base-100 text-base-content">
      <!-- Sidebar content here -->
	  <?= require ('./page/chat.php') ?>
      
    </ul>
  </div>
</div>

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