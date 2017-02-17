class Detabinator {
    constructor (element) {
       if (!element) {
          throw new Error("Missing require argument element");
       }
       this._inert = false;
       this._focusableElementsString = 'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex], [contenteditable]';
       this._focusableElements = Array.from(
            element.querySelectorAll(this._focusableElementsString)    
       );
    }

    get inert () {
        return this._inert;
    }

    set inert (isInert) {
        if (this._inert === isInert) {
            return;
        }
        this._inert = isInert;
        this._focusableElements.forEach((child) => {
            if (isInert) {
                if (child.hasAttribute('tabindex')) {
                    child.__savedTabindex = child.tabIndex;
                }
                child.setAttribute('tabindex', -1);
            } else {
                if (child.__savedTabindex == 0 || child.__savedTabindex) {
                    return child.setAttribute('tabindex', child.__savedTabindex);
                } else {
                    child.removeAttribute('tabindex');
                }
            }
        });
    }
}
