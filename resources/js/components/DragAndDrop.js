export class DragAndDrop {
    #dropzone;
    #preview;
    #trigger;
    #input;
    #url;

    constructor() {
        this.#dropzone = document.querySelector('[data-dropzone]');

        if (this.#dropzone) {
            this.#preview = this.#dropzone.parentElement.querySelector('[data-preview] img');
            this.#trigger = this.#dropzone.parentElement.querySelector('[data-preview] button');
            this.#input = this.#dropzone.parentElement.querySelector('input[type=file]');

            this.#init();
        }
    }

    #init = () => {
        this.#dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();

            this.#dropzone.dataset.dragging = true;
        });

        ['dragleave', 'dragend', 'mouseleave'].forEach((event) => {
            this.#dropzone.addEventListener(event, () => (this.#dropzone.dataset.dragging = false));
        });

        this.#dropzone.addEventListener('drop', (e) => {
            e.preventDefault();

            this.#setUrl(e);
            this.#handleFile(e);
            this.#handlePreview();
        });

        this.#input.addEventListener('change', (e) => {
            this.#setUrl(e);
            this.#handlePreview();
        });

        this.#trigger.addEventListener('click', () => this.#clear());
    };

    #setUrl = (e) => {
        this.#url = URL.createObjectURL(this.#getFile(e));
    };

    #getFile = (e) => {
        return e.dataTransfer?.files[0] ?? e.target?.files[0];
    };

    #handleFile = (e) => {
        const transfer = new DataTransfer();

        transfer.items.add(this.#getFile(e));

        this.#input.files = transfer.files;
    };

    #handlePreview = () => {
        this.#preview.src = this.#url;

        this.#dropzone.classList.add('hidden');
        this.#preview.parentElement.classList.remove('hidden');
    };

    #clear = () => {
        const url = this.#url;

        this.#input.value = '';
        this.#preview.src = '';

        this.#dropzone.classList.remove('hidden');
        this.#preview.parentElement.classList.add('hidden');

        this.#url = null;

        URL.revokeObjectURL(url);
    };
}
