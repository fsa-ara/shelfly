export class Alert {
    #alert;
    #animate;

    constructor() {
        this.#alert = document.getElementById("alert");

        if (this.#alert) {
            this.#animate = this.#alert.querySelector("animate");

            this.#init();
        }
    }

    #init = () => {
        this.#alert.classList.add("is-visible");

        this.#animate.addEventListener("endEvent", () => {
            this.#alert.classList.remove("is-visible");
        });
    };
}
