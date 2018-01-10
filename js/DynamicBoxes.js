class DynamicBoxes {
    constructor() {
        this._key = 'hidden-boxes';
        this._boxes = [...document.querySelectorAll('.box.dynamic')];
        this._showAllLink = document.getElementById('show-all-boxes');
        this._init();
    }

    _init() {
        this._boxes.forEach(box => {
            if (!this._isHiddenByCookie(box.id)) {
                box.classList.add('visible');
            }
            box.querySelector('.hide').addEventListener('click', (e) => {e.preventDefault(); this._hide(box)});
        });
        this._showAllLink.addEventListener('click', (e) => {e.preventDefault(); this._showAll()});
        this._updateShowAllLink();
    }

    _isHiddenByCookie(boxId) {
        const hiddenBoxesString = document.cookie.split(';')
            .map(c => c.trim().split('='))
            .filter(c => c[0] === this._key);
        if (hiddenBoxesString.length === 1) {
            return hiddenBoxesString[0][1].split(',').some(it => it === boxId);
        }
        return false;
    }

    _updateCookie() {
        const hiddenBoxesString = this._boxes
            .filter(box => !box.classList.contains('visible'))
            .map(box => box.id)
            .join(',');
        document.cookie = `${this._key}=${hiddenBoxesString}`;
    }

    _updateShowAllLink() {
        if (this._boxes.some(box => !box.classList.contains('visible'))) {
            this._showAllLink.classList.add('visible');
        } else {
            this._showAllLink.classList.remove('visible');
        }
    }

    _hide(box) {
        if (box.classList.contains('visible')) {
            box.classList.remove('visible');
        }
        this._updateShowAllLink();
        this._updateCookie();
    }

    _showAll() {
        this._boxes
            .filter(box => !box.classList.contains('visible'))
            .forEach(box => {
                box.classList.add('visible');
            });
        this._updateShowAllLink();
        this._updateCookie();
    }
}
