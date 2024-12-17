document.addEventListener("DOMContentLoaded", () => {
  const carouselWrapper = document.querySelector(".carousel-wrapper");
  const carouselItems = document.querySelectorAll(".carousel-item");
  const prevButton = document.querySelector(".carousel-prev");
  const nextButton = document.querySelector(".carousel-next");
  const bullets = document.querySelectorAll(".carousel-bullet");

  if (carouselWrapper && carouselItems.length > 0 && prevButton && nextButton) {
    let currentIndex = 0;

    function updateCarousel() {
      const offset = -currentIndex * 100;
      carouselWrapper.style.transform = `translateX(${offset}%)`;

      // Mettre à jour les bullets
      bullets.forEach((bullet, index) => {
        bullet.classList.toggle("active", index === currentIndex);
      });
    }

    prevButton.addEventListener("click", () => {
      currentIndex =
        (currentIndex - 1 + carouselItems.length) % carouselItems.length;
      updateCarousel();
    });

    nextButton.addEventListener("click", () => {
      currentIndex = (currentIndex + 1) % carouselItems.length;
      updateCarousel();
    });

    // Ajouter des événements sur les bullets
    bullets.forEach((bullet, index) => {
      bullet.addEventListener("click", () => {
        currentIndex = index;
        updateCarousel();
      });
    });

    // Initialisation
    updateCarousel();
  }

  const burgerMenu = document.getElementById("burgerMenu");
  const navMenu = document.getElementById("navMenu");

  burgerMenu.addEventListener("click", () => {
    navMenu.classList.toggle("active");
  });

  // Sélectionner tous les liens d'ancre
  const anchorLinks = document.querySelectorAll('a[href*="#"]');

  anchorLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      const href = this.getAttribute("href");

      if (href.includes("#") && href !== "#") {
        e.preventDefault();
        const targetElement = document.querySelector(href);
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }
      }
    });
  });

  // Popup Contact
  const contactBtn = document.getElementById("contactBtn");
  const contactPopup = document.getElementById("contactPopup");
  const contactForm = contactPopup ? contactPopup.querySelector("form") : null;

  function openPopup() {
    if (contactPopup) {
      contactPopup.style.display = "flex";
      setTimeout(() => {
        contactPopup.classList.add("show");
      }, 10);
      console.log("Popup ouverte");
    }
  }

  function closePopup() {
    if (contactPopup) {
      if (contactForm) {
        contactForm.reset();
      }
      contactPopup.classList.remove("show");
      setTimeout(() => {
        contactPopup.style.display = "none";
      }, 300);
      console.log("Popup fermée");
    }
  }

  if (contactBtn) {
    contactBtn.addEventListener("click", function (e) {
      e.preventDefault();
      openPopup();
    });
  }

  document.addEventListener("click", function (e) {
    if (
      contactPopup &&
      contactPopup.style.display === "flex" &&
      !e.target.closest(".popup-wrapper") &&
      !e.target.closest("#contactBtn") &&
      !e.target.closest("#photoContactBtn")
    ) {
      closePopup();
    }
  });

  if (contactForm) {
    document.addEventListener(
      "wpcf7mailsent",
      function (event) {
        closePopup();
      },
      false
    );
  }
});
