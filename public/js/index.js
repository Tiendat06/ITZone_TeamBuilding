import site from './site.js';
import location from "./location.js";

site.index();
site.ajaxTest();


// location & topic (team arrival and team puzzle)
location.checkDisableInput();
window.topicCountDown = (time_end)=> {
    location.topicCountDown(time_end)
}

location.ajaxSendTopicAnswer();