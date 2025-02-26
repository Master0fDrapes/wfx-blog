document.addEventListener("DOMContentLoaded", () => {
  // Select all video containers
  const videoContainers = document.querySelectorAll(".video-container");

  videoContainers.forEach((container) => {
    const video = container.querySelector("video");
    const playButton = container.querySelector(".playButton");

    // Play video on button click and add controls
    playButton.addEventListener("click", () => {
      video.play();
      video.setAttribute("controls", "controls");
      playButton.style.display = "none"; // Hide play button
    });

    // Remove controls and show play button when video is paused or ends
    video.addEventListener("pause", () => {
      video.removeAttribute("controls");
      playButton.style.display = "block";
    });

    video.addEventListener("ended", () => {
      video.removeAttribute("controls");
      playButton.style.display = "block";
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const toggles = document.querySelectorAll(".faq-toggle");

  toggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const targetId = toggle.getAttribute("data-target");
      const target = document.querySelector(targetId);

      if (target.classList.contains("show")) {
        target.classList.remove("show");
      } else {
        // Close any open FAQ first (accordion behavior)
        document
          .querySelectorAll(".faq-collapse.show")
          .forEach((openTarget) => {
            openTarget.classList.remove("show");
          });

        // Open the clicked FAQ
        target.classList.add("show");
      }
    });
  });
});

// Tabs
document.addEventListener("DOMContentLoaded", function () {
  // Prevent submenu from closing on tab click
  const dropdownTabs = document.querySelectorAll(".dropdown-menu .tab-link");

  dropdownTabs.forEach((tab) => {
    tab.addEventListener("click", function (e) {
      e.stopPropagation(); // Prevent the click event from propagating to the dropdown
    });
  });

  // Initialize tabs
  function initializeTabs(wrapperClass) {
    const wrappers = document.querySelectorAll(wrapperClass);

    wrappers.forEach((wrapper) => {
      const tabLinks = wrapper.querySelectorAll(".tab-link");
      const tabPanes = wrapper.querySelectorAll(".tab-pane");

      tabLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
          e.preventDefault();

          // Remove active class from all tabs and panes
          tabLinks.forEach((tab) =>
            tab.parentElement.classList.remove("active")
          );
          tabPanes.forEach((pane) => pane.classList.remove("active"));

          // Add active class to clicked tab and corresponding pane
          const targetId = this.getAttribute("href").substring(1); // Get the ID
          const targetPane = wrapper.querySelector(`#${targetId}`);

          this.parentElement.classList.add("active"); // Activate tab
          targetPane.classList.add("active"); // Activate pane
        });
      });
    });
  }

  // Initialize tabs for the class "tabs-wrapper"
  initializeTabs(".tabs-wrapper");
});

// Make blog Dynamic
const blogs = [
  {
    title: "Closing the Loop: A Guide to Material Recyclability in Fashion",
    description: "Lorem ipsum dolor sit amet consectetur. Sit velit mi sed at et risus bibendum. Laoreet ornare ipsum sed egestas sollicitudin leo.",
    imgSrc: "../assets/img/blog1.png",
    link: "#"
  },
  {
    title: "What is Sustainable Product Development in Fashion?",
    description: "Lorem ipsum dolor sit amet consectetur. Sit velit mi sed at et risus bibendum. Laoreet ornare ipsum sed egestas sollicitudin leo.",
    imgSrc: "../assets/img/blog2.png",
    link: "#"
  },
  {
    title: "WFX Gears Up for Apparel Sourcing Week 2024",
    description: "Lorem ipsum dolor sit amet consectetur. Sit velit mi sed at et risus bibendum. Laoreet ornare ipsum sed egestas sollicitudin leo.",
    imgSrc: "../assets/img/blog3.png",
    link: "#"
  }
];

// Function to generate blog cards dynamically
function generateBlogCards() {
  const blogContainer = document.getElementById('blogContainer');
  blogs.forEach(blog => {
    const blogCard = document.createElement('div');
    blogCard.classList.add('col-lg-4', 'col-md-4', 'col-12', 'mb-4','mb-lg-0');
    blogCard.innerHTML = `
      <div class="card blog_cards">
        <img src="${blog.imgSrc}" class="card-img-top" alt="...">
        <div class="card-body px-0">
          <h5 class="card-title blog_titles">${blog.title}</h5>
          <p class="blog_description">${blog.description}</p>
          <a href="${blog.link}" class="link blog_link">Read More</a>
        </div>
      </div>
    `;
    blogContainer.appendChild(blogCard);
  });
}

// Call the function to populate the blog section
generateBlogCards();
