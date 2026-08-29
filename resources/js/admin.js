import '../css/app.css';

const sidebar = document.getElementById('admin-sidebar');
const toggle = document.getElementById('admin-menu-toggle');
const backdrop = document.getElementById('admin-sidebar-backdrop');

const setOpen = (open) => {
    if (!sidebar) return;
    sidebar.classList.toggle('is-open', open);
    backdrop?.classList.toggle('hidden', !open);
    document.body.classList.toggle('overflow-hidden', open && window.innerWidth < 1024);
};

toggle?.addEventListener('click', () => {
    setOpen(!sidebar.classList.contains('is-open'));
});

backdrop?.addEventListener('click', () => setOpen(false));

sidebar?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
        if (window.innerWidth < 1024) setOpen(false);
    });
});

document.querySelectorAll('[data-repeater-add]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const target = document.querySelector(btn.getAttribute('data-repeater-add'));
        if (!target) return;
        const item = target.querySelector('[data-repeater-item]');
        if (!item) return;
        const clone = item.cloneNode(true);
        clone.querySelectorAll('input, textarea').forEach((el) => {
            if (el.type === 'file') {
                el.value = '';
                return;
            }
            if (el.type === 'hidden' && el.hasAttribute('data-image-current')) {
                el.value = '';
                return;
            }
            el.value = '';
        });
        const preview = clone.querySelector('[data-image-preview]');
        if (preview) {
            preview.innerHTML = '<div class="flex h-full items-center justify-center text-[10px] text-ink-soft">بدون تصویر</div>';
        }
        target.appendChild(clone);
    });
});

document.addEventListener('click', (event) => {
    const removeBtn = event.target.closest('[data-repeater-remove]');
    if (!removeBtn) return;
    const list = removeBtn.closest('[data-repeater-list]');
    const items = list?.querySelectorAll('[data-repeater-item]');
    if (!list || !items || items.length <= 1) return;
    removeBtn.closest('[data-repeater-item]')?.remove();
});

const toast = document.getElementById('admin-toast');
if (toast && !toast.classList.contains('hidden')) {
    window.setTimeout(() => toast.classList.add('hidden'), 3200);
}

document.querySelectorAll('[data-locale-tabs]').forEach((root) => {
    const buttons = root.querySelectorAll('[data-locale-tab]');
    const panels = root.querySelectorAll('[data-locale-panel]');
    const activeInput = root.querySelector('[data-active-locale]');

    buttons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const locale = btn.getAttribute('data-locale-tab');
            buttons.forEach((b) => {
                const active = b === btn;
                b.classList.toggle('is-active', active);
                b.classList.toggle('bg-white', active);
                b.classList.toggle('text-brand-deep', active);
                b.classList.toggle('shadow-sm', active);
                b.classList.toggle('text-ink-soft', !active);
            });
            panels.forEach((panel) => {
                panel.classList.toggle('hidden', panel.getAttribute('data-locale-panel') !== locale);
            });
            if (activeInput) activeInput.value = locale;
        });
    });
});

const closeInlineConfirm = (root) => {
    if (!root) return;
    const trigger = root.querySelector('[data-confirm-trigger]');
    const panel = root.querySelector('[data-confirm-panel]');
    trigger?.classList.remove('hidden');
    panel?.classList.add('hidden');
    panel?.classList.remove('inline-flex');
};

const openInlineConfirm = (root) => {
    if (!root) return;
    document.querySelectorAll('[data-inline-confirm]').forEach((other) => {
        if (other !== root) closeInlineConfirm(other);
    });
    const trigger = root.querySelector('[data-confirm-trigger]');
    const panel = root.querySelector('[data-confirm-panel]');
    trigger?.classList.add('hidden');
    panel?.classList.remove('hidden');
    panel?.classList.add('inline-flex');
};

document.addEventListener('click', (event) => {
    const trigger = event.target.closest('[data-confirm-trigger]');
    if (trigger) {
        event.preventDefault();
        openInlineConfirm(trigger.closest('[data-inline-confirm]'));
        return;
    }

    const cancel = event.target.closest('[data-confirm-cancel]');
    if (cancel) {
        event.preventDefault();
        closeInlineConfirm(cancel.closest('[data-inline-confirm]'));
        return;
    }

    if (!event.target.closest('[data-inline-confirm]')) {
        document.querySelectorAll('[data-inline-confirm]').forEach(closeInlineConfirm);
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        document.querySelectorAll('[data-inline-confirm]').forEach(closeInlineConfirm);
    }
});
