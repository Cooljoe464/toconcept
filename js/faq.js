// FAQ Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize FAQ functionality
    initializeFAQ();
});

function initializeFAQ() {
    // Elements
    const searchInput = document.getElementById('faq-search');
    const categoryTabs = document.querySelectorAll('.tab-btn');
    const faqItems = document.querySelectorAll('.faq-item');
    const faqCategories = document.querySelectorAll('.faq-category');
    const noResultsDiv = createNoResultsElement();
    
    // Initialize accordion functionality
    initializeAccordion();
    
    // Initialize search functionality
    if (searchInput) {
        initializeSearch(searchInput, faqItems, faqCategories, noResultsDiv);
    }
    
    // Initialize category filtering
    if (categoryTabs.length > 0) {
        initializeCategoryFiltering(categoryTabs, faqCategories);
    }
    
    // Initialize smooth scrolling for anchor links
    initializeSmoothScrolling();
    
    // Initialize animations on scroll
    initializeScrollAnimations();
}

// Accordion functionality
function initializeAccordion() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.closest('.faq-item');
            const faqAnswer = faqItem.querySelector('.faq-answer');
            const isActive = faqItem.classList.contains('active');
            
            // Close all other FAQ items
            faqQuestions.forEach(otherQuestion => {
                const otherItem = otherQuestion.closest('.faq-item');
                if (otherItem !== faqItem) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            if (isActive) {
                faqItem.classList.remove('active');
            } else {
                faqItem.classList.add('active');
                
                // Scroll to item if it's not fully visible
                setTimeout(() => {
                    const rect = faqItem.getBoundingClientRect();
                    const windowHeight = window.innerHeight;
                    
                    if (rect.bottom > windowHeight - 50) {
                        faqItem.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }
                }, 300);
            }
        });
    });
}

// Search functionality
function initializeSearch(searchInput, faqItems, faqCategories, noResultsDiv) {
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            performSearch(this.value.toLowerCase(), faqItems, faqCategories, noResultsDiv);
        }, 300);
    });
    
    // Clear search on escape key
    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            this.value = '';
            performSearch('', faqItems, faqCategories, noResultsDiv);
            this.blur();
        }
    });
}

function performSearch(query, faqItems, faqCategories, noResultsDiv) {
    let visibleItems = 0;
    
    if (query === '') {
        // Show all items and categories
        faqItems.forEach(item => {
            item.classList.remove('hidden');
            item.classList.remove('active'); // Close all accordions
        });
        
        faqCategories.forEach(category => {
            category.classList.remove('hidden');
        });
        
        hideNoResults(noResultsDiv);
        return;
    }
    
    // Search through FAQ items
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
        const answer = item.querySelector('.answer-content').textContent.toLowerCase();
        
        if (question.includes(query) || answer.includes(query)) {
            item.classList.remove('hidden');
            visibleItems++;
            
            // Highlight search terms
            highlightSearchTerms(item, query);
        } else {
            item.classList.add('hidden');
            item.classList.remove('active'); // Close hidden accordions
        }
    });
    
    // Show/hide categories based on visible items
    faqCategories.forEach(category => {
        const visibleCategoryItems = category.querySelectorAll('.faq-item:not(.hidden)');
        if (visibleCategoryItems.length > 0) {
            category.classList.remove('hidden');
        } else {
            category.classList.add('hidden');
        }
    });
    
    // Show no results message if needed
    if (visibleItems === 0) {
        showNoResults(noResultsDiv, query);
    } else {
        hideNoResults(noResultsDiv);
    }
}

function highlightSearchTerms(item, query) {
    const question = item.querySelector('.faq-question h3');
    const answer = item.querySelector('.answer-content');
    
    // Remove existing highlights
    removeHighlights(question);
    removeHighlights(answer);
    
    if (query.length > 2) {
        // Add new highlights
        addHighlights(question, query);
        addHighlights(answer, query);
    }
}

function removeHighlights(element) {
    const highlights = element.querySelectorAll('.highlight');
    highlights.forEach(highlight => {
        const parent = highlight.parentNode;
        parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
        parent.normalize();
    });
}

function addHighlights(element, query) {
    const walker = document.createTreeWalker(
        element,
        NodeFilter.SHOW_TEXT,
        null,
        false
    );
    
    const textNodes = [];
    let node;
    
    while (node = walker.nextNode()) {
        textNodes.push(node);
    }
    
    textNodes.forEach(textNode => {
        const content = textNode.textContent;
        const lowerContent = content.toLowerCase();
        const queryIndex = lowerContent.indexOf(query);
        
        if (queryIndex !== -1) {
            const before = content.substring(0, queryIndex);
            const match = content.substring(queryIndex, queryIndex + query.length);
            const after = content.substring(queryIndex + query.length);
            
            const fragment = document.createDocumentFragment();
            
            if (before) fragment.appendChild(document.createTextNode(before));
            
            const highlight = document.createElement('span');
            highlight.className = 'highlight';
            highlight.style.backgroundColor = '#fff3cd';
            highlight.style.padding = '2px 4px';
            highlight.style.borderRadius = '3px';
            highlight.textContent = match;
            fragment.appendChild(highlight);
            
            if (after) fragment.appendChild(document.createTextNode(after));
            
            textNode.parentNode.replaceChild(fragment, textNode);
        }
    });
}

// Category filtering
function initializeCategoryFiltering(categoryTabs, faqCategories) {
    categoryTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetCategory = this.dataset.category;
            
            // Update active tab
            categoryTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Filter categories
            if (targetCategory === 'all') {
                faqCategories.forEach(category => {
                    category.classList.remove('hidden');
                });
            } else {
                faqCategories.forEach(category => {
                    if (category.dataset.category === targetCategory) {
                        category.classList.remove('hidden');
                    } else {
                        category.classList.add('hidden');
                    }
                });
            }
            
            // Close all accordions when switching categories
            const faqItems = document.querySelectorAll('.faq-item');
            faqItems.forEach(item => {
                item.classList.remove('active');
            });
            
            // Smooth scroll to content
            const faqContent = document.querySelector('.faq-content');
            if (faqContent) {
                faqContent.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// No results functionality
function createNoResultsElement() {
    let noResults = document.getElementById('no-results');
    if (!noResults) {
        noResults = document.createElement('div');
        noResults.id = 'no-results';
        noResults.className = 'no-results hidden';
        noResults.innerHTML = `
            <div class="container">
                <i class="fas fa-search"></i>
                <h3>No results found</h3>
                <p>We couldn't find any FAQs matching your search. Try using different keywords or browse our categories above.</p>
                <div style="margin-top: 30px;">
                    <a href="contact.php" class="btn btn-primary">Ask a Question</a>
                    <button onclick="clearSearch()" class="btn btn-outline" style="margin-left: 15px;">Clear Search</button>
                </div>
            </div>
        `;
        
        const faqContent = document.querySelector('.faq-content .container');
        if (faqContent) {
            faqContent.appendChild(noResults);
        }
    }
    return noResults;
}

function showNoResults(noResultsDiv, query) {
    const queryElement = noResultsDiv.querySelector('p');
    if (queryElement) {
        queryElement.textContent = `We couldn't find any FAQs matching "${query}". Try using different keywords or browse our categories above.`;
    }
    noResultsDiv.classList.remove('hidden');
}

function hideNoResults(noResultsDiv) {
    noResultsDiv.classList.add('hidden');
}

// Clear search function (called from no results element)
window.clearSearch = function() {
    const searchInput = document.getElementById('faq-search');
    if (searchInput) {
        searchInput.value = '';
        searchInput.dispatchEvent(new Event('input'));
        searchInput.focus();
    }
};

// Smooth scrolling
function initializeSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Scroll animations
function initializeScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const animatedElements = document.querySelectorAll('.faq-category, .help-option, .link-card');
    animatedElements.forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        observer.observe(el);
    });
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + K to focus search
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
        e.preventDefault();
        const searchInput = document.getElementById('faq-search');
        if (searchInput) {
            searchInput.focus();
            searchInput.select();
        }
    }
    
    // Arrow keys for FAQ navigation
    if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
        const activeElement = document.activeElement;
        if (activeElement && activeElement.closest('.faq-question')) {
            e.preventDefault();
            navigateFAQs(e.key === 'ArrowDown' ? 'next' : 'prev');
        }
    }
    
    // Enter to toggle FAQ
    if (e.key === 'Enter') {
        const activeElement = document.activeElement;
        if (activeElement && activeElement.closest('.faq-question')) {
            e.preventDefault();
            activeElement.click();
        }
    }
});

function navigateFAQs(direction) {
    const visibleQuestions = Array.from(document.querySelectorAll('.faq-question'))
        .filter(q => !q.closest('.faq-item').classList.contains('hidden'));
    
    const currentIndex = visibleQuestions.findIndex(q => q === document.activeElement || q.contains(document.activeElement));
    
    let newIndex;
    if (direction === 'next') {
        newIndex = (currentIndex + 1) % visibleQuestions.length;
    } else {
        newIndex = currentIndex <= 0 ? visibleQuestions.length - 1 : currentIndex - 1;
    }
    
    if (visibleQuestions[newIndex]) {
        visibleQuestions[newIndex].focus();
        visibleQuestions[newIndex].scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }
}

// Make FAQ questions focusable for keyboard navigation
document.querySelectorAll('.faq-question').forEach(question => {
    question.setAttribute('tabindex', '0');
    question.style.outline = 'none';
    
    question.addEventListener('focus', function() {
        this.style.boxShadow = '0 0 0 3px rgba(102, 126, 234, 0.3)';
    });
    
    question.addEventListener('blur', function() {
        this.style.boxShadow = '';
    });
});

// Auto-expand FAQ from URL hash
window.addEventListener('load', function() {
    const hash = window.location.hash;
    if (hash) {
        const targetElement = document.querySelector(hash);
        if (targetElement && targetElement.classList.contains('faq-item')) {
            setTimeout(() => {
                targetElement.classList.add('active');
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 500);
        }
    }
});

// Analytics tracking (optional)
function trackFAQInteraction(action, category, question) {
    if (typeof gtag !== 'undefined') {
        gtag('event', 'faq_interaction', {
            'event_category': 'FAQ',
            'event_label': category,
            'custom_parameter_1': action,
            'custom_parameter_2': question
        });
    }
}

// Track FAQ clicks
document.addEventListener('click', function(e) {
    if (e.target.closest('.faq-question')) {
        const faqItem = e.target.closest('.faq-item');
        const category = faqItem.closest('.faq-category')?.dataset.category || 'unknown';
        const question = faqItem.querySelector('h3')?.textContent || 'unknown';
        
        trackFAQInteraction('expand', category, question);
    }
});

// Track search usage
let searchInput = document.getElementById('faq-search');
if (searchInput) {
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            if (this.value.length > 2) {
                trackFAQInteraction('search', 'search', this.value);
            }
        }, 1000);
    });
}
