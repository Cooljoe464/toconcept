// JavaScript for Contact Page

document.addEventListener('DOMContentLoaded', function() {
    // Form Submission
    const form = document.querySelector('#contact-form');
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Sending...';

            // Simulate form submission
            setTimeout(() => {
                // Reset the form
                form.reset();
                submitButton.disabled = false;
                submitButton.textContent = 'Send Message';

                // Display success message
                const messageContainer = document.querySelector('.form-message');
                if (messageContainer) {
                    messageContainer.textContent = 'Your message was sent successfully!';
                    messageContainer.classList.add('alert-success');
                }
            }, 2000);
        });
    }

    // FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const isOpen = this.getAttribute('aria-expanded') === 'true';

            // Close all answers
            faqQuestions.forEach(q => {
                q.setAttribute('aria-expanded', 'false');
                q.nextElementSibling.style.maxHeight = null;
            });

            if (!isOpen) {
                this.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });

    // Map Interaction
    const mapOverlay = document.querySelector('.map-overlay');
    if (mapOverlay) {
        mapOverlay.addEventListener('click', function() {
            this.style.display = 'none';
        });
    }

    // Social Links Animation
    const socialLinks = document.querySelectorAll('.social-link');
    socialLinks.forEach(link => {
        link.addEventListener('mouseover', function() {
            this.classList.add('shake');
        });
        link.addEventListener('mouseout', function() {
            this.classList.remove('shake');
        });
    });
});
