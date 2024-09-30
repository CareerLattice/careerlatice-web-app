const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        } else {
            entry.target.classList.remove("show");
        }
    });
});

const hiddenElements = document.querySelectorAll(".hidden");
hiddenElements.forEach((element) => {
    observer.observe(element);
});

//
document.addEventListener("DOMContentLoaded", function () {
    const filterLinks = document.querySelectorAll(".navbar-company .nav-link");
    const cards = document.querySelectorAll(".popular-company .card");

    filterLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            const category = link.textContent.trim();
            console.log(`Filtering for category: ${category}`);

            if (category === "Show All Popular Company") {
                // Show all cards if "Show All Popular Company" is clicked
                cards.forEach((card) => {
                    card.style.display = "block";
                });
            } else {
                // Filter based on category
                cards.forEach((card) => {
                    const cardCategory = card.getAttribute("data-category");

                    if (category === cardCategory) {
                        card.style.display = "block"; // Show matching cards
                    } else {
                        card.style.display = "none"; // Hide non-matching cards
                    }
                });
            }
        });
    });
});
