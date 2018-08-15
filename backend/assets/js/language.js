jQuery(function ($) {
    language.init();
    window.language = language;
});

var language = {
    params: {
        en: 'en',
        vi: 'vi',
        current: '',
        home_url: ''
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
        language.params.current = language.actions.getLanguage();
        if (language.params.current == language.params.en) {
            if (href.match(/\/en\//) == null) {
                window.location.href = language.params.home_url + '/en'  + href.replace(language.params.home_url, '');
            }
        } else {
            if (href.match(/\/en\//) != null) {
                window.location.href = href.replace('/en', '');
            }
        }
      },
        changeLanguage:(lan) => {
          language.actions.setLanguage(lan);
          language.events.checkLanguage();
        }
    },
  init: () => {
      console.log('init language');
      language.params.home_url = $('#home_url').data('url');
      language.events.checkLanguage();
  }
};