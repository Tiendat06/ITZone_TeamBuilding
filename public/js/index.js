import site from './site.js';
import location from "./location.js";
import log from "./log.js";
import support from './support.js';

// site.index();
// site.ajaxTest();
site.closeToast();


// location & topic (team arrival and team puzzle)
// location.checkDisableInput();
window.fetchViewTopicHint = () => {
    location.fetchViewTopicHint();
}
window.topicCountDown = (time_end)=> {
    location.topicCountDown(time_end)
}
window.fetchCheckDisableInput = (topic_id) => {
    location.fetchCheckDisableInput(topic_id)
}
window.fetchCheckIsDoneTopic = (topic_id) => {
    location.fetchCheckIsDoneTopic(topic_id)
}
window.checkGetHintExtra = (time_end) => {
    location.checkGetHintExtra(time_end);
}
// location.ajaxSendTopicAnswer();
window.fetchSendTopicAnswer = () => {
    location.fetchSendTopicAnswer();
}

// log
window.enableButton = () => {
    log.enableButton();
}

window.togglePassword = () => {
    log.togglePassword();
}
window.checkLogin = () => {
    log.checkLogin()
}

// support
window.getLocationFetch = () => {
    support.getLocationFetch();
}
window.fetchLocation = () => {
    support.fetchLocation();
}
