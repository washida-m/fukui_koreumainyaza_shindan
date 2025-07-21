import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();           

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.rakuten-card').forEach(card => {
        const shareButton = card.querySelector('.share-btn');
        if (!shareButton) return;

        const modal = document.getElementById('share_modal_desktop');
        const itemNameEl = document.getElementById('share-item-name-desktop');
        const lineLinkEl = document.getElementById('line-share-link-desktop');
        const slackLinkEl = document.getElementById('slack-share-link-desktop'); // Slackボタンを取得
        const copyBtnEl = document.getElementById('copy-share-link-desktop');
        let urlToCopy = '';

        shareButton.addEventListener('click', (event) => {
            if (!modal) return;
            const itemName = event.currentTarget.dataset.name;
            const itemUrl = event.currentTarget.dataset.url;
            urlToCopy = itemUrl;
            
            itemNameEl.textContent = itemName;
            
            const lineShareText = `福井のおすすめ「${itemName}」をチェック！\n${itemUrl}`;
            lineLinkEl.href = `https://line.me/R/msg/text/?${encodeURIComponent(lineShareText)}`;
            
            const slackUrl = `https://slack.com/app_redirect?url=${encodeURIComponent(itemUrl)}`;
            slackLinkEl.href = slackUrl;
            
            modal.showModal();
        });

        if (copyBtnEl) {
            copyBtnEl.addEventListener('click', () => {
                if (urlToCopy) {
                    navigator.clipboard.writeText(urlToCopy).then(() => {
                        copyBtnEl.textContent = 'コピー!';
                        setTimeout(() => { copyBtnEl.textContent = 'コピー'; }, 2000);
                    });
                }
            });
        }
    });
});