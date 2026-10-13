export class Tab {
    #tabList;
    #tabs;
    #tabPanels;

    constructor() {
        this.#tabList = document.querySelector("[role=tablist]");

        if (this.#tabList) {
            this.#tabs = this.#tabList.querySelectorAll(":scope > [role=tab]");
            this.#tabPanels = this.#tabList.parentElement.querySelectorAll(
                ":scope > [role=tabpanel]",
            );

            this.#onClick();
            this.#onKeyboard();
        }
    }

    #onClick = () => {
        this.#tabs.forEach((tab) => {
            tab.addEventListener("click", this.#switchTab);
        });
    };

    #onKeyboard = () => {
        let tabFocus = 0;

        this.#tabList.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft" || e.key === "ArrowRight") {
                this.#tabs[tabFocus].tabIndex = -1;

                if (e.key === "ArrowLeft") {
                    tabFocus--;

                    if (tabFocus < 0) {
                        tabFocus = this.#tabs.length - 1;
                    }
                } else {
                    tabFocus++;

                    if (tabFocus >= this.#tabs.length) {
                        tabFocus = 0;
                    }
                }

                this.#tabs[tabFocus].tabIndex = 0;
                this.#tabs[tabFocus].focus();
            }
        });
    };

    #switchTab = (e) => {
        const tabButton = e.target;

        this.#tabs.forEach((tab) => {
            tab.ariaSelected = "false";
        });

        this.#tabPanels.forEach((tabPanel) => {
            tabPanel.hidden = true;
        });

        tabButton.ariaSelected = "true";
        tabButton.ariaControlsElements[0].hidden = false;
    };
}
