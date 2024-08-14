import site from './site.js';
import location from "./location.js";
import log from "./log.js";
import support from './support.js';

site.index();
site.ajaxTest();
site.closeToast();


// location & topic (team arrival and team puzzle)
location.checkDisableInput();
window.topicCountDown = (time_end)=> {
    location.topicCountDown(time_end)
}

location.ajaxSendTopicAnswer();

// log
window.enableButton = () => {
    log.enableButton();
}

window.togglePassword = () => {
    log.togglePassword();
}
log.checkLogin()

// support
support.getLocationFetch();
support.fetchLocation();