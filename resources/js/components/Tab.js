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

            this.#init();
            this.#onClick();
            this.#onKeyboard();
        }
    }

    #init = () => {
        const tabPathname = sessionStorage.getItem("tab_pathname");
        const tabId = sessionStorage.getItem("tab_id");
        const tabButton = [...this.#tabs].find(
            (tab) => tab.getAttribute("aria-controls") === tabId,
        );

        if (tabPathname === window.location.pathname && tabButton) {
            this.#switchTab(tabButton);

            return;
        }

        this.#removeStorage();
    };

    #onClick = () => {
        this.#tabs.forEach((tab) => {
            tab.addEventListener("click", this.#switchTab);
        });
    };

    #onKeyboard = () => {
        let tabFocus = [...this.#tabs].findIndex((tab) => tab.tabIndex === 0);

        this.#tabList.addEventListener("keydown", (e) => {
            if (e.key === "ArrowLeft" || e.key === "ArrowRight") {
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

                this.#tabs[tabFocus].focus();

                this.#switchTab(this.#tabs[tabFocus]);
            }
        });
    };

    #switchTab = (e) => {
        const tabButton = e.currentTarget ?? e;

        this.#tabs.forEach((tab) => {
            tab.ariaSelected = "false";
            tab.tabIndex = -1;
        });

        this.#tabPanels.forEach((tabPanel) => {
            tabPanel.hidden = true;
        });

        tabButton.ariaSelected = "true";
        tabButton.tabIndex = 0;
        tabButton.ariaControlsElements[0].hidden = false;

        this.#setStorage(tabButton);
    };

    #setStorage = (tabButton) => {
        const tabPathname = window.location.pathname;
        const tabId = tabButton.ariaControlsElements[0].id;

        sessionStorage.setItem("tab_pathname", tabPathname);
        sessionStorage.setItem("tab_id", tabId);
    };

    #removeStorage = () => {
        sessionStorage.removeItem("tab_pathname");
        sessionStorage.removeItem("tab_id");
    };
}
