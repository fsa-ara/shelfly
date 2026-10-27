export class Sidebar {
    #sidebar;
    #trigger;

    constructor() {
        this.#sidebar = document.getElementById("sidebar");

        if (this.#sidebar) {
            this.#trigger = document.querySelector("header button");

            this.#init();
        }
    }

    #init = () => {
        this.#trigger.addEventListener("click", this.#toggle);
        this.#sidebar.addEventListener("click", (e) => {
            if (e.target === e.currentTarget) this.#reset();
        });

        window.addEventListener("resize", this.#reset);
    };

    #isExpanded = () => {
        return this.#trigger.ariaExpanded === "true";
    };

    #toggle = () => {
        document.body.classList.toggle("overflow-hidden");

        this.#sidebar.toggleAttribute("data-expanded");
        this.#trigger.ariaExpanded = !this.#isExpanded();
        this.#trigger.ariaLabel = this.#labelling();
    };

    #reset = (e) => {
        console.log(e);

        if (this.#isExpanded()) {
            document.body.classList.remove("overflow-hidden");

            this.#sidebar.toggleAttribute("data-expanded");
            this.#trigger.ariaExpanded = !this.#isExpanded();
            this.#trigger.ariaLabel = this.#labelling();
        }
    };

    #labelling = () => {
        const open = this.#trigger.dataset.triggerLabelOpen;
        const close = this.#trigger.dataset.triggerLabelClose;

        return this.#isExpanded() ? close : open;
    };
}
