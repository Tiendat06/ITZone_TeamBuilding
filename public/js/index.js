import site from './site.js';
import location from "./location.js";

site.index();
site.ajaxTest();

window.topicCountDown = (time_end)=> {
    location.topicCountDown(time_end)
}

location.ajaxSendTopicAnswer();