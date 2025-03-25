// <!-- Mobile menu JS -->
// opening
function setupMenu(block) {
  // ==========================
  const menuToggleBtn = block.querySelector(".menu-toggle-btn");
  const toggleBackBtn = block.querySelector(".toggle-back-btn");

  const navbarNav = block.querySelector(".navbar-nav-block");
  const menutogleicon = block.querySelector(".menu_iconin");
  const sitelogo = block.querySelector(".site_logo");

  // Handling
  const productsBtn = block.querySelector(".products_btn");
  const miniMenuProduct = block.querySelector(".miniMenuProduct");
  const minMenu = block.querySelector(".min_menu");
  const minmenutwo = block.querySelector(".min_menutwo");
  const minmenuthree = block.querySelector(".min_menuthree");
  const backtomain = block.querySelector(".back_to_main");
  const forBrandsBtn = block.querySelector(".p-brands-btn");
  const csforBrandsBtn = block.querySelector(".success-stories-btn");
  const Brandsbmenu = block.querySelector(".submenubrands");
  const csBrandsbmenu = block.querySelector(".cssubmenubrands");
  const pmanufacBtn = block.querySelector(".pmanufac-btn");
  const cspmanufacBtn = block.querySelector(".cspmanufac-btn");
  const submenumanufac = block.querySelector(".submenumanufac");
  const cssubmenumanufac = block.querySelector(".cssubmenumanufac");
  const pforbrands = block.querySelector(".p_forbrands");
  const pformanufacture = block.querySelector(".p_formanufacture");
  const csforbrands = block.querySelector(".cs_forbrands");
  const csformanufacture = block.querySelector(".cs_formanufacture");

  const csbtnofbrands = block.querySelector(".cs-brands-btn");
  const cpbtnofbrands = block.querySelector(".compnay-btn");

  const intebtnofbrands = block.querySelector(".integrations-btn");
  const minmenufour = block.querySelector(".min_menufour");

  const resourcebtn = block.querySelector(".resource-btn");
  const minmenufive = block.querySelector(".min_menufive");

  // Icons
  const bicon = block.querySelector(".navlink_icon1");
  const csbicon = block.querySelector(".navlink_iconcs1");
  const mficon = block.querySelector(".link_icons2");
  const csmficon = block.querySelector(".link_iconscs2");

  // STEP 1
  productsBtn.addEventListener("click", function () {
    // Hide the menu and show the "For Brands" cards
    toggleBackBtn.classList.remove("d-none");
    menuToggleBtn.classList.add("d-none");
    minMenu.classList.add("active");
    // Change the toggle button to 'Back' icon
    menutogleicon.setAttribute("aria-label", "Back to Menu");
    sitelogo.style.display = "none";
    backtomain.innerHTML = "Products";
  });
  // 2
  csforBrandsBtn.addEventListener("click", function () {
    // Hide the menu and show the "For Brands" cards
    toggleBackBtn.classList.remove("d-none");
    menuToggleBtn.classList.add("d-none");
    minmenutwo.classList.add("active");
    // Change the toggle button to 'Back' icon

    menutogleicon.setAttribute("aria-label", "Back to Menu");
    sitelogo.style.display = "none";
    backtomain.innerHTML = "Success Stories";
  });
  // 3
  cpbtnofbrands.addEventListener("click", function () {
    // Hide the menu and show the "For Brands" cards
    toggleBackBtn.classList.remove("d-none");
    menuToggleBtn.classList.add("d-none");
    minmenuthree.classList.add("active");
    // Change the toggle button to 'Back' icon

    menutogleicon.setAttribute("aria-label", "Back to Menu");
    sitelogo.style.display = "none";
    backtomain.innerHTML = "Company";
  });
  // 4
  intebtnofbrands.addEventListener("click", function () {
    // Hide the menu and show the "For Brands" cards
    toggleBackBtn.classList.remove("d-none");
    menuToggleBtn.classList.add("d-none");
    minmenufour.classList.add("active");
    // Change the toggle button to 'Back' icon

    menutogleicon.setAttribute("aria-label", "Back to Menu");
    sitelogo.style.display = "none";
    backtomain.innerHTML = "Integrations";
  });
  // 5
  resourcebtn.addEventListener("click", function () {
    // Hide the menu and show the "For Brands" cards
    toggleBackBtn.classList.remove("d-none");
    menuToggleBtn.classList.add("d-none");
    minmenufive.classList.add("active");
    // Change the toggle button to 'Back' icon

    menutogleicon.setAttribute("aria-label", "Back to Menu");
    sitelogo.style.display = "none";
    backtomain.innerHTML = "Resources";
  });

  // STEP 2
  forBrandsBtn.addEventListener("click", function () {
    // Toggle visibility of the products submenu
    submenumanufac.style.display = "none"; // Close submenu
    mficon.src = "../assets/img/menu_down_btn.svg";
    pformanufacture.style.backgroundColor = "#F5F5F5";
    if (Brandsbmenu.style.display === "block") {
      Brandsbmenu.style.display = "none"; // Close submenu
      bicon.src = "../assets/img/menu_down_btn.svg";
      pforbrands.style.backgroundColor = "#F5F5F5";
    } else {
      bicon.src = "../assets/img/menu_up_btn.svg";
      Brandsbmenu.style.display = "block";
      pforbrands.style.backgroundColor = "#DCFEFA";
      // Open submenu
    }
  });
  pmanufacBtn.addEventListener("click", function () {
    // Toggle visibility of the products submenu

    Brandsbmenu.style.display = "none"; // Close submenu
    bicon.src = "../assets/img/menu_down_btn.svg";
    if (submenumanufac.style.display === "block") {
      submenumanufac.style.display = "none"; // Close submenu

      mficon.src = "../assets/img/menu_down_btn.svg";
      pformanufacture.style.backgroundColor = "#F5F5F5";
    } else {
      mficon.src = "../assets/img/menu_up_btn.svg";
      submenumanufac.style.display = "block"; // Open submenu
      pformanufacture.style.backgroundColor = "#DCFEFA";
    }
  });
  // 2
  csbtnofbrands.addEventListener("click", function () {
    cssubmenumanufac.style.display = "none"; // Close submenu
    csmficon.src = "../assets/img/menu_down_btn.svg";
    csformanufacture.style.backgroundColor = "#F5F5F5";
    // Toggle visibility of the products submenu

    if (csBrandsbmenu.style.display === "block") {
      csBrandsbmenu.style.display = "none"; // Close submenu
      csbicon.src = "../assets/img/menu_down_btn.svg";
      csforbrands.style.backgroundColor = "#F5F5F5";
    } else {
      csbicon.src = "../assets/img/menu_up_btn.svg";
      csBrandsbmenu.style.display = "block";
      csforbrands.style.backgroundColor = "#DCFEFA";
      // Open submenu
    }
  });
  // 3
  cspmanufacBtn.addEventListener("click", function () {
    csBrandsbmenu.style.display = "none"; // Close submenu
    csbicon.src = "../assets/img/menu_down_btn.svg";
    csforbrands.style.backgroundColor = "#F5F5F5";
    // Toggle visibility of the products submenu
    if (cssubmenumanufac.style.display === "block") {
      cssubmenumanufac.style.display = "none"; // Close submenu
      csmficon.src = "../assets/img/menu_down_btn.svg";
      csformanufacture.style.backgroundColor = "#F5F5F5";
    } else {
      csmficon.src = "../assets/img/menu_up_btn.svg";
      cssubmenumanufac.style.display = "block"; // Open submenu
      csformanufacture.style.backgroundColor = "#DCFEFA";
    }
  });

  // Small Device Submenu
  const openBtnErp = document.querySelector(".open-erp-btn");
  const sumMenuErp = document.querySelector(".open-erp-m");
  const fullWERP = document.querySelector(".erp_drop");
  const navlink_iconrerp = document.querySelector(".navlink_iconrerp");
  const bc_erp = document.querySelector(".bc-erp");

  if (openBtnErp && sumMenuErp && fullWERP && navlink_iconrerp) {
    openBtnErp.addEventListener("click", function () {
      // Toggle visibility of the submenu
      if (sumMenuErp.style.display === "block") {
        sumMenuErp.style.display = "none";
        fullWERP.classList.remove("expanded");
        navlink_iconrerp.classList.remove("rotate");
        bc_erp.classList.remove("bc-erp-exp");
      } else {
        sumMenuErp.style.display = "block";
        fullWERP.classList.add("expanded");
        navlink_iconrerp.classList.add("rotate");
        bc_erp.classList.add("bc-erp-exp");
      }
    });
  }

  // Submenu 1st
  const second_exp_btn = document.querySelector(".second-exp-btn");
  const secondsubmenuexp = document.querySelector(".secondsubmenuexp");
  const navlink_iconrexp = document.querySelector(".navlink_iconrexp");
  // Submenu 2nd
  const second_exp_btn2 = document.querySelector(".second-exp-btn2");
  const secondsubmenuexp2 = document.querySelector(".secondsubmenuexp2");
  const navlink_iconrexp2 = document.querySelector(".navlink_iconrexp2");
  // Submenu 3rd
  const second_exp_btn3 = document.querySelector(".second-exp-btn3");
  const secondsubmenuexp3 = document.querySelector(".secondsubmenuexp3");
  const navlink_iconrexp3 = document.querySelector(".navlink_iconrexp3");
  // Submenu 4rd
  const second_exp_btn4 = document.querySelector(".second-exp-btn4");
  const secondsubmenuexp4 = document.querySelector(".secondsubmenuexp4");
  const navlink_iconrexp4 = document.querySelector(".navlink_iconrexp4");

  if (second_exp_btn && secondsubmenuexp) {
    second_exp_btn.addEventListener("click", function () {
      secondsubmenuexp2.style.display = "none";
      navlink_iconrexp2.classList.remove("rotate");
      secondsubmenuexp3.style.display = "none";
      navlink_iconrexp3.classList.remove("rotate");
      secondsubmenuexp4.style.display = "none";
      navlink_iconrexp4.classList.remove("rotate");
      if (secondsubmenuexp.style.display === "block") {
        secondsubmenuexp.style.display = "none";
        navlink_iconrexp.classList.remove("rotate");
      } else {
        secondsubmenuexp.style.display = "block";
        navlink_iconrexp.classList.add("rotate");
      }
    });
  }

  if (second_exp_btn2 && secondsubmenuexp2) {
    second_exp_btn2.addEventListener("click", function () {
      secondsubmenuexp.style.display = "none";
      navlink_iconrexp.classList.remove("rotate");

      secondsubmenuexp3.style.display = "none";
      navlink_iconrexp3.classList.remove("rotate");
      secondsubmenuexp4.style.display = "none";
      navlink_iconrexp4.classList.remove("rotate");
      if (secondsubmenuexp2.style.display === "block") {
        secondsubmenuexp2.style.display = "none";
        navlink_iconrexp2.classList.remove("rotate");
      } else {
        secondsubmenuexp2.style.display = "block";
        navlink_iconrexp2.classList.add("rotate");
      }
    });
  }

  if (second_exp_btn3 && secondsubmenuexp3) {
    second_exp_btn3.addEventListener("click", function () {
      secondsubmenuexp.style.display = "none";
      navlink_iconrexp.classList.remove("rotate");
      secondsubmenuexp2.style.display = "none";
      navlink_iconrexp2.classList.remove("rotate");
      secondsubmenuexp4.style.display = "none";
      navlink_iconrexp4.classList.remove("rotate");

      if (secondsubmenuexp3.style.display === "block") {
        secondsubmenuexp3.style.display = "none";
        navlink_iconrexp3.classList.remove("rotate");
      } else {
        secondsubmenuexp3.style.display = "block";
        navlink_iconrexp3.classList.add("rotate");
      }
    });
  }

  if (second_exp_btn4 && secondsubmenuexp4) {
    second_exp_btn4.addEventListener("click", function () {
      secondsubmenuexp.style.display = "none";
      navlink_iconrexp.classList.remove("rotate");
      secondsubmenuexp2.style.display = "none";
      navlink_iconrexp2.classList.remove("rotate");
      secondsubmenuexp3.style.display = "none";
      navlink_iconrexp3.classList.remove("rotate");

      if (secondsubmenuexp4.style.display === "block") {
        secondsubmenuexp4.style.display = "none";
        navlink_iconrexp4.classList.remove("rotate");
      } else {
        secondsubmenuexp4.style.display = "block";
        navlink_iconrexp4.classList.add("rotate");
      }
    });
  }

  // STEP 3
  // closing submenu area
  toggleBackBtn.addEventListener("click", function () {
    const submenuItems = document.querySelectorAll(
      ".submenumanufac,.submenubrands,.cssubmenumanufac,.cssubmenubrands"
    );

    submenuItems.forEach((item) => {
      item.style.display = "none";
    });
    bicon.src = "../assets/img/menu_down_btn.svg";
    mficon.src = "../assets/img/menu_down_btn.svg";
    csbicon.src = "../assets/img/menu_down_btn.svg";
    csmficon.src = "../assets/img/menu_down_btn.svg";
    if (minMenu.classList.contains("active")) {
      // If we're viewing the "For Products", go back to the menu
      minMenu.classList.remove("active");
      // navbarNav.classList.add("show");
      toggleBackBtn.classList.add("d-none");
      menuToggleBtn.classList.remove("d-none");
      sitelogo.style.display = "flex";

      backtomain.innerHTML = "";
    } else if (minmenutwo.classList.contains("active")) {
      // If we're viewing the "Sucess Stories", go back to the menu
      minmenutwo.classList.remove("active");
      toggleBackBtn.classList.add("d-none");
      menuToggleBtn.classList.remove("d-none");
      sitelogo.style.display = "flex";

      backtomain.innerHTML = "";
    } else if (minmenuthree.classList.contains("active")) {
      // If we're viewing the "Sucess Stories", go back to the menu
      minmenuthree.classList.remove("active");
      toggleBackBtn.classList.add("d-none");
      menuToggleBtn.classList.remove("d-none");
      sitelogo.style.display = "flex";

      backtomain.innerHTML = "";
    } else if (minmenufour.classList.contains("active")) {
      // If we're viewing the "Sucess Stories", go back to the menu
      minmenufour.classList.remove("active");
      toggleBackBtn.classList.add("d-none");
      menuToggleBtn.classList.remove("d-none");
      sitelogo.style.display = "flex";

      backtomain.innerHTML = "";
    } else if (minmenufive.classList.contains("active")) {
      // If we're viewing the "Sucess Stories", go back to the menu
      minmenufive.classList.remove("active");
      toggleBackBtn.classList.add("d-none");
      menuToggleBtn.classList.remove("d-none");
      sitelogo.style.display = "flex";

      backtomain.innerHTML = "";
    }
  });

  // End handling
}

// Fetch Common code
// Load the header dynamically
fetch("http://159.89.176.107/wp-content/themes/wfx-blog/dist/assets/commonComponent/header/header.html")
  .then((response) => response.text())
  .then((data) => {
    const getHeader = document.getElementById("header");

    if (getHeader) {
      getHeader.innerHTML = data;
      const menuBlocks = document.querySelectorAll(".menu-block");

      // Initialize menu for each menu block
      if (menuBlocks) menuBlocks.forEach(setupMenu);
    }
  })
  .catch((error) => console.error("Error loading the header:", error));

// Load the footer dynamically
fetch("http://159.89.176.107/wp-content/themes/wfx-blog/dist/assets/commonComponent/footer/footer.html")
  .then((response) => response.text())
  .then((data) => {
    const getFooter = document.getElementById("footer");
    if (getFooter) {
      getFooter.innerHTML = data;
    }
  })
  .catch((error) => console.error("Error loading the footer:", error));

// Load the faq dynamically
fetch("http://159.89.176.107/wp-content/themes/wfx-blog/dist/assets/assets/commonComponent/Faq/faq.html")
  .then((response) => response.text())
  .then((data) => {
    const getFaq = document.getElementById("faq");
    if (getFaq) {
      getFaq.innerHTML = data;
    }
  })
  .catch((error) => console.error("Error loading the faq:", error));

// Load the customer Review dynamically
fetch("http://159.89.176.107/wp-content/themes/wfx-blog/dist/assets/assets/commonComponent/customerReview/customerReview.html")
  .then((response) => response.text())
  .then((data) => {
    const getCustomerReview = document.getElementById("customerReview");
    if (getCustomerReview) {
      getCustomerReview.innerHTML = data;
    }
  })
  .catch((error) => console.error("Error loading the customer Review:", error));

// Load the customer Review dynamically
fetch("http://159.89.176.107/wp-content/themes/wfx-blog/dist/assets/assets/commonComponent/Banner/banner.html")
  .then((response) => response.text())
  .then((data) => {
    const banner1 = document.getElementById("strugglingBanner");
    const banner2 = document.getElementById("strugglingBanner2");
    if (banner1) {
      banner1.innerHTML = data;
    }
    if (banner2) {
      banner2.innerHTML = data;
    }

    // document.getElementById('strugglingBanner').innerHTML = data;
    // document.getElementById('strugglingBanner2').innerHTML = data;
  })
  .catch((error) => console.error("Error loading the banner:", error));

document.addEventListener("click", function (event) {
  if (event.target.closest(".reviews_arear .playButton")) {
    const videoContainer = event.target.closest(".video-container");
    const videoSource = videoContainer.querySelector("video source").src;

    const modal = document.getElementById("videoModal");
    const modalVideo = document.getElementById("modalVideo");

    modalVideo.querySelector("source").src = videoSource; // Set the correct video source
    modalVideo.load(); // Load the new video source
    modal.style.display = "flex"; // Show the modal
    modalVideo.play(); // Play the video
  }

  if (event.target.id === "closeModal") {
    const modal = document.getElementById("videoModal");
    const modalVideo = document.getElementById("modalVideo");

    modal.style.display = "none"; // Hide the modal
    modalVideo.pause(); // Pause the video
    modalVideo.currentTime = 0; // Reset video to start
  }
});
