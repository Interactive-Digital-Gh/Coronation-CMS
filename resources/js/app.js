import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

// File input: shows the chosen filename, previews images, and enforces the
// upload size cap client-side (the server validates too — see config/uploads.php).
Alpine.data('fileInput', (maxKb) => ({
    fileName: '',
    fileSize: '',
    preview: null,
    error: '',

    changed(event) {
        const file = event.target.files && event.target.files[0];
        this.error = '';
        this.clearPreview();

        if (!file) {
            this.fileName = '';
            this.fileSize = '';
            return;
        }

        if (file.size > maxKb * 1024) {
            const maxMb = maxKb % 1024 === 0 ? maxKb / 1024 : (maxKb / 1024).toFixed(1);
            this.error = `${file.name} is ${(file.size / 1048576).toFixed(1)} MB. The limit is ${maxMb} MB.`;
            event.target.value = '';
            this.fileName = '';
            this.fileSize = '';
            return;
        }

        this.fileName = file.name;
        this.fileSize = file.size < 1048576
            ? `${Math.round(file.size / 1024)} KB`
            : `${(file.size / 1048576).toFixed(1)} MB`;

        if (file.type.startsWith('image/')) {
            this.preview = URL.createObjectURL(file);
        }
    },

    clearPreview() {
        if (this.preview) {
            URL.revokeObjectURL(this.preview);
            this.preview = null;
        }
    },
}));

// Flash / validation toasts. Auto-dismiss, or click to close.
Alpine.data('toasts', (initial) => ({
    items: [],

    init() {
        initial.forEach((toast) => this.push(toast));
    },

    push(toast) {
        const id = Date.now() + Math.random();
        this.items.push({ id, ...toast });
        setTimeout(() => this.remove(id), toast.type === 'error' ? 9000 : 5000);
    },

    remove(id) {
        this.items = this.items.filter((toast) => toast.id !== id);
    },
}));

Alpine.start();
