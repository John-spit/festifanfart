document.addEventListener("DOMContentLoaded", () => {
  /******** CAROUSEL ********/
  const carouselWrapper = document.querySelector(".carousel-wrapper");
  const carouselItems = document.querySelectorAll(".carousel-item");
  const prevButton = document.querySelector(".carousel-prev");
  const nextButton = document.querySelector(".carousel-next");
  const bullets = document.querySelectorAll(".carousel-bullet");

  if (carouselWrapper && carouselItems.length > 0 && prevButton && nextButton) {
    let currentIndex = 0;

    // Variables globales pour le swipe
    let isDragging = false;
    let startX = 0;
    let currentTranslate = 0;

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

    // Swipe avec le doigt ou la souris
    function touchStart(e) {
      isDragging = true;
      startX = e.type === "touchstart" ? e.touches[0].clientX : e.clientX;
      currentTranslate =
        parseInt(
          carouselWrapper.style.transform
            .replace("translateX(", "")
            .replace("%)", "")
        ) || 0;
      carouselWrapper.style.transition = "none"; // Désactiver la transition pendant le glissement
    }

    function touchMove(e) {
      if (!isDragging) return;
      const currentX =
        e.type === "touchmove" ? e.touches[0].clientX : e.clientX;
      const deltaX = currentX - startX;
      const translate =
        currentTranslate + (deltaX / carouselWrapper.offsetWidth) * 100;
      carouselWrapper.style.transform = `translateX(${translate}%)`;
    }

    function touchEnd(e) {
      if (!isDragging) return;
      isDragging = false;
      carouselWrapper.style.transition = "transform 0.4s ease";

      const endX =
        e.type === "touchend" ? e.changedTouches[0].clientX : e.clientX;
      const deltaX = endX - startX;

      if (deltaX > 50) {
        // Swipe à droite (précédent)
        currentIndex =
          (currentIndex - 1 + carouselItems.length) % carouselItems.length;
      } else if (deltaX < -50) {
        // Swipe à gauche (suivant)
        currentIndex = (currentIndex + 1) % carouselItems.length;
      }

      updateCarousel();
    }

    // Ajouter les événements pour le swipe
    carouselWrapper.addEventListener("touchstart", touchStart);
    carouselWrapper.addEventListener("touchmove", touchMove);
    carouselWrapper.addEventListener("touchend", touchEnd);

    carouselWrapper.addEventListener("mousedown", touchStart);
    carouselWrapper.addEventListener("mousemove", touchMove);
    carouselWrapper.addEventListener("mouseup", touchEnd);

    // Empêcher le comportement par défaut lors du drag avec la souris
    carouselWrapper.addEventListener("mouseleave", touchEnd);

    // Initialisation
    updateCarousel();
  }

  /******** MENU BURGER ********/

  const burgerMenu = document.getElementById("burgerMenu");
  const navMenu = document.getElementById("navMenu");

  burgerMenu.addEventListener("click", () => {
    navMenu.classList.toggle("active");
  });

  /******* SCROLL FLUIDE ********/
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

  /******** POPUP CONTACT ********/
  const contactButtons = document.querySelectorAll(".contactBtn");
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

  // Ajouter les événements pour ouvrir la popup
  contactButtons.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      openPopup();
    });
  });

  // Ajouter un événement pour fermer la popup en cliquant à l'extérieur
  document.addEventListener("click", function (e) {
    if (
      contactPopup &&
      contactPopup.style.display === "flex" &&
      !e.target.closest(".popup-wrapper") && // Ne pas fermer si on clique dans la popup
      !e.target.closest(".contactBtn") // Ne pas fermer si on clique sur un bouton d'ouverture
    ) {
      closePopup();
    }
  });

  // Fermer la popup après envoi du formulaire
  if (contactForm) {
    document.addEventListener(
      "wpcf7mailsent",
      function (event) {
        closePopup();
      },
      false
    );
  }

  /******** LIGHTBOX ********/

  const lightbox = document.getElementById("lightbox");
  const lightboxImg = document.getElementById("lightbox-img");
  const lightboxVideo = document.getElementById("lightbox-video");
  const close = document.querySelector(".close");
  const prev = document.getElementById("prev");
  const next = document.getElementById("next");

  // Vérifier si les éléments nécessaires existent
  const items = document.querySelectorAll(".photos-galery, .video-galery");
  if (items.length === 0 || !lightbox || !close || !prev || !next) {
    return; // Arrête l'exécution si les éléments n'existent pas
  }

  let currentIndex = 0;

  // Show the lightbox
  const openLightbox = (index) => {
    currentIndex = index;
    const item = items[currentIndex];
    if (item.tagName === "IMG") {
      lightboxImg.src = item.src;
      lightboxImg.style.display = "block";
      lightboxVideo.style.display = "none";
    } else if (item.tagName === "VIDEO") {
      lightboxVideo.src = item.src;
      lightboxVideo.style.display = "block";
      lightboxImg.style.display = "none";
    }
    lightbox.style.display = "flex";
  };

  // Close the lightbox
  const closeLightbox = () => {
    lightbox.style.display = "none";
    lightboxImg.src = "";
    lightboxVideo.src = "";
  };

  // Navigate to previous
  const showPrev = () => {
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    openLightbox(currentIndex);
  };

  // Navigate to next
  const showNext = () => {
    currentIndex = (currentIndex + 1) % items.length;
    openLightbox(currentIndex);
  };

  // Attach event listeners
  items.forEach((item, index) => {
    item.addEventListener("click", () => openLightbox(index));
  });

  close.addEventListener("click", closeLightbox);
  prev.addEventListener("click", showPrev);
  next.addEventListener("click", showNext);

  // Close on overlay click
  lightbox.addEventListener("click", (e) => {
    if (e.target === lightbox) closeLightbox();
  });

  // Keyboard navigation
  document.addEventListener("keydown", (e) => {
    if (lightbox.style.display === "flex") {
      if (e.key === "ArrowLeft") showPrev();
      if (e.key === "ArrowRight") showNext();
      if (e.key === "Escape") closeLightbox();
    }
  });
});
