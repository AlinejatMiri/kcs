document.querySelectorAll(".product-section").forEach(product => {
    const filterBtns = product.querySelectorAll(".filter-btn");
    const cards = product.querySelectorAll(".card");
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // remove active from all buttons, then add to the clicked one
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            const filter = btn.dataset.filter;
            cards.forEach(card => {
                const category = card.dataset.category;
                if (filter === 'all' || filter === category) {
                    card.classList.remove('hide');
                } else {
                    card.classList.add('hide');
                }
            });
        });
    });
});


