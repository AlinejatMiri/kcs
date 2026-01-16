document.querySelectorAll(".carousel").forEach(carousel => {
    const items = carousel.querySelectorAll(".carousel-item");

    const buttons = carousel.querySelectorAll(".carousel-button"); // Fixed selector
    const thumb_nails = carousel.querySelectorAll(".thumb-nail-item")
    const switch_btns = carousel.querySelectorAll('.switch-btn')

    buttons.forEach((button, i) => {
        button.addEventListener("click", () => {
            items.forEach(item => item.classList.remove("selected"));
            buttons.forEach(button => button.classList.remove("selected"));
            thumb_nails.forEach(thumb_nail => thumb_nail.classList.remove('selected'));

            items[i].classList.add('selected');
            button.classList.add('selected');
            thumb_nails[i].classList.add('selected')
        });
    });

    thumb_nails.forEach((thumb_nail, i) => {
        thumb_nail.addEventListener('click', () => {
            items.forEach(item => item.classList.remove("selected"));
            buttons.forEach(button => button.classList.remove("selected"));
            thumb_nails.forEach(thumb_nail => thumb_nail.classList.remove('selected'));

            items[i].classList.add('selected');
            buttons[i].classList.add('selected');
            thumb_nail.classList.add('selected')
        });
    });

    switch_btns.forEach((switch_btn) => {
        switch_btn.addEventListener("click", () => {
            const itemsArr = Array.from(items);
            const currentIndex = itemsArr.findIndex(item => item.classList.contains('selected'));
            if (currentIndex === -1) return;

            // Determine direction: use data-direction="prev|next" or class "prev"/"next"
            let direction = switch_btn.dataset.direction;
            if (!direction) {
                if (switch_btn.classList.contains('prev')) direction = 'prev';
                else direction = 'next';
            }

            const delta = direction === 'prev' ? -1 : 1;
            const newIndex = (currentIndex + delta + itemsArr.length) % itemsArr.length;

            items.forEach(item => item.classList.remove('selected'));
            buttons.forEach(button => button.classList.remove('selected'));
            thumb_nails.forEach(thumb_nail => thumb_nail.classList.remove('selected'));

            items[newIndex].classList.add('selected');
            if (buttons[newIndex]) buttons[newIndex].classList.add('selected');
            if (thumb_nails[newIndex]) thumb_nails[newIndex].classList.add('selected');
        });
    })

    function autoSwitch(interval = 3000) {
        // find a "next" switch button (by data-direction or class), fallback to second/first
        let nextBtn = Array.from(switch_btns).find(b => b.dataset.direction === 'next' || b.classList.contains('next'));
        if (!nextBtn) nextBtn = switch_btns[1] || switch_btns[0];
        if (!nextBtn) return; // nothing to auto-click

        let timer = null;
        const start = () => {
            if (timer) return;
            timer = setInterval(() => nextBtn.click(), interval);
        };
        const stop = () => {
            if (!timer) return;
            clearInterval(timer);
            timer = null;
        };

        // pause while the user hovers the carousel and resume afterwards
        carousel.addEventListener('mouseenter', stop);
        carousel.addEventListener('mouseleave', start);

        start();
        // return controls in case caller wants to stop/start manually
        return { start, stop };
    }
    setTimeout(1000,autoSwitch())

});

