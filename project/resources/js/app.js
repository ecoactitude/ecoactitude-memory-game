import './bootstrap';

window.flipCard = function(card, id) {
    if (!card.classList.contains('disabled')) {
        let cards = document.querySelectorAll('.card:not(.disabled)');
        cards.forEach(card => card.classList.add('disabled'));
        Livewire.dispatch('flip-card', { id: String(id) })
    }
}

Livewire.on('reload-combo-animation', () => {
    const comboImage = document.querySelector('.combo');

    if (comboImage) {
        comboImage.classList.remove('combo');

        // Trigger reflow
        void comboImage.offsetWidth;

        comboImage.classList.add('combo');
    }
});