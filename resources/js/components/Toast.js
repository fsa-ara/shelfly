export class Toast {
    #toast;
    #animate;

    constructor() {
        this.#toast = document.querySelector("[data-toast]");

        if (this.#toast) {
            this.#animate = this.#toast.querySelector("animate");

            this.#init();
        }
    }

    #init = () => {
        this.#animate.addEventListener("endEvent", () => {
            this.#toast.removeAttribute("data-toast");

            this.#toast.addEventListener("transitionend", () => {
                this.#toast.hidden = true;
            });
        });
    };
}
