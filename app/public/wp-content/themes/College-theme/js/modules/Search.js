import $ from 'jquery';

class Search {
    // 1. Describe and Create Our Object
    constructor() {
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
        this.isoverlayopen = false;
    }

    // 2. Events
    events () {
        this.openButton.on("click", this.openOverlay().bind(this));
        this.closeButton.on("click", this.closeOverlay().bind(this));
        $(document).on('keydown', this.keyPressDispatcher.bind(this));
    }

    // 3. Method (Function, Action ...)
    keyPressDispatcher (e) {
        if (e.keycode == 83 && !this.isoverlayopen) {
            this.openOverlay();
        }
        if (e.keycode == 27 && this.isoverlayopen) {
            this.closeOverlay();
        }
    }

    openOverlay () {
        this.searchOverlay.addClass("search-overlay--active");
        $(".body").addClass("body-no-scroll");
        console.log("Our open method just run");
        this.isoverlayopen = true;
    }

    closeOverlay () {
        this.searchOverlay.removeClass("search-overlay--active");
        $(".body").removeClass("body-no-scroll");
        console.log("Our close method just run");
    }

}

export default Search


























