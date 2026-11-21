export class InputNumber {
    #inputs;

    constructor() {
        this.#inputs = document.querySelectorAll('[type=number]');

        if (this.#inputs.length) {
            this.#init();
        }
    }

    #init = () => {
        this.#inputs.forEach((input) => {
            const up = input.parentElement.querySelector('[data-arrow=up]');
            const down = input.parentElement.querySelector('[data-arrow=down]');

            up.addEventListener('click', () => input.stepUp());
            down.addEventListener('click', () => input.stepDown());
        });
    };
}
