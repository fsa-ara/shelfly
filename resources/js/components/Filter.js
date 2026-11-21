export class Filter {
    #main;
    #filter;
    #menuTrigger;
    #openingTrigger;
    #closingTrigger;

    constructor() {
        this.#filter = document.getElementById('filter');

        if (this.#filter) {
            this.#main = document.querySelector('main');
            this.#menuTrigger = document.querySelector('header button');
            this.#openingTrigger = document.querySelector('button[aria-controls=filter]');
            this.#closingTrigger = this.#filter.querySelector('button');
            this.#init();
        }
    }

    #init = () => {
        this.#filter.addEventListener('click', (e) => {
            if (e.target === e.currentTarget) this.#reset();
        });

        this.#menuTrigger.addEventListener('click', this.#reset);
        this.#openingTrigger.addEventListener('click', this.#toggle);
        this.#closingTrigger.addEventListener('click', this.#toggle);

        window.addEventListener('resize', this.#reset);
    };

    #isExpanded = () => {
        return this.#openingTrigger.ariaExpanded === 'true';
    };

    #toggle = () => {
        this.#main.classList.toggle('overflow-hidden');

        this.#filter.toggleAttribute('data-expanded');
        this.#openingTrigger.ariaExpanded = !this.#isExpanded();
    };

    #reset = () => {
        if (this.#isExpanded()) {
            this.#main.classList.toggle('overflow-hidden');

            this.#filter.toggleAttribute('data-expanded');
            this.#openingTrigger.ariaExpanded = !this.#isExpanded();
        }
    };
}
