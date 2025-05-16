// Untuk FAQ utama
const faqQuestions = document.querySelectorAll('.faq-question');

faqQuestions.forEach((question) => {
  question.addEventListener('click', () => {
    const item = question.parentElement;
    item.classList.toggle('active');

    // Tutup FAQ lain kalau mau auto close yang lain
    faqQuestions.forEach((otherQuestion) => {
      if (otherQuestion !== question) {
        otherQuestion.parentElement.classList.remove('active');
      }
    });
  });
});

// Untuk sub-toggle di dalam FAQ
const subToggles = document.querySelectorAll('.sub-toggle');

subToggles.forEach((toggle) => {
  toggle.addEventListener('click', () => {
    const subContent = toggle.nextElementSibling;
    subContent.classList.toggle('active');
  });
});