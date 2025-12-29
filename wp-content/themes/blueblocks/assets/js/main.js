
        // Check local storage or system preference on load
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    



        // Check for saved user preference, if any, on load of the website
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
   

    
const content = {
  team: {
    title: "Meet Our Educators.",
    text: "Experienced Montessori-trained guides nurturing each child’s potential."
  },
  admissions: {
    title: "Admissions Open.",
    text: "A smooth, transparent admission journey for parents and children."
  },
  campus: {
    title: "Spaces Designed for Discovery.",
    text: "Light-filled campuses designed for joyful learning experiences."
  }
};

const card = document.getElementById("layeredCard");
const title = document.getElementById("cardTitle");
const text = document.getElementById("cardText");

document.querySelectorAll(".menu-link").forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    const key = link.dataset.key;

    card.classList.remove("animate-active");
    card.classList.add("opacity-0","translate-x-16");

    setTimeout(() => {
      title.innerText = content[key].title;
      text.innerText = content[key].text;

      card.classList.remove("opacity-0","translate-x-16");
      card.classList.add("animate-active");
    }, 300);
  });
});

// auto-open campus
window.addEventListener("load",()=>{
  card.classList.remove("opacity-0","translate-x-16");
  card.classList.add("animate-active");
});

// accordian section
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".faq-toggle").forEach(toggle => {
    toggle.addEventListener("click", () => {
      const card = toggle.closest(".faq-card");
      const content = card.querySelector(".faq-content");
      const icon = toggle.querySelector(".faq-icon path");

      // Toggle content
      content.classList.toggle("hidden");

      // Toggle active (RED) background
      card.classList.toggle("faq-active");

      // Toggle icon (+ / x)
      if (icon.getAttribute("d").includes("M12 4v16")) {
        icon.setAttribute("d", "M6 18L18 6M6 6l12 12");
      } else {
        icon.setAttribute("d", "M12 4v16m8-8H4");
      }
    });
  });
});


//testimonial
document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector(".bb-testimonial-slider");
  if (!slider) return;

  let autoScroll;
  const interval = 4000;

  function getSlideWidth() {
    const slide = slider.querySelector(".bb-slide");
    return slide ? slide.offsetWidth + 24 : 0; // 24 = gap
  }

  function startAutoScroll() {
    autoScroll = setInterval(() => {
      slider.scrollBy({
        left: getSlideWidth(),
        behavior: "smooth",
      });

      // loop back
      if (
        slider.scrollLeft + slider.clientWidth >=
        slider.scrollWidth - 10
      ) {
        slider.scrollTo({ left: 0, behavior: "smooth" });
      }
    }, interval);
  }

  function stopAutoScroll() {
    clearInterval(autoScroll);
  }

  slider.addEventListener("mouseenter", stopAutoScroll);
  slider.addEventListener("mouseleave", startAutoScroll);
  slider.addEventListener("touchstart", stopAutoScroll);
  slider.addEventListener("touchend", startAutoScroll);

  startAutoScroll();
});


