document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".blog_tab_btns button");
  const contents = document.querySelectorAll(".blog-content");

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      // Remove active class from all buttons
      buttons.forEach((btn) => btn.classList.remove("active"));
      
      // Add active class to the clicked button
      button.classList.add("active");

      // Hide all content
      contents.forEach((content) => content.classList.remove("active"));

      // Show content matching the clicked button
      const tab = button.getAttribute("data-tab");
      document.getElementById(tab).classList.add("active");
    });
  });
});




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

// Dynamic Page
const blogs = [
  {
    img: "../assets/img/blog1.png",
    alt: "Material Recyclability in Fashion",
    title: "Closing the Loop: A Guide to Material Recyclability in Fashion",
    description: "Discover the secrets of effective communication in our latest blog post!",
    link: "#"
  },
  {
    img: "../assets/img/blog2.png",
    alt: "Sustainable Product Development",
    title: "What is Sustainable Product Development in Fashion?",
    description: "Unlock your potential with our insightful blog on personal development!",
    link: "#"
  },
  {
    img: "../assets/img/blog3.png",
    alt: "WFX Apparel Sourcing Week 2024",
    title: "WFX Gears Up for Apparel Sourcing Week 2024",
    description: "Dive into the world of technology with our comprehensive blog on the latest trends!",
    link: "#"
  },
  {
    img: "../assets/img/blog4.png",
    alt: "Technology in Fashion",
    title: "How Technology is Reshaping the Fashion Industry",
    description: "Explore how cutting-edge technology is revolutionizing fashion.",
    link: "#"
  },
  {
    img: "../assets/img/blog5.png",
    alt: "Circular Economy",
    title: "The Circular Economy: A New Way Forward in Fashion",
    description: "Understand the role of the circular economy in sustainable fashion.",
    link: "#"
  },
  {
    img: "../assets/img/blog6.png",
    alt: "Digital Transformation",
    title: "Digital Transformation: The Future of Fashion Business",
    description: "Embrace digital tools for a competitive edge in the fashion world.",
    link: "#"
  },
  {
    img: "../assets/img/blog7.png",
    alt: "PLM Implementation",
    title: "Best Practices for Successful PLM Implementation",
    description: "Learn the secrets of successful PLM system implementations.",
    link: "#"
  },
  {
    img: "../assets/img/blog8.png",
    alt: "Fashion and AI",
    title: "AI in Fashion: What's Next?",
    description: "Discover how artificial intelligence is shaping the future of fashion.",
    link: "#"
  },
  {
    img: "../assets/img/blog9.png",
    alt: "Sustainability",
    title: "Top 10 Sustainable Fashion Trends of 2024",
    description: "Explore the trends shaping the future of sustainable fashion.",
    link: "#"
  }
];

function renderBlogs() {
  const blogContainer = document.getElementById('blogContainer');
  const blogContainer2 = document.getElementById('blogContainer2');
  const blogContainer3 = document.getElementById('blogContainer3');
  const blogContainer4 = document.getElementById('blogContainer4');
  const blogContainer5 = document.getElementById('blogContainer5');
  blogs.forEach(blog => {
    const blogCard = `
      <div class="col-lg-4 col-md-6 mb-4 c-mb-20">
        <div class="card blog_cards">
          <img src="${blog.img}" class="card-img-top" alt="${blog.alt}" loading="lazy">
          <div class="card-body">
            <h5 class="card-title blog_titles">${blog.title}</h5>
            <p class="blog_description">${blog.description}</p>
            <a href="${blog.link}" class="link blog_link">Read More</a>
          </div>
        </div>
      </div>`;
    blogContainer.innerHTML += blogCard;
    blogContainer2.innerHTML += blogCard;
    blogContainer3.innerHTML += blogCard;
    blogContainer4.innerHTML += blogCard;
    blogContainer5.innerHTML += blogCard;
  });
}

document.addEventListener('DOMContentLoaded', renderBlogs);