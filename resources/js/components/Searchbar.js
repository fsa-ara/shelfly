export class Searchbar {
    #dialog;
    #input;
    #close;
    #noResults;
    #itemsResult;
    #itemTemplate;
    #addItem;
    #searchRoute;

    constructor() {
        this.#dialog = document.getElementById('searchbar-dialog');

        if (this.#dialog) {
            this.#input = this.#dialog.querySelector('#searchbar-field');
            this.#close = this.#dialog.querySelector('[command=close]');
            this.#noResults = this.#dialog.querySelector('#no-results');
            this.#itemsResult = this.#dialog.querySelector('#items-result');
            this.#itemTemplate = this.#dialog.querySelector('#item-template');
            this.#addItem = this.#dialog.querySelector('#add-item > a');
            this.#searchRoute = this.#dialog.dataset.searchRoute;

            this.#init();
        }
    }

    #init = () => {
        this.#input.addEventListener('input', (e) => {
            this.#search(e.target.value);
        });

        this.#close.addEventListener('click', () => {
            this.#clear();
        });
    };

    #search = async (text) => {
        const search = new URLSearchParams({ search: text }).toString();
        const url = `${this.#searchRoute}?${search}`;

        try {
            const response = await fetch(url, {
                headers: {
                    Accept: 'application/json',
                },
            });

            if (!response.ok) throw new Error('HTTP error');

            const json = await response.json();

            this.#results(json, text);
        } catch (e) {
            console.error(e);
        }
    };

    #results = (json, text) => {
        const results = json.data.filter((el) => {
            const label = this.#normalize(el.label);
            const value = this.#normalize(text);

            return label.includes(value);
        });

        this.#display(json, text, results);
    };

    #display = (json, text, results) => {
        this.#noResults.classList.toggle('hidden', results.length > 0);
        this.#itemsResult.classList.toggle('hidden', results.length === 0 || text.length < 1);
        this.#itemsResult.replaceChildren();

        results.forEach((el) => {
            const itemClone = this.#itemTemplate.content.cloneNode(true);
            const link = itemClone.querySelector('a');
            const span = link.querySelector('span');

            link.href = el.url;

            this.#highlight(span, text, el);

            this.#itemsResult.append(itemClone);
        });

        this.#addItem.parentElement.classList.toggle('hidden', text.length < 1);
        this.#addItem.href = json['route-add'];
    };

    #normalize = (value) => {
        return value
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');
    };

    #highlight = (span, text, el) => {
        const highlight = span.querySelector('.highlight');

        const index = this.#normalize(el.label).indexOf(this.#normalize(text));
        const end = index + text.length;

        highlight.textContent = el.label.slice(index, end);

        span.replaceChildren(document.createTextNode(el.label.slice(0, index)), highlight, document.createTextNode(el.label.slice(end)));
    };

    #clear = () => {
        this.#input.value = '';
        this.#noResults.classList.toggle('hidden', true);
        this.#itemsResult.classList.toggle('hidden', true);
        this.#addItem.parentElement.classList.toggle('hidden', true);
        this.#itemsResult.replaceChildren();
    };
}
