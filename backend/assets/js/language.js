jQuery(function ($) {
    language.init();
    window.language = language;
});

var language = {
    params: {
        en: 'en',
        vi: 'vi',
        current: ''
    },
    actions: {
      setLanguage: (lan) => {
          var exdays = 1;
          var d = new Date();
          d.setTime(d.getTime() + (exdays*24*60*60*1000));
          var expires = "expires="+ d.toUTCString();
          document.cookie =  "language=" + lan + ";" + expires + ";path=/";
      },
        getLanguage: () => {
            var name = "language=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        },
    },
    events: {
      checkLanguage: () => {
        let href = window.location.href;
        if (language.params.current == language.params.vi) {
            if (href.match(/\/vi\//) == null) {
                window.location.href = window.location.origin + '/vi'  + window.location.pathname;
            }
        } else {
            if (href.match(/\/vi\//) != null) {
                window.location.href = href.replace('/vi', '');
            }
        }
      },
        changeLanguage:(lan) => {
          debugger;
          language.actions.setLanguage(lan);
            language.events.checkLanguage();
        }
    },
  init: () => {
      console.log('init language');
      language.params.current = language.actions.getLanguage();
      language.events.checkLanguage();
  }
};