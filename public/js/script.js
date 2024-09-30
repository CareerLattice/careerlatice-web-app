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

            filterLinks.forEach((item) => {
                item.classList.remove("active");
            });

            link.classList.add("active");

            const category = link.textContent.trim();
            console.log(`Filtering for category: ${category}`);

            cards.forEach((card) => {
                const cardCategory = card.getAttribute("data-category");

                if (
                    category === cardCategory ||
                    category === "Show All Popular Company"
                ) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });
        });
    });
});
